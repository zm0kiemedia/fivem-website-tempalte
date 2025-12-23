@extends('layouts.admin')

@section('title', 'Galerie verwalten')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Galerie Management</h1>
            <p class="text-neutral-500">Verwalte die Bilder in der Server-Galerie.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="px-6 py-3 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <span class="material-icons">add_photo_alternate</span>
            Neues Bild
        </a>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 font-bold flex items-center gap-3">
            <span class="material-icons">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($images as $image)
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden group">
                <div class="relative aspect-video">
                    <img src="{{ Storage::url($image->image_url) }}" alt="{{ $image->caption }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="{{ route('admin.gallery.edit', $image) }}" class="p-2 rounded-lg bg-white/10 text-white hover:bg-[var(--theme-primary)] transition-colors">
                            <span class="material-icons">edit</span>
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Wirklich löschen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg bg-white/10 text-white hover:bg-red-500 transition-colors">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </div>
                    <div class="absolute top-2 right-2 px-2 py-1 rounded bg-black/60 text-xs font-bold text-white uppercase tracking-wider backdrop-blur-sm">
                        {{ $image->category }}
                    </div>
                </div>
                <div class="p-4">
                    <p class="text-sm font-bold text-white truncate">{{ $image->caption ?: 'Keine Beschreibung' }}</p>
                    <p class="text-xs text-neutral-500 mt-1">{{ $image->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full p-12 text-center text-neutral-500 bg-[#0a0a0a] rounded-3xl border border-white/5">
                <span class="material-icons text-4xl mb-2 opacity-50">collections</span>
                <p>Keine Bilder in der Galerie gefunden.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $images->links() }}
    </div>
@endsection
