<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.password-reset-request');
    }

    public function submitRequest(Request $request)
    {
        $validated = $request->validate([
            'contact_method' => 'required|in:email,whatsapp',
            'email' => 'required_if:contact_method,email|email|nullable',
            'whatsapp_number' => 'required_if:contact_method,whatsapp|string|nullable',
        ]);

        // Check if user exists
        $user = null;
        if ($validated['contact_method'] === 'email' && $validated['email']) {
            $user = User::where('email', $validated['email'])->first();
        } elseif ($validated['contact_method'] === 'whatsapp' && $validated['whatsapp_number']) {
            $user = User::where('whatsapp_number', $validated['whatsapp_number'])->first();
        }

        if (!$user) {
            return back()->withErrors([
                'contact_method' => 'No account found with the provided information. Please check your details and try again.'
            ]);
        }

        // Create password reset request
        PasswordResetRequest::create([
            'email' => $validated['email'],
            'whatsapp_number' => $validated['whatsapp_number'],
            'request_type' => $validated['contact_method'],
            'status' => 'pending',
        ]);

        return redirect()->route('password-reset-request.success');
    }

    public function showSuccessPage()
    {
        return view('auth.password-reset-request-success');
    }
}