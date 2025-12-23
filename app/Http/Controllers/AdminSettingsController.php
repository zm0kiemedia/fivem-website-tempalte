<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'fivem_join_code' => Setting::where('key', 'fivem_join_code')->value('value') ?? env('FIVEM_JOIN_CODE', 'd43jey'),
            'theme_color' => Setting::where('key', 'theme_color')->value('value') ?? 'orange',
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'fivem_join_code' => 'required|string|max:255',
            'theme_color' => 'required|string|in:orange,blue,red,green,purple,pink,yellow',
        ]);

        Setting::updateOrCreate(
            ['key' => 'fivem_join_code'],
            ['value' => $validated['fivem_join_code']]
        );

        Setting::updateOrCreate(
            ['key' => 'theme_color'],
            ['value' => $validated['theme_color']]
        );

        // Clear cache since FiveMService caches API responses
        Cache::forget('fivem_info');
        Cache::forget('fivem_players');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Einstellungen erfolgreich aktualisiert.');
    }
}
