@extends('layouts.admin')

@section('title', 'Hero-Bild bearbeiten')

@section('content')
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-2">
             <a href="{{ route('admin.hero-images.index') }}" class="text-neutral-500 hover:text-white transition-colors">
                <span class="material-icons">arrow_back</span>
            </a>
            <h1 class="text-3xl font-black text-white">Hero-Bild bearbeiten</h1>
        </div>
        <p class="text-neutral-500">{{ $pages[$heroImage->page] ?? $heroImage->page }}</p>
    </div>

    <div class="max-w-2xl">
        <!-- Current Image Preview -->
        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-6 mb-6">
            <h3 class="text-white font-bold mb-4">Aktuelles Bild</h3>
            <div class="aspect-video rounded-xl overflow-hidden">
                <img src="{{ Storage::url($heroImage->image_path) }}" alt="{{ $heroImage->page }}" class="w-full h-full object-cover">
            </div>
        </div>

        <form action="{{ route('admin.hero-images.update', $heroImage) }}" method="POST" enctype="multipart/form-data" class="bg-[#0a0a0a] p-8 rounded-3xl border border-white/5 space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Neues Bild (Optional - nur wenn ersetzen)</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[var(--theme-primary)] file:text-white file:cursor-pointer">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <p class="text-xs text-neutral-500 mt-2">Leer lassen, um Bild beizubehalten. Max. 20MB</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Titel (Optional)</label>
                <input type="text" name="title" value="{{ old('title', $heroImage->title) }}" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white" placeholder="z.B. Willkommen bei...">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Beschreibung (Optional)</label>
                <textarea name="description" rows="3" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white" placeholder="Kurze Beschreibung...">{{ old('description', $heroImage->description) }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $heroImage->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded bg-black/40 border-white/10 text-[var(--theme-primary)] focus:ring-[var(--theme-primary)]">
                    <span class="text-white font-bold">Aktiv (auf Seite anzeigen)</span>
                </label>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.hero-images.index') }}" class="flex-1 px-6 py-3 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-colors text-center">
                    Abbrechen
                </a>
                <button type="submit" class="flex-1 px-6 py-3 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-xl font-bold transition-colors">
                    Speichern
                </button>
            </div>
        </form>
    </div>
@endsection
