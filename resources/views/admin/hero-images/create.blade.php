@extends('layouts.admin')

@section('title', 'Hero-Bild hochladen')

@section('content')
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-2">
             <a href="{{ route('admin.hero-images.index') }}" class="text-neutral-500 hover:text-white transition-colors">
                <span class="material-icons">arrow_back</span>
            </a>
            <h1 class="text-3xl font-black text-white">Hero-Bild hochladen</h1>
        </div>
        <p class="text-neutral-500">Lade ein neues Header-Bild für eine Seite hoch</p>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.hero-images.store') }}" method="POST" enctype="multipart/form-data" class="bg-[#0a0a0a] p-8 rounded-3xl border border-white/5 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Seite</label>
                <select name="page" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white" required>
                    <option value="">-- Seite wählen --</option>
                    @foreach($pages as $key => $name)
                        <option value="{{ $key }}" {{ request('page') == $key ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('page') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Bild (max. 20MB)</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[var(--theme-primary)] file:text-white file:cursor-pointer" required>
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Titel (Optional)</label>
                <input type="text" name="title" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white" placeholder="z.B. Willkommen bei...">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-neutral-400 mb-2 uppercase tracking-wider">Beschreibung (Optional)</label>
                <textarea name="description" rows="3" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white" placeholder="Kurze Beschreibung..."></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-3">
                <a href="{{ route('admin.hero-images.index') }}" class="flex-1 px-6 py-3 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-colors text-center">
                    Abbrechen
                </a>
                <button type="submit" class="flex-1 px-6 py-3 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-xl font-bold transition-colors">
                    Hochladen
                </button>
            </div>
        </form>
    </div>
@endsection
