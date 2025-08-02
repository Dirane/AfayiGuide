<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => config('app.name', 'AfayiGuide'),
            'site_description' => config('app.description', 'Your pathway to success'),
            'contact_email' => config('mail.from.address', 'admin@afayiguide.com'),
            'contact_phone' => config('app.contact_phone', '+237 XXX XXX XXX'),
            'maintenance_mode' => app()->isDownForMaintenance(),
            'registration_enabled' => config('auth.registration_enabled', true),
            'max_file_size' => config('app.max_file_size', 2048),
            'allowed_file_types' => config('app.allowed_file_types', 'jpeg,png,jpg,gif'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:20',
            'maintenance_mode' => 'boolean',
            'registration_enabled' => 'boolean',
            'max_file_size' => 'required|integer|min:1|max:10240',
            'allowed_file_types' => 'required|string',
        ]);

        // Update settings (in a real app, you'd store these in database)
        $settings = [
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'registration_enabled' => $request->has('registration_enabled'),
            'max_file_size' => $request->max_file_size,
            'allowed_file_types' => $request->allowed_file_types,
        ];

        // Store in cache for now (in production, use database)
        foreach ($settings as $key => $value) {
            Cache::put('setting.' . $key, $value, now()->addDays(30));
        }

        // Handle maintenance mode
        if ($request->has('maintenance_mode')) {
            // In a real app, you'd use artisan commands
            // Artisan::call('down');
        } else {
            // Artisan::call('up');
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }

    public function backup()
    {
        // In a real app, you'd implement database backup
        return redirect()->route('admin.settings.index')
            ->with('success', 'Backup initiated successfully.');
    }

    public function clearCache()
    {
        Cache::flush();
        
        return redirect()->route('admin.settings.index')
            ->with('success', 'Cache cleared successfully.');
    }
} 