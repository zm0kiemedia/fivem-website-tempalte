@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-10">
        <h1 class="text-3xl font-black text-white mb-2">Dashboard</h1>
        <p class="text-neutral-500">Willkommen zurück! Hier ist ein Überblick über deinen Server.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Players -->
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-icons text-6xl text-white">groups</span>
            </div>
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Spieler Online</p>
            <h3 class="text-3xl font-black text-white">{{ $stats['playersOnline'] }} <span class="text-lg text-neutral-600">/ {{ $stats['maxPlayers'] }}</span></h3>
            <div class="mt-4 flex items-center gap-2 text-{{ $stats['playersOnline'] > 0 ? 'green' : 'neutral' }}-500 text-sm font-bold">
                <span class="material-icons text-sm">{{ $stats['playersOnline'] > 0 ? 'trending_up' : 'remove' }}</span>
                {{ $stats['playersOnline'] > 0 ? 'Server aktiv' : 'Keine Spieler' }}
            </div>
        </div>

        <!-- Applications -->
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-icons text-6xl text-white">description</span>
            </div>
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Offene Bewerbungen</p>
            <h3 class="text-3xl font-black text-white">{{ $stats['applications'] }}</h3>
            <div class="mt-4 flex items-center gap-2 text-{{ $stats['applicationsUrgent'] > 0 ? '[var(--theme-primary)]' : 'neutral-500' }} text-sm font-bold">
                <span class="material-icons text-sm">{{ $stats['applicationsUrgent'] > 0 ? 'priority_high' : 'check_circle' }}</span>
                {{ $stats['applicationsUrgent'] > 0 ? $stats['applicationsUrgent'] . ' dringend' : 'Alles bearbeitet' }}
            </div>
        </div>

        <!-- Tickets -->
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-icons text-6xl text-white">confirmation_number</span>
            </div>
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Support Tickets</p>
            <h3 class="text-3xl font-black text-white">{{ $stats['tickets'] }}</h3>
            <div class="mt-4 flex items-center gap-2 text-neutral-500 text-sm font-bold">
                <span class="material-icons text-sm">schedule</span>
                {{ $stats['tickets'] > 0 ? 'Benötigt Antwort' : 'Alle beantwortet' }}
            </div>
        </div>

        <!-- System -->
        <div class="bg-[#0a0a0a] p-6 rounded-3xl border border-white/5 relative overflow-hidden group">
             <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition-opacity">
                <span class="material-icons text-6xl text-white">memory</span>
            </div>
            <p class="text-neutral-500 text-xs font-bold uppercase tracking-wider mb-1">Server Status</p>
            <h3 class="text-3xl font-black text-{{ $stats['serverOnline'] ? 'green' : 'red' }}-500">{{ $stats['serverOnline'] ? 'Online' : 'Offline' }}</h3>
            <div class="mt-4 flex items-center gap-2 text-neutral-500 text-sm font-bold">
                <span class="material-icons text-sm">dns</span>
                FiveM Server
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Newest Applications -->
        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
            <div class="p-6 border-b border-white/5 flex justify-between items-center">
                <h3 class="font-bold text-white flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">fiber_new</span>
                    Neue Bewerbungen
                </h3>
                <a href="{{ route('admin.applications.index') }}" class="text-xs font-bold text-neutral-500 hover:text-white transition-colors">Alle anzeigen</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse(\App\Models\Application::latest()->take(3)->get() as $application)
                <div class="p-4 hover:bg-white/5 transition-colors flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[var(--theme-primary)] to-[var(--theme-secondary)] flex items-center justify-center text-xs font-bold text-white">
                        {{ substr($application->name, 0, 1) }}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-bold text-white">{{ $application->name }}</h4>
                        <p class="text-xs text-neutral-500">{{ $application->position }} • {{ $application->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('admin.applications.show', $application) }}" class="p-2 rounded-lg bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] hover:bg-[var(--theme-primary)] hover:text-white transition-all">
                        <span class="material-icons text-lg">visibility</span>
                    </a>
                </div>
                @empty
                <div class="p-8 text-center text-neutral-500">
                    <span class="material-icons text-4xl mb-2">inbox</span>
                    <p class="text-sm font-bold">Keine neuen Bewerbungen</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent News -->
        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
            <div class="p-6 border-b border-white/5 flex justify-between items-center">
                <h3 class="font-bold text-white flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">article</span>
                    Neueste News
                </h3>
                <a href="{{ route('admin.news.index') }}" class="text-xs font-bold text-neutral-500 hover:text-white transition-colors">Verwalten</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse(\App\Models\NewsPost::latest()->take(3)->get() as $post)
                <div class="p-4 hover:bg-white/5 transition-colors">
                    <div class="flex items-start gap-4">
                        @if($post->image)
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-neutral-800 flex-shrink-0">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[var(--theme-primary)] to-[var(--theme-secondary)] flex items-center justify-center flex-shrink-0">
                                <span class="material-icons text-white">article</span>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-white truncate">{{ $post->title }}</h4>
                            <p class="text-xs text-neutral-500 mt-1">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('admin.news.edit', $post) }}" class="p-2 rounded-lg bg-white/5 text-neutral-400 hover:bg-[var(--theme-primary)] hover:text-white transition-all flex-shrink-0">
                            <span class="material-icons text-lg">edit</span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-neutral-500">
                    <span class="material-icons text-4xl mb-2">article</span>
                    <p class="text-sm font-bold">Keine News vorhanden</p>
                    <a href="{{ route('admin.news.create') }}" class="text-xs text-[var(--theme-primary)] hover:underline mt-2 inline-block">Erste News erstellen</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Activity Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <!-- Recent Gallery Images -->
        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
            <div class="p-6 border-b border-white/5 flex justify-between items-center">
                <h3 class="font-bold text-white flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">photo_library</span>
                    Neueste Galerie-Bilder
                </h3>
                <a href="{{ route('admin.gallery.index') }}" class="text-xs font-bold text-neutral-500 hover:text-white transition-colors">Verwalten</a>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-3 gap-3">
                    @forelse(\App\Models\GalleryImage::latest()->take(6)->get() as $image)
                        <div class="aspect-square rounded-xl overflow-hidden bg-neutral-800 group relative">
                            <img src="{{ Storage::url($image->image_url) }}" alt="{{ $image->caption }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="material-icons text-white text-2xl">zoom_in</span>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 p-8 text-center text-neutral-500">
                            <span class="material-icons text-4xl mb-2">add_photo_alternate</span>
                            <p class="text-sm font-bold">Keine Bilder vorhanden</p>
                            <a href="{{ route('admin.gallery.create') }}" class="text-xs text-[var(--theme-primary)] hover:underline mt-2 inline-block">Erstes Bild hochladen</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Team Members -->
        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
            <div class="p-6 border-b border-white/5 flex justify-between items-center">
                <h3 class="font-bold text-white flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">people</span>
                    Team Members
                </h3>
                <a href="{{ route('admin.team.index') }}" class="text-xs font-bold text-neutral-500 hover:text-white transition-colors">Verwalten</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse(\App\Models\TeamMember::orderBy('rank')->take(4)->get() as $member)
                <div class="p-4 hover:bg-white/5 transition-colors flex items-center gap-4">
                    @if($member->photo)
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-neutral-800">
                            <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[var(--theme-primary)] to-[var(--theme-secondary)] flex items-center justify-center text-white font-bold">
                            {{ substr($member->name, 0, 1) }}
                        </div>
                    @endif
                    <div class="flex-1">
                        <h4 class="text-sm font-bold text-white">{{ $member->name }}</h4>
                        <p class="text-xs text-[var(--theme-primary)]">{{ $member->role }}</p>
                    </div>
                    <a href="{{ route('admin.team.edit', $member) }}" class="p-2 rounded-lg bg-white/5 text-neutral-400 hover:bg-[var(--theme-primary)] hover:text-white transition-all">
                        <span class="material-icons text-lg">edit</span>
                    </a>
                </div>
                @empty
                <div class="p-8 text-center text-neutral-500">
                    <span class="material-icons text-4xl mb-2">person_add</span>
                    <p class="text-sm font-bold">Keine Team-Mitglieder</p>
                    <a href="{{ route('admin.team.create') }}" class="text-xs text-[var(--theme-primary)] hover:underline mt-2 inline-block">Erstes Mitglied hinzufügen</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
