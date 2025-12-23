<!DOCTYPE html>
<html lang="de" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - FiveM</title>
    
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
        
        /* Custom Scrollbar for Sidebar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-[#050505] text-neutral-300 font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: true }">
    
    <!-- Global Background -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-[var(--theme-primary)]/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-5"></div>
    </div>

    <div class="relative z-10 flex h-screen">
        
        <!-- Sidebar -->
        <aside class="flex flex-col w-72 h-full bg-[#0a0a0a]/80 backdrop-blur-xl border-r border-white/5 transition-all duration-300 transform"
               :class="{ '-translate-x-full absolute z-50': !sidebarOpen, 'relative translate-x-0': sidebarOpen }">
            
            <!-- Logo -->
            <div class="p-8 pb-4 flex items-center gap-3">
                <span class="material-icons text-3xl text-[var(--theme-primary)]">local_fire_department</span>
                <div class="flex flex-col">
                    <span class="text-xl font-black text-white tracking-tighter leading-none">FIVE<span class="text-[var(--theme-primary)]">M</span></span>
                    <span class="text-[0.6rem] uppercase tracking-widest text-neutral-500 font-bold">Admin Panel</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-1 no-scrollbar">
                
                <p class="px-4 text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2 mt-4">Main</p>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20' : 'text-neutral-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-icons text-xl">dashboard</span>
                    <span class="font-bold text-sm">Dashboard</span>
                </a>

                <p class="px-4 text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2 mt-8">Content</p>
                @foreach([
                    ['News', 'admin.news.index', 'newspaper'],
                    ['Team', 'admin.team.index', 'groups'],
                    ['Galerie', 'admin.gallery.index', 'collections'],
                    ['Stats', 'admin.stats.index', 'query_stats'],
                    ['Regelwerk', 'admin.rules.index', 'menu_book'],
                ] as $item)
                <a href="{{ route($item[1]) }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs(str_replace('.index', '*', $item[1])) ? 'bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20' : 'text-neutral-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-icons text-xl">{{ $item[2] }}</span>
                    <span class="font-bold text-sm">{{ $item[0] }}</span>
                </a>
                @endforeach

                <p class="px-4 text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2 mt-8">Community</p>
                @foreach([
                    ['Bewerbungen', 'admin.applications.index', 'description'],
                    ['Tickets', 'admin.tickets.index', 'confirmation_number'],
                ] as $item)
                <a href="{{ route($item[1]) }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs(str_replace('.index', '*', $item[1])) ? 'bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20' : 'text-neutral-400 hover:bg-white/5 hover:text-white' }}">
                     <span class="material-icons text-xl">{{ $item[2] }}</span>
                    <span class="font-bold text-sm">{{ $item[0] }}</span>
                </a>
                @endforeach

                <p class="px-4 text-xs font-bold text-neutral-500 uppercase tracking-wider mb-2 mt-8">System</p>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.users.*') ? 'bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20' : 'text-neutral-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-icons text-xl">people</span>
                    <span class="font-bold text-sm">Benutzer</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings*') ? 'bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20' : 'text-neutral-400 hover:bg-white/5 hover:text-white' }}">
                    <span class="material-icons text-xl">settings</span>
                    <span class="font-bold text-sm">Einstellungen</span>
                </a>

            </nav>

            <!-- User -->
            <div class="p-4 border-t border-white/5">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5">
                    <div class="w-10 h-10 rounded-full bg-[var(--theme-primary)] flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-neutral-500 truncate">{{ Auth::user()->email ?? 'admin@fivem.de' }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-neutral-500 hover:text-red-500 transition-colors">
                            <span class="material-icons">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto relative h-full">
            <!-- Topbar -->
            <header class="sticky top-0 z-30 flex items-center justify-between px-8 py-6 bg-[#050505]/80 backdrop-blur-md border-b border-white/5">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-xl hover:bg-white/5 text-neutral-400 transition-colors">
                    <span class="material-icons">menu_open</span>
                </button>
                
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-sm font-bold text-neutral-500 hover:text-[var(--theme-primary)] transition-colors">
                        <span class="material-icons text-lg">public</span>
                        Website öffnen
                    </a>
                </div>
            </header>

            <div class="p-8 pb-20">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
