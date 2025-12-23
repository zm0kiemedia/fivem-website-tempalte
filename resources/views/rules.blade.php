@extends('layouts.app')

@section('title', 'Regelwerk - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['rules'] ?? 'https://images.unsplash.com/photo-1464047736614-af63643285bf?q=80&w=1920&auto=format&fit=crop' }}');"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-red-500/10 border border-red-500/20 text-red-500 text-xs font-bold uppercase tracking-widest mb-4">
                Important
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                REGELWERK
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Fairplay und Respekt sind das Fundament unserer Community. Bitte lies dir die Regeln sorgfältig durch.
            </p>
        </div>
    </section>

    <!-- Rules Content -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20">
        <div class="container mx-auto px-6 max-w-4xl">
            
            <!-- Allgemeine Regeln -->
            @if(isset($rules['general']))
            <div class="mb-16">
                <h2 class="text-3xl font-black text-neutral-900 dark:text-white mb-8 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center">
                        <span class="material-icons text-2xl">menu_book</span>
                    </span>
                    Allgemeine Verhaltensregeln
                </h2>
                
                <div class="space-y-6">
                    @foreach($rules['general'] as $index => $rule)
                    <div class="bg-white dark:bg-[#0a0a0a] p-6 rounded-2xl border border-neutral-200 dark:border-white/5 flex gap-6 hover:border-blue-500/30 transition-colors">
                        <span class="text-4xl font-black text-neutral-100 dark:text-white/5 select-none">{{ sprintf('%02d', $index + 1) }}</span>
                        <p class="text-neutral-700 dark:text-neutral-300 font-medium leading-relaxed pt-2">{{ $rule->content }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Roleplay Regeln -->
            @if(isset($rules['roleplay']))
             <div class="mb-16">
                <h2 class="text-3xl font-black text-neutral-900 dark:text-white mb-8 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-xl bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] flex items-center justify-center">
                        <span class="material-icons text-2xl">theater_comedy</span>
                    </span>
                    Roleplay Richtlinien
                </h2>
                
                <div class="space-y-6">
                     @foreach($rules['roleplay'] as $index => $rule)
                    <div class="bg-white dark:bg-[#0a0a0a] p-6 rounded-2xl border border-neutral-200 dark:border-white/5 flex gap-6 hover:border-[var(--theme-primary)]/30 transition-colors">
                        <span class="text-4xl font-black text-neutral-100 dark:text-white/5 select-none">{{ sprintf('%02d', $index + 1) }}</span>
                        <p class="text-neutral-700 dark:text-neutral-300 font-medium leading-relaxed pt-2">{{ $rule->content }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
             <!-- Zonen Regeln -->
             @if(isset($rules['zones']))
             <div class="mb-16">
                <h2 class="text-3xl font-black text-neutral-900 dark:text-white mb-8 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-xl bg-green-500/10 text-green-500 flex items-center justify-center">
                        <span class="material-icons text-2xl">map</span>
                    </span>
                    Zonen & Events
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($rules['zones'] as $rule)
                    <div class="bg-{{ $rule->color ?? 'green' }}-500/5 p-8 rounded-3xl border border-{{ $rule->color ?? 'green' }}-500/20">
                        <h3 class="font-bold text-{{ $rule->color ?? 'green' }}-600 dark:text-{{ $rule->color ?? 'green' }}-400 mb-2 flex items-center gap-2">
                             @if($rule->icon)<span class="material-icons">{{ $rule->icon }}</span>@endif {{ $rule->title }}
                        </h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            {{ $rule->content }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </section>
@endsection
