<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function index()
    {
        $requests = PasswordResetRequest::with('processedBy')
            ->latest()
            ->paginate(10);

        $stats = [
            'total' => PasswordResetRequest::count(),
            'pending' => PasswordResetRequest::where('status', 'pending')->count(),
            'processing' => PasswordResetRequest::where('status', 'processing')->count(),
            'completed' => PasswordResetRequest::where('status', 'completed')->count(),
            'cancelled' => PasswordResetRequest::where('status', 'cancelled')->count(),
        ];

        return view('admin.password-reset-requests.index', compact('requests', 'stats'));
    }

    public function show($id)
    {
        $request = PasswordResetRequest::with('processedBy')->findOrFail($id);
        
        // Find the user associated with this request
        $user = null;
        if ($request->email) {
            $user = User::where('email', $request->email)->first();
        } elseif ($request->whatsapp_number) {
            // Clean the WhatsApp number (remove any formatting)
            $cleanWhatsApp = preg_replace('/[^0-9]/', '', $request->whatsapp_number);
            $user = User::where('whatsapp_number', $cleanWhatsApp)->first();
            
            // If not found with cleaned number, try with original
            if (!$user) {
                $user = User::where('whatsapp_number', $request->whatsapp_number)->first();
            }
        }

        return view('admin.password-reset-requests.show', compact('request', 'user'));
    }

    public function process(Request $request, $id)
    {
        $password_reset_request = PasswordResetRequest::findOrFail($id);
        
        $validated = $request->validate([
            'action' => 'required|in:approve,reject',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        // Find the user
        $user = null;
        if ($password_reset_request->email) {
            $user = User::where('email', $password_reset_request->email)->first();
        } elseif ($password_reset_request->whatsapp_number) {
            // Clean the WhatsApp number (remove any formatting)
            $cleanWhatsApp = preg_replace('/[^0-9]/', '', $password_reset_request->whatsapp_number);
            $user = User::where('whatsapp_number', $cleanWhatsApp)->first();
            
            // If not found with cleaned number, try with original
            if (!$user) {
                $user = User::where('whatsapp_number', $password_reset_request->whatsapp_number)->first();
            }
        }

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        if ($validated['action'] === 'approve') {
            // Generate a default password
            $defaultPassword = 'AfayiGuide2024!';
            
            // Reset user's password
            $user->update([
                'password' => Hash::make($defaultPassword),
            ]);

            // Update the request status
            $password_reset_request->update([
                'status' => 'completed',
                'admin_notes' => $validated['admin_notes'],
                'processed_by' => auth()->id(),
                'processed_at' => now(),
            ]);

            // Send notification to user
            $this->sendPasswordResetNotification($user, $defaultPassword, $password_reset_request->request_type);

            // Build WhatsApp prefilled message and link for admin convenience
            $cleanNumber = preg_replace('/[^0-9]/', '', (string)($user->whatsapp_number ?? ''));
            $loginUrl = url(route('login'));
            $message = "Hello {$user->name}, your AfayiGuide password has been reset.\n\n" .
                "Temporary password: {$defaultPassword}\n\n" .
                "How to change your password:\n" .
                "1) Visit: {$loginUrl}\n" .
                "2) Log in with your email/WhatsApp and the temporary password\n" .
                "3) Go to Profile > Account Security > Change Password\n" .
                "4) Set a new secure password\n\n" .
                "If you didn't request this, please contact support immediately.";

            $whatsappLink = $cleanNumber ? ('https://wa.me/' . $cleanNumber . '?text=' . urlencode($message)) : null;

            return back()->with([
                'success' => 'Password reset completed successfully. User has been notified.',
                'whatsapp_link' => $whatsappLink,
                'whatsapp_message' => $message,
            ]);
        } else {
            // Reject the request
            $password_reset_request->update([
                'status' => 'cancelled',
                'admin_notes' => $validated['admin_notes'],
                'processed_by' => auth()->id(),
                'processed_at' => now(),
            ]);

            return back()->with('success', 'Password reset request has been rejected.');
        }
    }

    private function sendPasswordResetNotification($user, $newPassword, $contactMethod)
    {
        try {
            if ($contactMethod === 'email' && $user->email) {
                // Send email notification
                Mail::send('emails.password-reset-notification', [
                    'user' => $user,
                    'newPassword' => $newPassword,
                ], function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Password Reset - AfayiGuide');
                });
            } elseif ($contactMethod === 'whatsapp' && $user->whatsapp_number) {
                // For WhatsApp, we'll just log it for now
                // In a real implementation, you'd integrate with WhatsApp Business API
                \Log::info("WhatsApp notification for password reset: {$user->whatsapp_number}");
            }
        } catch (\Exception $e) {
            \Log::error('Failed to send password reset notification: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $password_reset_request = PasswordResetRequest::findOrFail($id);
        $password_reset_request->delete();
        return redirect()->route('admin.password-reset-requests.index')
            ->with('success', 'Password reset request deleted successfully.');
    }
}