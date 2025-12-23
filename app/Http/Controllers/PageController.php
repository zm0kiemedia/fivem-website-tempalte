<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(\App\Services\FiveMService $fiveMService)
    {
        // Latest News (3 items)
        $latestNews = \App\Models\NewsPost::latest()->take(3)->get();
        
        // Team Members (top 6 by rank)
        $teamMembers = \App\Models\TeamMember::orderBy('rank')->take(6)->get();
        
        // Gallery Highlights (6 random images)
        $galleryImages = \App\Models\GalleryImage::inRandomOrder()->take(6)->get();
        
        // Server Info & Players
        $serverInfo = $fiveMService->getInfo();
        $players = $fiveMService->getPlayers();
        $topPlayers = collect($players)->take(8); // Top 8 currently online
        
        return view('home', compact('latestNews', 'teamMembers', 'galleryImages', 'serverInfo', 'topPlayers'));
    }

    public function rules()
    {
        $rules = \App\Models\Rule::orderBy('sort_order')->get()->groupBy('section');
        return view('rules', compact('rules'));
    }

    public function info()
    {
        return view('info');
    }
}
