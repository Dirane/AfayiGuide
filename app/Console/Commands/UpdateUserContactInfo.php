<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdateUserContactInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:update-contact-info {email} {--whatsapp=} {--phone=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user contact information for mentorship bookings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $whatsapp = $this->option('whatsapp');
        $phone = $this->option('phone');

        if (!$whatsapp && !$phone) {
            $this->error('Please provide either --whatsapp or --phone option');
            return 1;
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email '{$email}' not found");
            return 1;
        }

        $updates = [];
        
        if ($whatsapp) {
            $updates['whatsapp_number'] = $whatsapp;
            $this->info("WhatsApp number will be updated to: {$whatsapp}");
        }
        
        if ($phone) {
            $updates['phone'] = $phone;
            $this->info("Phone number will be updated to: {$phone}");
        }

        $user->update($updates);

        $this->info("User '{$user->name}' contact information updated successfully!");
        $this->info("Current contact info:");
        $this->info("  WhatsApp: " . ($user->whatsapp_number ?? 'Not set'));
        $this->info("  Phone: " . ($user->phone ?? 'Not set'));

        return 0;
    }
}
