<?php

namespace App\Http\Controllers;

use App\Services\FiveMService;
use Illuminate\Http\Request;

class AdminStatsController extends Controller
{
    protected $fiveMService;

    public function __construct(FiveMService $fiveMService)
    {
        $this->fiveMService = $fiveMService;
    }

    public function index()
    {
        $serverInfo = $this->fiveMService->getInfo();
        $players = $this->fiveMService->getPlayers();
        
        // Calculate some basic stats manually since history isn't tracked yet
        $stats = [
            'online' => $serverInfo['sv_maxClients'] ?? 0,
            'current_players' => $serverInfo['clients'] ?? 0,
            'uptime' => '99.9%', // Hardcoded for now
            'version' => $serverInfo['server'] ?? 'Unknown',
            'resources' => count($serverInfo['resources'] ?? []), 
        ];

        return view('admin.stats.index', compact('serverInfo', 'players', 'stats'));
    }
}
