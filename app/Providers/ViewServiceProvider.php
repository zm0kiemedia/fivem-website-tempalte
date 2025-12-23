<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\FiveMService;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(FiveMService $fiveMService): void
    {
        // Share server stats with all views
        View::composer('*', function ($view) use ($fiveMService) {
            $serverInfo = $fiveMService->getInfo();
            
            $view->with('globalServerStats', [
                'online' => $serverInfo ? true : false,
                'players' => $serverInfo['clients'] ?? 0,
                'maxPlayers' => $serverInfo['sv_maxClients'] ?? 0,
            ]);

            // Share theme color
            $themeColor = \App\Models\Setting::where('key', 'theme_color')->value('value') ?? 'orange';
            $view->with('themeColor', $themeColor);

            // Share hero images
            $heroImages = \App\Models\HeroImage::where('is_active', true)->get()->pluck('image_path', 'page');
            $heroImagesUrls = [];
            foreach ($heroImages as $page => $path) {
                $heroImagesUrls[$page] = \Storage::url($path);
            }
            $view->with('heroImages', $heroImagesUrls);
        });
    }
}
