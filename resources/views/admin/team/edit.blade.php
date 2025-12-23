@extends('layouts.admin')

@section('title', 'Mitglied bearbeiten')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Mitglied bearbeiten</h1>
            <p class="text-neutral-500">Bearbeite die Daten von {{ $team->name }}.</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="px-6 py-3 rounded-xl bg-white/5 text-white font-bold hover:bg-white/10 transition-colors">
            Abbrechen
        </a>
    </div>

    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $team->name) }}" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Rolle</label>
                    <input type="text" name="role" value="{{ old('role', $team->role) }}" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>

                <!-- Rank Order -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Rang Ordnung</label>
                    <input type="number" name="rank_order" value="{{ old('rank_order', $team->rank_order) }}" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>

                <!-- Discord -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Discord Username</label>
                    <input type="text" name="discord" value="{{ old('discord', $team->discord) }}"
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Profilbild</label>
                <div class="relative group cursor-pointer mb-4">
                    <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="border-2 border-dashed border-white/10 rounded-xl p-8 text-center transition-all group-hover:border-[var(--theme-primary)]/50 group-hover:bg-[var(--theme-primary)]/5">
                        <span class="material-icons text-4xl text-neutral-600 group-hover:text-[var(--theme-primary)] transition-colors mb-2">account_circle</span>
                        <p class="text-neutral-500 text-sm font-bold">Neues Bild hochladen</p>
                    </div>
                </div>
                @if($team->image)
                    <div class="text-xs text-neutral-500 mb-2">Aktueller Avatar:</div>
                    <img src="{{ Storage::url($team->image) }}" alt="Preview" class="w-20 h-20 rounded-full border border-white/10 object-cover">
                @endif
            </div>

            <!-- Bio -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Kurzbeschreibung</label>
                <textarea name="bio" rows="4"
                          class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">{{ old('bio', $team->bio) }}</textarea>
            </div>
            
            <div class="pt-6 border-t border-white/5 flex justify-end">
                <button type="submit" class="px-8 py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                    <span class="material-icons">save</span>
                    Änderungen Speichern
                </button>
            </div>
        </form>
    </div>

    <script>
        // File size validation
        const fileInput = document.querySelector('input[type="file"]');
        const form = document.querySelector('form');
        const maxSize = 20 * 1024 * 1024; // 20MB in bytes

        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && file.size > maxSize) {
                    alert('⚠️ Datei zu groß!\n\nDie ausgewählte Datei ist ' + (file.size / 1024 / 1024).toFixed(2) + ' MB groß.\nMaximal erlaubt sind 20 MB.\n\nBitte wähle ein kleineres Bild oder komprimiere es.');
                    e.target.value = ''; // Clear the input
                }
            });
        }

        if (form) {
            form.addEventListener('submit', function(e) {
                const file = fileInput?.files[0];
                if (file && file.size > maxSize) {
                    e.preventDefault();
                    alert('⚠️ Datei zu groß! Bitte wähle ein kleineres Bild (max. 20 MB).');
                    return false;
                }
            });
        }
    </script>
@endsection
