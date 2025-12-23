<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(\App\Services\FiveMService $fiveMService)
    {
        // Get server info
        $serverInfo = $fiveMService->getInfo();
        $players = $fiveMService->getPlayers();
        
        // Calculate statistics
        $stats = [
            'playersOnline' => $players ? count($players) : 0,
            'maxPlayers' => $serverInfo['sv_maxClients'] ?? 256,
            'applications' => \App\Models\Application::where('status', 'pending')->count(),
            'applicationsUrgent' => \App\Models\Application::where('status', 'pending')
                ->where('created_at', '<', now()->subDays(3))
                ->count(),
            'tickets' => \App\Models\Ticket::where('status', 'open')->count(),
            'serverOnline' => $serverInfo ? true : false,
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
