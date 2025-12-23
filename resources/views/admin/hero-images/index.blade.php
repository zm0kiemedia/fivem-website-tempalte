@extends('layouts.admin')

@section('title', 'Hero-Bilder')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Hero-Bilder</h1>
            <p class="text-neutral-500">Verwalte die Header-Bilder für alle Seiten</p>
        </div>
        <a href="{{ route('admin.hero-images.create') }}" class="px-6 py-3 bg-[var(--theme-primary)] text-white rounded-xl font-bold hover:bg-[var(--theme-secondary)] transition-colors flex items-center gap-2">
            <span class="material-icons">add_photo_alternate</span>
            Neues Hero-Bild
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($pages as $pageKey => $pageName)
            @php
                $heroImage = \App\Models\HeroImage::where('page', $pageKey)->first();
            @endphp
            
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
                @if($heroImage)
                    <div class="aspect-video bg-neutral-900 relative">
                        <img src="{{ Storage::url($heroImage->image_path) }}" alt="{{ $pageName }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-white font-black text-xl">{{ $pageName }}</h3>
                            @if($heroImage->title)
                                <p class="text-neutral-300 text-sm">{{ $heroImage->title }}</p>
                            @endif
                        </div>
                        @if(!$heroImage->is_active)
                            <div class="absolute top-4 right-4 px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">
                                Inaktiv
                            </div>
                        @endif
                    </div>
                    <div class="p-4 flex gap-2">
                        <a href="{{ route('admin.hero-images.edit', $heroImage) }}" class="flex-1 px-4 py-2 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-colors text-center flex items-center justify-center gap-2">
                            <span class="material-icons text-sm">edit</span>
                            Bearbeiten
                        </a>
                        <form action="{{ route('admin.hero-images.destroy', $heroImage) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl font-bold transition-colors flex items-center gap-2">
                                <span class="material-icons text-sm">delete</span>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="aspect-video bg-neutral-900 flex items-center justify-center border-2 border-dashed border-white/10">
                        <div class="text-center p-6">
                            <span class="material-icons text-6xl text-neutral-600 mb-2">add_photo_alternate</span>
                            <h3 class="text-white font-bold mb-1">{{ $pageName }}</h3>
                            <p class="text-neutral-500 text-sm mb-4">Kein Bild hochgeladen</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('admin.hero-images.create', ['page' => $pageKey]) }}" class="block px-4 py-2 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-xl font-bold transition-colors text-center">
                            Bild hochladen
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
