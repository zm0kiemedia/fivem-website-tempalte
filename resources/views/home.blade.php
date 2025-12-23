@extends('layouts.app')

@section('title', 'Willkommen - FiveM Server')

@section('content')
    <!-- Hero Section with Parallax & 3D Text -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden perspective-1000 pt-20">
        <!-- Parallax Backgrounds -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['home'] ?? 'https://images.unsplash.com/photo-1542397284385-6010376c5337?q=80&w=1920&auto=format&fit=crop' }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Text Content -->
            <div class="space-y-8 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 dark:bg-[var(--theme-primary)]/20 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] dark:text-[var(--theme-secondary)] font-bold tracking-widest text-xs uppercase animate-pulse">
                    <span class="w-2 h-2 rounded-full bg-[var(--theme-primary)] animate-ping"></span>
                    Season 2.0 Available
                </div>

                <h1 class="text-7xl md:text-8xl font-black tracking-tighter text-neutral-900 dark:text-white leading-[0.9]">
                    NEXT GEN <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--theme-primary)] via-red-500  animate-gradient-x">ROLEPLAY</span>
                </h1>

                <p class="text-lg md:text-xl text-neutral-600 dark:text-neutral-400 max-w-lg leading-relaxed">
                    Tauche ein in eine lebendige Welt ohne Grenzen. Wirtschaftssystem auf Wall-Street Niveau, Fraktionen mit Tiefgang und Performance, die begeistert.
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="fivem://connect/play.fivem-server.de" class="group relative px-8 py-4 bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 font-black uppercase tracking-wider rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300 shadow-xl shadow-[var(--theme-primary)]/20">
                        <span class="absolute inset-0 bg-gradient-to-r from-[var(--theme-primary)]  opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="relative flex items-center gap-3 group-hover:text-white dark:group-hover:text-white transition-colors">
                            <span class="material-icons">play_arrow</span>
                            Jetzt Spielen
                        </span>
                    </a>
                    
                    <a href="#" class="px-8 py-4 bg-white dark:bg-white/5 text-neutral-900 dark:text-white font-bold uppercase tracking-wider rounded-xl border border-neutral-200 dark:border-white/10 hover:bg-neutral-50 dark:hover:bg-white/10 transition-colors backdrop-blur-md flex items-center gap-3">
                        <span class="material-icons">discord</span>
                        Discord
                    </a>
                </div>
            </div>

            <!-- Right: 3D Floating Elements -->
            <div class="relative hidden lg:block h-[600px] w-full transform-style-3d animate-float">
                <!-- Main Card -->
                <div class="absolute top-[10%] right-[10%] w-80 h-[450px] bg-white/10 dark:bg-black/40 backdrop-blur-2xl border border-white/20 dark:border-white/10 rounded-3xl p-6 shadow-2xl transform rotate-y-12 rotate-z-6 transition-all hover:rotate-0 hover:scale-105 duration-500 group">
                    <div class="h-1/2 rounded-2xl bg-[url('https://images.unsplash.com/photo-1605218427306-022ba7748521?q=80&w=600')] bg-cover bg-center mb-6 overflow-hidden">
                        <div class="w-full h-full bg-black/20 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>
                    <h3 class="text-2xl font-black text-neutral-900 dark:text-white mb-2">High Performance</h3>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400 leading-relaxed">
                        Optimierter Code und High-End Server Hardware garantieren dir ein lagfreies Erlebnis, selbst bei 200+ Spielern.
                    </p>
                    <div class="mt-6 flex items-center gap-2">
                         <span class="text-xs font-bold px-2 py-1 bg-green-500/20 text-green-600 dark:text-green-400 rounded">128 Tick</span>
                         <span class="text-xs font-bold px-2 py-1 bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded">DDoS Protect</span>
                    </div>
                </div>

                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-2 text-neutral-400 animate-bounce">
            <span class="text-xs uppercase tracking-[0.3em]">Scroll</span>
            <span class="material-icons">keyboard_arrow_down</span>
        </div>
    </section>

    <!-- Features Section (Tilt Cards) -->
    <section class="py-32 relative bg-white dark:bg-[#080808] z-20">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <span class="text-[var(--theme-primary)] font-bold tracking-widest text-sm uppercase">Features</span>
                <h2 class="text-4xl md:text-6xl font-black text-neutral-900 dark:text-white">UNLIMITED <br> POSSIBILITIES</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 perspective-1000">
                <!-- Gangs -->
                <div class="group relative bg-neutral-50 dark:bg-[#0f0f0f] rounded-3xl overflow-hidden border border-neutral-200 dark:border-white/5 hover:border-[var(--theme-primary)]/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/10">
                    <div class="h-64 overflow-hidden relative">
                         <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('img/features/fraktionen.png') }}');"></div>
                         <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 dark:from-[#0f0f0f] to-transparent"></div>
                    </div>
                    <div class="p-8 relative -mt-12">
                        <div class="w-16 h-16 bg-white dark:bg-neutral-800 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:bg-[var(--theme-primary)] transition-colors duration-300">
                             <span class="material-icons text-3xl text-neutral-900 dark:text-white group-hover:text-white">groups</span>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-3">Fraktionen</h3>
                        <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                            Gründe deine eigene Gang, beanspruche Gebiete und kämpfe um die Vorherrschaft. Oder sorge als Cop für Recht und Ordnung.
                        </p>
                    </div>
                </div>

                <!-- Economy -->
                <div class="group relative bg-neutral-50 dark:bg-[#0f0f0f] rounded-3xl overflow-hidden border border-neutral-200 dark:border-white/5 hover:border-blue-500/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/10">
                   <div class="h-64 overflow-hidden relative">
                         <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('img/features/wirtschaft.png') }}');"></div>
                         <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 dark:from-[#0f0f0f] to-transparent"></div>
                    </div>
                    <div class="p-8 relative -mt-12">
                        <div class="w-16 h-16 bg-white dark:bg-neutral-800 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:bg-blue-500 transition-colors duration-300">
                             <span class="material-icons text-3xl text-neutral-900 dark:text-white group-hover:text-white">paid</span>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-3">Wirtschaft</h3>
                        <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                            Ein dynamisches Wirtschaftssystem, in dem Angebot und Nachfrage die Preise bestimmen. Werde Unternehmer oder Investor.
                        </p>
                    </div>
                </div>

                <!-- Tuning -->
                <div class="group relative bg-neutral-50 dark:bg-[#0f0f0f] rounded-3xl overflow-hidden border border-neutral-200 dark:border-white/5 hover:border-purple-500/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-purple-500/10">
                    <div class="h-64 overflow-hidden relative">
                         <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ asset('img/features/tuning.png') }}');"></div>
                         <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 dark:from-[#0f0f0f] to-transparent"></div>
                    </div>
                    <div class="p-8 relative -mt-12">
                        <div class="w-16 h-16 bg-white dark:bg-neutral-800 rounded-2xl flex items-center justify-center shadow-lg mb-6 group-hover:bg-purple-500 transition-colors duration-300">
                             <span class="material-icons text-3xl text-neutral-900 dark:text-white group-hover:text-white">speed</span>
                        </div>
                        <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-3">Tuning</h3>
                        <p class="text-neutral-600 dark:text-neutral-400 leading-relaxed">
                             Importfahrzeuge und unbegrenzte Tuning-Möglichkeiten. Custom Handling für maximalen Fahrspaß und Realismus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="py-32 bg-neutral-50 dark:bg-[#0a0a0a] relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-10 left-10 w-72 h-72 bg-[var(--theme-primary)]/5 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20 animate-fade-in-up">
                <span class="inline-block px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] font-bold tracking-widest text-sm uppercase mb-4">
                    <span class="material-icons text-xs mr-1">newspaper</span>
                    Aktuelles
                </span>
                <h2 class="text-5xl md:text-6xl font-black text-neutral-900 dark:text-white mt-4 tracking-tight">
                    Neueste <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)]">Updates</span>
                </h2>
                <p class="text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto mt-4">
                    Bleib auf dem Laufenden mit den neuesten Entwicklungen und Events
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestNews as $index => $post)
                    <a href="{{ route('news.show', $post->slug) }}" 
                       class="group block bg-white/70 dark:bg-white/5 backdrop-blur-xl rounded-3xl overflow-hidden border border-neutral-200/50 dark:border-white/10 hover:border-[var(--theme-primary)]/50 transition-all hover:-translate-y-3 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/20 animate-fade-in-up" 
                       style="animation-delay: {{ $index * 100 }}ms">
                        @if($post->image)
                            <div class="h-56 overflow-hidden relative">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-black/50 backdrop-blur-sm text-white text-xs font-bold">
                                    <span class="material-icons text-xs mr-1">schedule</span>
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @endif
                        <div class="p-8">
                            <div class="flex items-center gap-2 text-xs text-[var(--theme-primary)] font-bold uppercase tracking-wider mb-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-[var(--theme-primary)] animate-pulse"></span>
                                {{ $post->created_at->format('d. M Y') }}
                            </div>
                            <h3 class="text-2xl font-black text-neutral-900 dark:text-white mb-3 group-hover:text-[var(--theme-primary)] transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-neutral-600 dark:text-neutral-400 text-sm leading-relaxed line-clamp-3">
                                {!! Str::limit(strip_tags($post->body), 140) !!}
                            </p>
                            <div class="mt-6 flex items-center gap-2 text-[var(--theme-primary)] font-bold text-sm group-hover:gap-4 transition-all">
                                Weiterlesen
                                <span class="material-icons text-lg">arrow_forward</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center bg-white/50 dark:bg-white/5 backdrop-blur-xl rounded-3xl p-16 border border-neutral-200/50 dark:border-white/10">
                        <span class="material-icons text-6xl text-neutral-400 mb-4">article</span>
                        <p class="text-neutral-500 font-bold">Keine News verfügbar.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-16 animate-fade-in-up" style="animation-delay: 400ms">
                <a href="{{ route('news.index') }}" class="group inline-flex items-center gap-3 px-10 py-5 rounded-2xl bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)] text-white font-black hover:scale-105 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/40 transition-all text-lg">
                    <span class="material-icons">library_books</span>
                    Alle News anzeigen
                    <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Team Showcase -->
    <section class="py-32 bg-gradient-to-b from-white to-neutral-50 dark:from-[#080808] dark:to-[#0a0a0a] relative overflow-hidden">
        <!-- Grid Pattern Background -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAwIDEwIEwgNDAgMTAgTSAxMCAwIEwgMTAgNDAgTSAwIDIwIEwgNDAgMjAgTSAyMCAwIEwgMjAgNDAgTSAwIDMwIEwgNDAgMzAgTSAzMCAwIEwgMzAgNDAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgwLDAsMCwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40 dark:opacity-10"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20 animate-fade-in-up">
                <span class="inline-block px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] font-bold tracking-widest text-sm uppercase mb-4">
                    <span class="material-icons text-xs mr-1">groups</span>
                    Unser Team
                </span>
                <h2 class="text-5xl md:text-6xl font-black text-neutral-900 dark:text-white mt-4 tracking-tight">
                    Die <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)]">Köpfe</span> dahinter
                </h2>
                <p class="text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto mt-4">
                    Lerne das Team kennen, das Tag und Nacht für euch da ist
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                @forelse($teamMembers as $index => $member)
                    <div class="group text-center animate-fade-in-up" style="animation-delay: {{ $index * 80 }}ms">
                        <div class="relative mb-6 mx-auto w-28 h-28 md:w-36 md:h-36">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-[var(--theme-primary)] to-[var(--theme-secondary)] rounded-full blur-2xl opacity-0 group-hover:opacity-60 transition-all duration-500 scale-75 group-hover:scale-100"></div>
                            <!-- Ring Animation -->
                            <div class="absolute inset-0 rounded-full border-2 border-[var(--theme-primary)]/20 group-hover:scale-110 group-hover:border-[var(--theme-primary)]/40 transition-all duration-500"></div>
                            <!-- Image -->
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" 
                                     alt="{{ $member->name }}" 
                                     class="relative rounded-full w-full h-full object-cover border-4 border-white dark:border-[#080808] shadow-2xl group-hover:scale-105 transition-all duration-500">
                            @else
                                <div class="relative rounded-full w-full h-full bg-gradient-to-br from-[var(--theme-primary)] to-[var(--theme-secondary)] flex items-center justify-center border-4 border-white dark:border-[#080808] shadow-2xl group-hover:scale-105 transition-all duration-500">
                                    <span class="text-white font-black text-3xl">{{ substr($member->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <!-- Badge -->
                            <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-[var(--theme-primary)] text-white text-xs font-bold shadow-lg whitespace-nowrap">
                                # {{ $member->rank ?? $index + 1 }}
                            </div>
                        </div>
                        <h3 class="font-black text-neutral-900 dark:text-white text-base md:text-lg mb-1 group-hover:text-[var(--theme-primary)] transition-colors">
                            {{ $member->name }}
                        </h3>
                        <p class="text-sm text-[var(--theme-primary)] font-bold">{{ $member->role }}</p>
                        @if($member->discord)
                            <p class="text-xs text-neutral-500 mt-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="material-icons text-xs">discord</span> {{ $member->discord }}
                            </p>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center bg-white/50 dark:bg-white/5 backdrop-blur-xl rounded-3xl p-16 border border-neutral-200/50 dark:border-white/10">
                        <span class="material-icons text-6xl text-neutral-400 mb-4">person_off</span>
                        <p class="text-neutral-500 font-bold">Team wird geladen...</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-16 animate-fade-in-up" style="animation-delay: 500ms">
                <a href="{{ route('team.index') }}" class="group inline-flex items-center gap-3 px-10 py-5 rounded-2xl bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 font-black hover:scale-105 hover:shadow-2xl transition-all text-lg">
                    <span class="material-icons">people</span>
                    Gesamtes Team
                    <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Highlights -->
    <section class="py-32 bg-neutral-100 dark:bg-[#0a0a0a] relative overflow-hidden">
        <!-- Floating Orbs -->
        <div class="absolute top-20 right-20 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-[var(--theme-primary)]/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20 animate-fade-in-up">
                <span class="inline-block px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] font-bold tracking-widest text-sm uppercase mb-4">
                    <span class="material-icons text-xs mr-1">photo_library</span>
                    Impressionen
                </span>
                <h2 class="text-5xl md:text-6xl font-black text-neutral-900 dark:text-white mt-4 tracking-tight">
                    Unsere <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)]">Galerie</span>
                </h2>
                <p class="text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto mt-4">
                    Ein Blick hinter die Kulissen - Momente die bleiben
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($galleryImages as $index => $image)
                    <div class="group relative aspect-video rounded-3xl overflow-hidden animate-fade-in-up" style="animation-delay: {{ $index * 60 }}ms">
                        <img src="{{ Storage::url($image->image_url) }}" 
                             alt="{{ $image->caption }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                        <!-- Category Badge -->
                        <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-[var(--theme-primary)]/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider">
                            {{ $image->category }}
                        </div>
                        <!-- Caption -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-2 group-hover:translate-y-0 transition-transform">
                            <p class="text-white font-bold text-lg mb-1">{{ $image->caption ?: 'Impression' }}</p>
                            <div class="flex items-center gap-2 text-white/80 text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="material-icons text-sm">visibility</span>
                                Ansehen
                            </div>
                        </div>
                        <!-- Hover Border -->
                        <div class="absolute inset-0 border-4 border-[var(--theme-primary)]/0 group-hover:border-[var(--theme-primary)]/50 rounded-3xl transition-all pointer-events-none"></div>
                    </div>
                @empty
                    <div class="col-span-full text-center bg-white/50 dark:bg-white/5 backdrop-blur-xl rounded-3xl p-16 border border-neutral-200/50 dark:border-white/10">
                        <span class="material-icons text-6xl text-neutral-400 mb-4">image_not_supported</span>
                        <p class="text-neutral-500 font-bold">Keine Bilder verfügbar.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-16 animate-fade-in-up" style="animation-delay: 400ms">
                <a href="{{ route('gallery.index') }}" class="group inline-flex items-center gap-3 px-10 py-5 rounded-2xl bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)] text-white font-black hover:scale-105 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/40 transition-all text-lg">
                    <span class="material-icons">collections</span>
                    Zur Galerie
                    <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section (Matrix Style) -->
    <section class="py-32 bg-gradient-to-b from-neutral-100 to-neutral-50 dark:from-[#0a0a0a] dark:to-[#050505] border-y border-neutral-200 dark:border-white/5 relative overflow-hidden">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(0,0,0,0.05) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 animate-fade-in-up">
                <span class="inline-block px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] font-bold tracking-widest text-sm uppercase mb-4">
                    <span class="material-icons text-xs mr-1">analytics</span>
                    Server Performance
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-neutral-900 dark:text-white">
                    In <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)]">Echtzeit</span>
                </h2>
            </div>

            <div class="flex flex-wrap justify-center gap-6 md:gap-8">
                <!-- Status Card -->
                <div class="group relative flex flex-col items-center p-8 bg-white/70 dark:bg-white/5 backdrop-blur-xl rounded-3xl border-2 border-neutral-200/50 dark:border-white/10 w-48 hover:scale-105 hover:border-{{ $globalServerStats['online'] ? 'green' : 'red' }}-500/50 transition-all duration-500 hover:shadow-2xl animate-fade-in-up">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)] text-white text-xs font-bold uppercase tracking-wider shadow-lg">
                        Status
                    </div>
                    <span class="text-5xl font-black {{ $globalServerStats['online'] ? 'text-green-500' : 'text-red-500' }} mb-4 group-hover:scale-110 transition-transform">
                        {{ $globalServerStats['online'] ? 'ON' : 'OFF' }}
                    </span>
                    <span class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Server Status</span>
                </div>

                <!-- Players Card -->
                <div class="group relative flex flex-col items-center p-8 bg-white/70 dark:bg-white/5 backdrop-blur-xl rounded-3xl border-2 border-neutral-200/50 dark:border-white/10 w-48 hover:scale-105 hover:border-[var(--theme-primary)]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/20 animate-fade-in-up" style="animation-delay: 100ms">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[var(--theme-primary)] to-[var(--theme-secondary)] text-white text-xs font-bold uppercase tracking-wider shadow-lg">
                        Spieler
                    </div>
                    <span class="text-5xl font-black text-[var(--theme-primary)] mb-2 group-hover:scale-110 transition-transform">
                        {{ $globalServerStats['players'] }}
                    </span>
                    <span class="text-sm text-neutral-400 font-mono mb-4">/ {{ $globalServerStats['maxPlayers'] }}</span>
                    <span class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Online Jetzt</span>
                </div>

                <!-- Uptime Card -->
                <div class="group relative flex flex-col items-center p-8 bg-white/70 dark:bg-white/5 backdrop-blur-xl rounded-3xl border-2 border-neutral-200/50 dark:border-white/10 w-48 hover:scale-105 hover:border-blue-500/50 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/20 animate-fade-in-up" style="animation-delay: 200ms">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-xs font-bold uppercase tracking-wider shadow-lg">
                        Uptime
                    </div>
                    <span class="text-5xl font-black text-blue-500 mb-4 group-hover:scale-110 transition-transform">24/7</span>
                    <span class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Verfügbarkeit</span>
                </div>

                <!-- Ping Card -->
                <div class="group relative flex flex-col items-center p-8 bg-white/70 dark:bg-white/5 backdrop-blur-xl rounded-3xl border-2 border-neutral-200/50 dark:border-white/10 w-48 hover:scale-105 hover:border-purple-500/50 transition-all duration-500 hover:shadow-2xl hover:shadow-purple-500/20 animate-fade-in-up" style="animation-delay: 300ms">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-bold uppercase tracking-wider shadow-lg">
                        Latenz
                    </div>
                    <span class="text-5xl font-black text-purple-500 mb-4 group-hover:scale-110 transition-transform">&lt;20</span>
                    <span class="text-xs uppercase tracking-widest text-neutral-500 font-bold">Millisekunden</span>
                </div>
            </div>
        </div>
    </section>
@endsection
