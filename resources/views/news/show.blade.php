@extends('layouts.app')

@section('title', $post->title . ' - News')

@section('content')
    <!-- Hero Image (Full Width) -->
    <div class="relative h-[60vh] w-full overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $post->image_url }}')"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-neutral-50/20 to-transparent dark:from-[#050505] dark:via-[#050505]/40 dark:to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full px-8 md:px-16 pb-8 md:pb-12 bg-gradient-to-t from-neutral-50 dark:from-[#050505] to-transparent">
             <div class="container mx-auto">
                 <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-[var(--theme-primary)] mb-6 transition-colors font-bold uppercase tracking-wider text-sm">
                    <span class="material-icons">arrow_back</span>
                    Zurück zur Übersicht
                </a>
                <h1 class="text-4xl md:text-6xl font-black text-neutral-900 dark:text-white mb-4 max-w-4xl leading-tight drop-shadow-2xl">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center gap-4 text-neutral-600 dark:text-neutral-300">
                    <span class="flex items-center gap-2">
                        <span class="material-icons text-[var(--theme-primary)] text-sm">calendar_today</span>
                        {{ $post->published_at->format('d. F Y') }}
                    </span>
                    <span class="w-1 h-1 bg-neutral-400 rounded-full"></span>
                    <span class="flex items-center gap-2">
                         <span class="material-icons text-[var(--theme-primary)] text-sm">person</span>
                         Admin Team
                    </span>
                </div>
             </div>
        </div>
    </div>

    <!-- Article Content -->
    <article class="pb-16 bg-neutral-50 dark:bg-[#050505]">
        <div class="container mx-auto px-6 max-w-4xl -mt-32 relative z-10">
            <div class="bg-white dark:bg-[#0a0a0a] p-8 md:p-12 rounded-3xl border border-neutral-200 dark:border-white/5 shadow-xl">
                <p class="whitespace-pre-wrap leading-relaxed text-neutral-800 dark:text-neutral-300 text-base">{{ $post->content }}</p>
            </div>
            
            <!-- Navigation -->
            <div class="mt-12 flex justify-between items-center border-t border-neutral-200 dark:border-white/5 pt-8">
                 <a href="{{ route('news.index') }}" class="text-neutral-500 hover:text-[var(--theme-primary)] font-bold transition-colors">
                     &larr; Alle News
                 </a>
                 <div class="flex gap-4">
                     <button class="w-10 h-10 rounded-full bg-white dark:bg-[#111] flex items-center justify-center text-neutral-600 hover:text-[#5865F2] shadow-sm transition-all hover:scale-110">
                         <span class="material-icons text-sm">share</span>
                     </button>
                 </div>
            </div>
        </div>
    </article>
@endsection
