@extends('layouts.app')

@section('title', 'Galerie - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['gallery'] ?? 'https://images.unsplash.com/photo-1569336415962-a4bd9f69cd83?q=80&w=1920&auto=format&fit=crop' }}');"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-xs font-bold uppercase tracking-widest mb-4">
                Impressions
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                GALERIE
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Die schönsten Momente aus Los Santos, festgehalten von unserer Community.
            </p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20" x-data="{ lightboxOpen: false, activeImage: '', activeCaption: '' }" @keydown.escape.window="lightboxOpen = false">
        <div class="container mx-auto px-6">
            @foreach($images as $category => $categoryImages)
                <div class="mb-20 last:mb-0">
                    <h3 class="text-2xl font-black text-neutral-900 dark:text-white uppercase tracking-wider mb-10 pl-4 border-l-4 border-[var(--theme-primary)]">
                        {{ ucfirst($category) }}
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categoryImages as $image)
                            <div class="group relative rounded-3xl overflow-hidden aspect-video bg-neutral-100 dark:bg-[#0a0a0a] cursor-pointer"
                                 @click="lightboxOpen = true; activeImage = '{{ $image->src }}'; activeCaption = '{{ $image->caption }}'">
                                <img src="{{ $image->src }}" alt="{{ $image->caption }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                
                                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-6 text-center">
                                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white font-bold text-lg mb-2">{{ $image->caption }}</p>
                                        <span class="inline-block p-2 rounded-full bg-[var(--theme-primary)] text-white">
                                            <span class="material-icons text-xl">zoom_in</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-md p-4"
             style="display: none;">
            
            <div class="relative w-full max-w-5xl max-h-[90vh] flex flex-col items-center" @click.outside="lightboxOpen = false">
                <button @click="lightboxOpen = false" class="absolute -top-12 right-0 text-white hover:text-[var(--theme-primary)] transition-colors">
                    <span class="material-icons text-4xl">close</span>
                </button>
                
                <img :src="activeImage" :alt="activeCaption" class="max-w-full max-h-[85vh] rounded-lg shadow-2xl object-contain">
                
                <p x-show="activeCaption" x-text="activeCaption" class="mt-4 text-white text-lg font-bold text-center"></p>
            </div>
        </div>
    </section>
@endsection
