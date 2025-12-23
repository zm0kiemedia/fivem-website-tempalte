@extends('layouts.app')

@section('title', 'News - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['news'] ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=1920&auto=format&fit=crop' }}');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-xs font-bold uppercase tracking-widest mb-4">
                Community Updates
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                NEWSROOM
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Bleib immer auf dem Laufenden über Updates, Events und wichtige Ankündigungen rund um Los Santos.
            </p>
        </div>
    </section>

    <!-- News Grid -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="group relative bg-white dark:bg-[#0a0a0a] rounded-3xl overflow-hidden border border-neutral-200 dark:border-white/5 hover:border-[var(--theme-primary)]/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/10 flex flex-col h-full">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden relative">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('{{ $post->image_url }}')"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Date Badge -->
                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-black/80 backdrop-blur-md px-4 py-2 rounded-xl text-neutral-900 dark:text-white text-xs font-bold border border-white/20 shadow-lg">
                                {{ $post->published_at->format('d.m.Y') }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 flex-grow flex flex-col relative">
                            <h2 class="text-2xl font-bold text-neutral-900 dark:text-white mb-4 line-clamp-2 leading-tight group-hover:text-[var(--theme-primary)] transition-colors">
                                {{ $post->title }}
                            </h2>
                            <p class="text-neutral-600 dark:text-neutral-400 mb-6 line-clamp-3 leading-relaxed flex-grow">
                                {{ Str::limit($post->content, 120) }}
                            </p>
                            
                            <a href="{{ route('news.show', $post) }}" class="inline-flex items-center gap-2 text-sm font-bold text-neutral-900 dark:text-white uppercase tracking-wider group-hover:gap-3 transition-all">
                                Mehr lesen
                                <span class="material-icons text-[var(--theme-primary)] text-sm">arrow_forward</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
