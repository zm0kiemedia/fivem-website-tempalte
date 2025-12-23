<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(\App\Services\FiveMService $fiveMService)
    {
        $serverInfo = $fiveMService->getInfo();
        $players = $fiveMService->getPlayers();
        
        return view('stats.index', compact('serverInfo', 'players'));
    }
}
