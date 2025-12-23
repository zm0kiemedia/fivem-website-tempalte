<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FiveM Server')</title>
    
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dynamic Theme Colors -->
    <style>
        @php
            $colorMap = [
                'orange' => ['rgb(249, 115, 22)', 'rgb(251, 146, 60)', 'rgb(254, 215, 170)'],
                'blue' => ['rgb(59, 130, 246)', 'rgb(96, 165, 250)', 'rgb(191, 219, 254)'],
                'red' => ['rgb(239, 68, 68)', 'rgb(248, 113, 113)', 'rgb(254, 202, 202)'],
                'green' => ['rgb(34, 197, 94)', 'rgb(74, 222, 128)', 'rgb(187, 247, 208)'],
                'purple' => ['rgb(168, 85, 247)', 'rgb(192, 132, 252)', 'rgb(233, 213, 255)'],
                'pink' => ['rgb(236, 72, 153)', 'rgb(244, 114, 182)', 'rgb(251, 207, 232)'],
                'yellow' => ['rgb(234, 179, 8)', 'rgb(250, 204, 21)', 'rgb(254, 240, 138)'],
            ];
            $colors = $colorMap[$themeColor] ?? $colorMap['orange'];
        @endphp
        
        :root {
            --theme-primary: {{ $colors[0] }};
            --theme-secondary: {{ $colors[1] }};
            --theme-light: {{ $colors[2] }};
        }

        body { font-family: 'Inter', sans-serif; }
        .material-icons { vertical-align: middle; }
        [x-cloak] { display: none !important; }

        /* Apply theme colors dynamically */
        .theme-text { color: var(--theme-primary) !important; }
        .theme-bg { background-color: var(--theme-primary) !important; }
        .theme-border { border-color: var(--theme-primary) !important; }
        .theme-gradient { background: linear-gradient(to right, var(--theme-primary), var(--theme-secondary)) !important; }
    </style>
</head>
<body class="bg-neutral-50 dark:bg-[#050505] text-neutral-800 dark:text-neutral-300 font-sans antialiased selection:bg-[var(--theme-primary)] selection:text-white transition-colors duration-500 overflow-x-hidden" x-data="{ scrolled: false, mobileMenu: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Global Background Elements -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <!-- Light Mode Blobs -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob dark:hidden"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000 dark:hidden"></div>
        
        <!-- Dark Mode Glows -->
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-[var(--theme-primary)]/10 rounded-full blur-[120px] hidden dark:block"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[120px] hidden dark:block"></div>
        
        <!-- Scanlines -->
        <div class="scanlines opacity-5 dark:opacity-10 pointer-events-none"></div>
    </div>
    
    <!-- Floating Navbar -->
    <header class="fixed top-0 w-full transition-all duration-300 px-4 pt-4" style="z-index: 9999;" :class="{ 'pt-0': scrolled }">
            <nav class="container mx-auto rounded-2xl transition-all duration-500 border border-transparent" 
                 :class="{ 'bg-white/80 dark:bg-[#0a0a0a]/80 backdrop-blur-xl shadow-lg border-neutral-200/50 dark:border-white/5 py-3 px-6': scrolled, 'bg-transparent py-6': !scrolled }">
                
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="group flex items-center gap-3 relative">
                        <div class="relative">
                            <span class="material-icons text-4xl text-transparent bg-clip-text bg-gradient-to-tr from-[var(--theme-primary)] to-[var(--theme-secondary)]600  group-hover:from-yellow-400 group-hover:to-[var(--theme-primary)] transition-all duration-500 transform group-hover:scale-110 group-hover:rotate-12">local_fire_department</span>
                            <div class="absolute inset-0 bg-[var(--theme-primary)] blur-xl opacity-0 group-hover:opacity-40 transition-opacity duration-500"></div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black tracking-tighter leading-none dark:text-white text-neutral-900">
                                FIVE<span class="text-[var(--theme-primary)]">M</span>
                            </span>
                            <span class="text-[0.6rem] uppercase tracking-[0.2em] text-neutral-500 font-bold ml-0.5 group-hover:tracking-[0.3em] transition-all duration-500">Roleplay</span>
                        </div>
                    </a>
                    
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center gap-1 bg-white/50 dark:bg-black/20 backdrop-blur-md px-2 py-1.5 rounded-full border border-white/20 dark:border-white/5 shadow-sm">
                        @foreach([
                            ['Home', 'home', 'home'],
                            ['News', 'news.index', 'newspaper'],
                            ['Team', 'team.index', 'groups'],
                            ['Galerie', 'gallery.index', 'collections'],
                            ['Stats', 'stats.index', 'query_stats'],
                            ['Regeln', 'rules', 'gavel'],
                            ['Kontakt', 'contact.index', 'support_agent']
                        ] as $item)
                            <a href="{{ route($item[1]) }}" 
                               class="relative px-4 py-2 rounded-full text-sm font-bold transition-all duration-300 group overflow-hidden
                                      {{ request()->routeIs($item[1] == 'home' ? 'home' : explode('.', $item[1])[0].'*') 
                                         ? 'text-[var(--theme-primary)] dark:text-[var(--theme-primary)] bg-[var(--theme-primary)]/10 dark:bg-[var(--theme-primary)]/10' 
                                         : 'text-neutral-600 dark:text-neutral-400 hover:text-black dark:hover:text-white hover:bg-black/5 dark:hover:bg-white/5' }}">
                                <span class="relative z-10 flex items-center gap-2">
                                    {{ $item[0] }}
                                </span>
                            </a>
                        @endforeach
                    </div>


                    <div class="flex items-center gap-4">
                        @auth
                            <!-- User Dropdown (Simple) -->
                            <div class="hidden md:flex items-center gap-3">
                                <a href="/admin" class="text-sm font-bold text-neutral-600 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">
                                    Administration
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 rounded-xl bg-neutral-100 dark:bg-white/10 text-neutral-900 dark:text-white font-bold text-sm hover:bg-neutral-200 dark:hover:bg-white/20 transition-colors">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @else
                            <!-- Login Button -->
                            <a href="{{ route('login') }}" class="hidden md:flex text-sm font-bold text-neutral-600 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">
                                Login
                            </a>

                            <!-- Apply Button -->
                            <a href="{{ route('applications.create') }}" class="hidden md:flex relative group px-6 py-2.5 rounded-xl font-bold text-sm bg-neutral-900 dark:bg-white text-white dark:text-black overflow-hidden shadow-lg shadow-[var(--theme-primary)]/0 hover:shadow-[var(--theme-primary)]/20 transition-all duration-300 hover:-translate-y-0.5">
                                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-[var(--theme-primary)]  opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                <span class="relative flex items-center gap-2 group-hover:text-white transition-colors duration-100">
                                    <span class="material-icons text-sm">rocket_launch</span>
                                    Bewerben
                                </span>
                            </a>
                        @endauth

                        <!-- Server Stats Widget -->
                        <div class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-xl bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10">
                            @if($globalServerStats['online'])
                                <span class="flex h-2 w-2 relative">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                </span>
                                <span class="text-xs font-bold text-neutral-900 dark:text-white">
                                    {{ $globalServerStats['players'] }}/{{ $globalServerStats['maxPlayers'] }}
                                </span>
                            @else
                                <span class="flex h-2 w-2 bg-red-500 rounded-full"></span>
                                <span class="text-xs font-bold text-neutral-500">Offline</span>
                            @endif
                        </div>

                        <!-- Theme Toggle Switch -->
                         <button id="theme-toggle" class="relative group p-2 rounded-full hover:bg-black/5 dark:hover:bg-white/10 transition-colors">

                            <div class="relative w-6 h-6 overflow-hidden">
                                <span class="material-icons absolute inset-0 transform transition-transform duration-500 rotate-0 dark:rotate-90 dark:translate-y-full text-[var(--theme-primary)]">light_mode</span>
                                <span class="material-icons absolute inset-0 transform transition-transform duration-500 -rotate-90 -translate-y-full dark:rotate-0 dark:translate-y-0 text-yellow-300">dark_mode</span>
                            </div>
                        </button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 text-neutral-800 dark:text-white">
                        <span class="material-icons text-3xl">menu</span>
                    </button>
                </div>

                <!-- Mobile Menu Dropdown -->
                <div x-show="mobileMenu" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="md:hidden mt-4 pb-4 space-y-2 border-t border-neutral-200 dark:border-white/10 pt-4">
                        @foreach([
                            ['Home', 'home'],
                            ['News', 'news.index'],
                            ['Team', 'team.index'],
                            ['Galerie', 'gallery.index'],
                            ['Stats', 'stats.index'],
                            ['Regeln', 'rules'],
                            ['Kontakt', 'contact.index']
                        ] as $item)
                        <a href="{{ route($item[1]) }}" class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs($item[1] == 'home' ? 'home' : explode('.', $item[1])[0].'*') ? 'bg-[var(--theme-primary)]/10 text-[var(--theme-primary)]' : 'text-neutral-500 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-white/5' }}">
                            {{ $item[0] }}
                        </a>
                        @endforeach

                        <div class="border-t border-neutral-200 dark:border-white/10 my-2 pt-2">
                             @auth
                                <a href="/admin" class="block px-4 py-2 rounded-lg text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-white/5">
                                    Administration
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 rounded-lg text-sm font-medium text-red-500 hover:bg-red-500/10">
                                        Logout
                                    </button>
                                </form>
                             @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 rounded-lg text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-white/5">
                                    Login
                                </a>
                                <a href="{{ route('applications.create') }}" class="block px-4 py-2 rounded-lg text-sm font-bold text-[var(--theme-primary)] hover:bg-[var(--theme-primary)]/10">
                                    Bewerben
                                </a>
                             @endauth
                        </div>
                </div>
            </nav>
        </header>

    <div class="relative min-h-screen flex flex-col z-10">
        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="relative bg-white dark:bg-[#080808] border-t border-neutral-200 dark:border-white/5 pt-24 pb-12 overflow-hidden">
            <!-- Footer Content -->
             <div class="container mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <div class="col-span-1 md:col-span-2 space-y-6">
                        <a href="{{ route('home') }}" class="flex items-center gap-2">
                            <span class="material-icons text-4xl text-[var(--theme-primary)]">local_fire_department</span>
                            <span class="text-3xl font-black text-neutral-900 dark:text-white tracking-tighter">FIVE<span class="text-[var(--theme-primary)]">M</span></span>
                        </a>
                        <p class="text-neutral-500 dark:text-neutral-400 text-lg max-w-md leading-relaxed">
                            Erlebe das ultimative Roleplay-Erlebnis in Los Santos. Wir setzen neue Maßstäbe in Sachen Performance, Wirtschaft und Community.
                        </p>
                        <div class="flex gap-4 pt-4">
                            <a href="#" class="w-12 h-12 rounded-full bg-neutral-100 dark:bg-white/5 flex items-center justify-center text-neutral-600 dark:text-neutral-400 hover:bg-[#5865F2] hover:text-white transition-all duration-300 hover:scale-110">
                                <span class="material-icons">discord</span>
                            </a>
                             <a href="#" class="w-12 h-12 rounded-full bg-neutral-100 dark:bg-white/5 flex items-center justify-center text-neutral-600 dark:text-neutral-400 hover:bg-[#1DA1F2] hover:text-white transition-all duration-300 hover:scale-110">
                                <span class="material-icons">rss_feed</span>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-bold text-neutral-900 dark:text-white uppercase tracking-widest text-sm mb-6">Links</h4>
                        <ul class="space-y-4">
                            <li><a href="{{ route('rules') }}" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">Server Regeln</a></li>
                            <li><a href="{{ route('team.index') }}" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">Unser Team</a></li>
                            <li><a href="{{ route('applications.create') }}" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">Bewerben</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold text-neutral-900 dark:text-white uppercase tracking-widest text-sm mb-6">Rechtliches</h4>
                        <ul class="space-y-4">
                            <li><a href="#" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">Impressum</a></li>
                            <li><a href="#" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">Datenschutz</a></li>
                            <li><a href="#" class="text-neutral-500 dark:text-neutral-400 hover:text-[var(--theme-primary)] transition-colors">AGB</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-neutral-200 dark:border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-neutral-500">
                    <p>&copy; {{ date('Y') }} Los Santos Roleplay. Made with <span class="text-red-500">❤</span> for the Community.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Updated Back to Top -->
    <button id="back-to-top" 
            class="fixed bottom-8 right-8 w-14 h-14 bg-white dark:bg-neutral-800 text-neutral-900 dark:text-white rounded-full shadow-2xl border border-neutral-200 dark:border-white/10 flex items-center justify-center translate-y-32 opacity-0 transition-all duration-500 z-50 hover:bg-[var(--theme-primary)] dark:hover:bg-[var(--theme-primary)] hover:text-white hover:border-[var(--theme-primary)] group">
        <span class="material-icons text-2xl group-hover:-translate-y-1 transition-transform duration-300">arrow_upward</span>
    </button>

    <script>
        // Init logic for theme
        const themeToggleBtn = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;

        function initTheme() {
            const isDark = localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) htmlElement.classList.add('dark');
            else htmlElement.classList.remove('dark');
        }
        initTheme();

        themeToggleBtn.addEventListener('click', () => {
             htmlElement.classList.toggle('dark');
             localStorage.setItem('theme', htmlElement.classList.contains('dark') ? 'dark' : 'light');
        });

        // Back to Top
        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove('translate-y-32', 'opacity-0');
            } else {
                backToTopBtn.classList.add('translate-y-32', 'opacity-0');
            }
        });
        backToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>
</body>
</html>
