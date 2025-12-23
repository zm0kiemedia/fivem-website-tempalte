@extends('layouts.admin')

@section('title', 'Einstellungen')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-black text-white mb-2">Einstellungen</h1>
        <p class="text-neutral-500">Konfiguriere deinen Server und die Website.</p>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 font-bold flex items-center gap-3">
            <span class="material-icons">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8 max-w-3xl">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            
            <!-- FiveM Section -->
            <div>
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">dns</span>
                    FiveM Server
                </h3>
                
                <div class="space-y-6">
                    <!-- Join Code -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">
                            Server Join Code
                            <span class="text-[var(--theme-primary)]">*</span>
                        </label>
                        <input type="text" 
                               name="fivem_join_code" 
                               value="{{ old('fivem_join_code', $settings['fivem_join_code']) }}" 
                               required
                               class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all font-mono"
                               placeholder="z.B. d43jey">
                        <p class="text-xs text-neutral-500 mt-2">
                            Der Join-Code deines Servers. Du findest ihn auf 
                            <a href="https://servers.fivem.net" target="_blank" class="text-[var(--theme-primary)] hover:underline">servers.fivem.net</a>
                            unter "Join URL" (z.B. cfx.re/join/<span class="text-[var(--theme-primary)] font-bold">d43jey</span>)
                        </p>
                    </div>

                    <!-- Preview -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                        <p class="text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Vorschau Connect-Link:</p>
                        <code class="text-sm text-[var(--theme-primary)] font-mono break-all">
                            https://cfx.re/join/<span x-text="document.querySelector('input[name=fivem_join_code]')?.value || 'd43jey'"></span>
                        </code>
                    </div>
                </div>
            </div>

            <!-- Theme Section -->
            <div class="pt-8 border-t border-white/5">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">palette</span>
                    Website Design
                </h3>
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-3">
                        Akzentfarbe
                        <span class="text-[var(--theme-primary)]">*</span>
                    </label>
                    <div class="grid grid-cols-4 md:grid-cols-7 gap-3">
                        @foreach([
                            'orange' => ['bg-[var(--theme-primary)]', 'Orange'],
                            'blue' => ['bg-blue-500', 'Blau'],
                            'red' => ['bg-red-500', 'Rot'],
                            'green' => ['bg-green-500', 'Grün'],
                            'purple' => ['bg-purple-500', 'Lila'],
                            'pink' => ['bg-pink-500', 'Pink'],
                            'yellow' => ['bg-yellow-500', 'Gelb'],
                        ] as $color => $data)
                            <label class="cursor-pointer group">
                                <input type="radio" name="theme_color" value="{{ $color }}" class="sr-only peer" {{ old('theme_color', $settings['theme_color']) == $color ? 'checked' : '' }}>
                                <div class="flex flex-col items-center gap-2 p-3 rounded-xl border-2 border-white/10 peer-checked:border-white/40 peer-checked:bg-white/10 hover:bg-white/5 transition-all">
                                    <div class="w-8 h-8 rounded-full {{ $data[0] }} shadow-lg"></div>
                                    <span class="text-xs font-bold text-neutral-400 peer-checked:text-white">{{ $data[1] }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-xs text-neutral-500 mt-3">
                        Diese Farbe wird für alle Akzente auf der Website verwendet (Buttons, Links, Hervorhebungen).
                    </p>
                </div>
            </div>
            
            <div class="pt-6 border-t border-white/5 flex justify-end gap-4">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 rounded-xl bg-white/5 text-white font-bold hover:bg-white/10 transition-colors">
                    Abbrechen
                </a>
                <button type="submit" class="px-8 py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                    <span class="material-icons">save</span>
                    Speichern
                </button>
            </div>
        </form>
    </div>

    <!-- Hero Images Section (Outside Main Form) -->
    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8 max-w-3xl mt-8">
            <div class="pt-8 border-t border-white/5">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white flex items-center gap-2">
                        <span class="material-icons text-[var(--theme-primary)]">image</span>
                        Hero-Bilder
                    </h3>
                    <a href="{{ route('admin.hero-images.create') }}" class="px-4 py-2 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-lg font-bold text-sm transition-colors flex items-center gap-2">
                        <span class="material-icons text-sm">add_photo_alternate</span>
                        Neu
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @php
                        $pages = [
                            'home' => 'Homepage',
                            'news' => 'News',
                            'gallery' => 'Galerie',
                            'team' => 'Team',
                            'stats' => 'Statistiken',
                            'contact' => 'Kontakt',
                            'rules' => 'Regeln',
                            'info' => 'Informationen',
                        ];
                        $heroImagesData = \App\Models\HeroImage::all()->keyBy('page');
                    @endphp
                    
                    @foreach($pages as $pageKey => $pageName)
                        @php
                            $heroImage = $heroImagesData->get($pageKey);
                        @endphp
                        
                        <div class="bg-black/20 rounded-xl border border-white/5 overflow-hidden group hover:border-[var(--theme-primary)]/30 transition-all">
                            @if($heroImage && $heroImage->image_path)
                                <div class="aspect-video bg-neutral-900 relative">
                                    <img src="{{ Storage::url($heroImage->image_path) }}" alt="{{ $pageName }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                                    <div class="absolute bottom-2 left-2 right-2">
                                        <p class="text-white font-bold text-sm truncate">{{ $pageName }}</p>
                                    </div>
                                    @if(!$heroImage->is_active)
                                        <div class="absolute top-2 right-2 px-2 py-1 bg-red-500 text-white text-xs font-bold rounded">
                                            Inaktiv
                                        </div>
                                    @endif
                                </div>
                                <div class="p-2 flex gap-2">
                                    <a href="{{ route('admin.hero-images.edit', $heroImage) }}" class="flex-1 px-3 py-1.5 bg-white/5 hover:bg-white/10 text-white rounded-lg text-xs font-bold transition-colors text-center">
                                        Bearbeiten
                                    </a>
                                    <form action="{{ route('admin.hero-images.destroy', $heroImage) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')" class="flex-shrink-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-lg text-xs font-bold transition-colors">
                                            <span class="material-icons" style="font-size: 14px;">delete</span>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="aspect-video bg-neutral-900 flex items-center justify-center border-2 border-dashed border-white/5">
                                    <div class="text-center p-3">
                                        <span class="material-icons text-2xl text-neutral-600 mb-1">add_photo_alternate</span>
                                        <p class="text-white text-xs font-bold mb-1">{{ $pageName }}</p>
                                        <p class="text-neutral-500 text-xs">Kein Bild</p>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('admin.hero-images.create', ['page' => $pageKey]) }}" class="block px-3 py-1.5 bg-[var(--theme-primary)]/20 hover:bg-[var(--theme-primary)] text-[var(--theme-primary)] hover:text-white rounded-lg text-xs font-bold transition-colors text-center">
                                        Hochladen
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                
                <p class="text-xs text-neutral-500 mt-4">
                    Hero-Bilder werden als Hintergrund in den Header-Bereichen der jeweiligen Seiten angezeigt.
                </p>
    </div>
@endsection
