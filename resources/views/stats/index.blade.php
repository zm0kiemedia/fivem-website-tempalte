@extends('layouts.app')

@section('title', 'Statistiken - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['stats'] ?? 'https://images.unsplash.com/photo-1558494949-efc5270f9c63?q=80&w=1920&auto=format&fit=crop' }}');"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-xs font-bold uppercase tracking-widest mb-4">
                Realtime Data
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                LIVE STATS
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Aktuelle Server-Daten, Spielerzahlen und mehr in Echtzeit.
            </p>
        </div>
    </section>

    <!-- Stats Content -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20">
        <div class="container mx-auto px-6">
            <!-- Server Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <!-- Status Card -->
                <div class="bg-white dark:bg-[#0a0a0a] p-8 rounded-3xl border border-neutral-200 dark:border-white/5 relative overflow-hidden group">
                     <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-icons text-9xl text-neutral-900 dark:text-white">dns</span>
                    </div>
                    
                    <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-blue-500 rounded-full"></span>
                        Server Status
                    </h2>

                    @if($serverInfo)
                        <div class="space-y-6">
                            <div>
                                <div class="flex justify-between items-end mb-2">
                                    <span class="text-neutral-500 dark:text-neutral-400 font-bold uppercase text-xs tracking-wider">Spieler Online</span>
                                    <span class="text-3xl font-black text-neutral-900 dark:text-white">{{ $serverInfo['clients'] }} <span class="text-lg text-neutral-400">/ {{ $serverInfo['sv_maxClients'] }}</span></span>
                                </div>
                                <div class="h-2 bg-neutral-100 dark:bg-white/10 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-400" style="width: {{ ($serverInfo['clients'] / $serverInfo['sv_maxClients']) * 100 }}%"></div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-neutral-50 dark:bg-white/5 p-4 rounded-xl border border-neutral-100 dark:border-white/5">
                                    <span class="block text-neutral-500 dark:text-neutral-400 text-xs font-bold uppercase mb-1">Status</span>
                                    <span class="text-green-500 font-bold flex items-center gap-2">
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                        Online
                                    </span>
                                </div>
                                <div class="bg-neutral-50 dark:bg-white/5 p-4 rounded-xl border border-neutral-100 dark:border-white/5">
                                    <span class="block text-neutral-500 dark:text-neutral-400 text-xs font-bold uppercase mb-1">Game Build</span>
                                    <span class="text-neutral-900 dark:text-white font-bold">{{ $serverInfo['vars']['sv_enforceGameBuild'] ?? 'Latest' }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center h-48 text-neutral-500">
                             <span class="material-icons text-4xl mb-2 text-red-500">wifi_off</span>
                             <span class="font-bold">Server Offline</span>
                        </div>
                    @endif
                </div>

                <!-- Connect Card -->
                <div class="bg-white dark:bg-[#0a0a0a] p-8 rounded-3xl border border-neutral-200 dark:border-white/5 relative overflow-hidden group flex flex-col justify-between">
                     <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-icons text-9xl text-neutral-900 dark:text-white">link</span>
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-6 flex items-center gap-3">
                            <span class="w-2 h-8 bg-[var(--theme-primary)] rounded-full"></span>
                            Direct Connect
                        </h2>
                        <p class="text-neutral-600 dark:text-neutral-400 mb-8 leading-relaxed">
                            Verbinde dich direkt mit Los Santos und starte dein Abenteuer. Stelle sicher, dass FiveM installiert und geöffnet ist.
                        </p>
                    </div>

                    <a href="https://cfx.re/join/{{ env('FIVEM_JOIN_CODE') }}" class="w-full py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold text-center uppercase tracking-widest transition-all shadow-lg shadow-[var(--theme-primary)]/20 hover:scale-[1.02]">
                        <span class="flex items-center justify-center gap-3">
                            <span class="material-icons">play_arrow</span>
                            Jetzt Verbinden
                        </span>
                    </a>
                </div>
            </div>


        </div>
    </section>
@endsection
