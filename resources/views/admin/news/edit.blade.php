@extends('layouts.admin')

@section('title', 'News bearbeiten')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">News bearbeiten</h1>
            <p class="text-neutral-500">Bearbeite den Beitrag "{{ $news->title }}".</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="px-6 py-3 rounded-xl bg-white/5 text-white font-bold hover:bg-white/10 transition-colors">
            Abbrechen
        </a>
    </div>

    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Titel</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Veröffentlichungsdatum</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Titelbild</label>
                <div class="relative group cursor-pointer mb-4">
                    <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="border-2 border-dashed border-white/10 rounded-xl p-8 text-center transition-all group-hover:border-[var(--theme-primary)]/50 group-hover:bg-[var(--theme-primary)]/5">
                        <span class="material-icons text-4xl text-neutral-600 group-hover:text-[var(--theme-primary)] transition-colors mb-2">cloud_upload</span>
                        <p class="text-neutral-500 text-sm font-bold">Neues Bild hochladen</p>
                    </div>
                </div>
                @if($news->image)
                    <div class="text-xs text-neutral-500 mb-2">Aktuelles Bild:</div>
                    <img src="{{ Storage::url($news->image) }}" alt="Preview" class="h-32 rounded-lg border border-white/10">
                @endif
            </div>

            <!-- Content -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Inhalt</label>
                <textarea name="content" rows="10" required
                          class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all font-mono">{{ old('content', $news->content) }}</textarea>
            </div>
            
            <div class="pt-6 border-t border-white/5 flex justify-end">
                <button type="submit" class="px-8 py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                    <span class="material-icons">save</span>
                    Änderungen Speichern
                </button>
            </div>
        </form>
    </div>
@endsection
