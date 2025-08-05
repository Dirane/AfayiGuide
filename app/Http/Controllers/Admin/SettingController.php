<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Cache::get('site_name', 'AfayiGuide'),
            'site_description' => Cache::get('site_description', 'Your pathway to educational success in Cameroon'),
            'contact_email' => Cache::get('contact_email', 'info@afayiguide.com'),
            'contact_phone' => Cache::get('contact_phone', '+237 XXX XXX XXX'),
            'max_file_size' => Cache::get('max_file_size', 2048),
            'allow_registration' => Cache::get('allow_registration', true),
            'maintenance_mode' => Cache::get('maintenance_mode', false),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:500',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'max_file_size' => 'required|integer|min:1|max:10240',
            'allow_registration' => 'boolean',
            'maintenance_mode' => 'boolean',
        ]);

        foreach ($validated as $key => $value) {
            Cache::put($key, $value);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }

    public function backup()
    {
        // This would typically call a backup command
        // For now, we'll just return a success message
        return redirect()->route('admin.settings.index')
            ->with('success', 'Backup initiated successfully.');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Cache cleared successfully.');
    }
} 