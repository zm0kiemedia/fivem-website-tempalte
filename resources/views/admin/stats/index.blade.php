@extends('layouts.admin')

@section('title', 'Server Statistiken')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Server Stats</h1>
            <p class="text-neutral-500">Detaillierte Einblicke in deinen Server.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="flex h-3 w-3 relative">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <span class="text-green-500 font-bold text-sm tracking-wider uppercase">Online</span>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5">
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Spieler Aktuell</p>
            <h3 class="text-3xl font-black text-white">{{ $stats['current_players'] }} <span class="text-lg text-neutral-600">/ {{ $stats['online'] }}</span></h3>
        </div>
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5">
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Server Version</p>
            <h3 class="text-3xl font-black text-white truncate">{{ $stats['version'] }}</h3>
        </div>
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5">
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Ressourcen</p>
            <h3 class="text-3xl font-black text-white">{{ $stats['resources'] }}</h3>
        </div>
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5">
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Uptime</p>
            <h3 class="text-3xl font-black text-green-500">{{ $stats['uptime'] }}</h3>
        </div>
    </div>

    <!-- Player List (Detailed) -->
    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
        <div class="p-6 border-b border-white/5 flex justify-between items-center bg-white/5">
            <h3 class="font-bold text-white flex items-center gap-2">
                <span class="material-icons text-[var(--theme-primary)]">list</span>
                Reale Spielerliste
            </h3>
            <span class="text-xs font-bold text-neutral-500 bg-black/20 px-3 py-1 rounded-full border border-white/5">Live aus FiveM</span>
        </div>
        <div class="max-h-[600px] overflow-y-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-white/5 text-neutral-500 text-xs uppercase tracking-wider">
                        <th class="p-6 font-bold">ID</th>
                        <th class="p-6 font-bold">Name</th>
                        <th class="p-6 font-bold">Ping</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($players as $player)
                        <tr class="group hover:bg-white/5 transition-colors">
                            <td class="p-6 font-mono text-neutral-500">#{{ $player['id'] }}</td>
                            <td class="p-6 font-bold text-white group-hover:text-[var(--theme-primary)] transition-colors">{{ $player['name'] }}</td>
                            <td class="p-6">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $player['ping'] < 50 ? 'bg-green-500/10 text-green-500' : ($player['ping'] < 100 ? 'bg-yellow-500/10 text-yellow-500' : 'bg-red-500/10 text-red-500') }}">
                                    {{ $player['ping'] }}ms
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center text-neutral-500">
                                <span class="material-icons text-4xl mb-2 opacity-50">hotel_class</span>
                                <p>Keine Spieler online.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
