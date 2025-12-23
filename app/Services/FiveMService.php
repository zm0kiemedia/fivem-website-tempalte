<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FiveMService
{
    protected $joinCode;
    protected $apiUrl = 'https://servers-frontend.fivem.net/api/servers/single/';

    public function __construct()
    {
        // Try to get from database first, fallback to .env
        try {
            $this->joinCode = \App\Models\Setting::where('key', 'fivem_join_code')->value('value') 
                              ?? env('FIVEM_JOIN_CODE', 'd43jey');
        } catch (\Exception $e) {
            // During migrations, settings table might not exist yet
            $this->joinCode = env('FIVEM_JOIN_CODE', 'd43jey');
        }
    }

    public function getInfo()
    {
        return Cache::remember('fivem_info', 60, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders([
                        'User-Agent' => 'FiveM-Homepage/1.0',
                    ])
                    ->get($this->apiUrl . $this->joinCode);
                
                $data = $response->json();
                
                if (!isset($data['Data'])) {
                    return null;
                }

                // Map API data to our structure
                $serverData = $data['Data'];
                
                return [
                    'vars' => $serverData['vars'] ?? [],
                    'server' => $serverData['server'] ?? 'Unknown',
                    'ownerName' => $serverData['ownerName'] ?? 'Unknown',
                    'clients' => $serverData['clients'] ?? 0,
                    'sv_maxClients' => $serverData['sv_maxclients'] ?? 32,
                    'hostname' => $serverData['hostname'] ?? 'FiveM Server',
                    'resources' => $serverData['resources'] ?? [],
                    'connectEndPoints' => $serverData['connectEndPoints'] ?? [],
                ];

            } catch (\Exception $e) {
                return null;
            }
        });
    }

    public function getPlayers()
    {
        return Cache::remember('fivem_players', 60, function () {
            try {
                $response = Http::timeout(5)
                    ->withHeaders([
                        'User-Agent' => 'FiveM-Homepage/1.0',
                    ])
                    ->get($this->apiUrl . $this->joinCode);
                
                $data = $response->json();
                
                if (!isset($data['Data']['players'])) {
                    return [];
                }

                return $data['Data']['players'];

            } catch (\Exception $e) {
                return [];
            }
        });
    }
}
