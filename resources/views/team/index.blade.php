@extends('layouts.app')

@section('title', 'Team - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['team'] ?? 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=1920&auto=format&fit=crop' }}');"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-xs font-bold uppercase tracking-widest mb-4">
                Staff & Support
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                UNSER TEAM
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Die Menschen hinter den Kulissen, die Los Santos jeden Tag am Laufen halten.
            </p>
        </div>
    </section>

    <!-- Team Grid -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($members as $member)
                    <div class="group relative">
                        <!-- Card Content -->
                        <div class="relative bg-white dark:bg-[#0a0a0a] rounded-3xl overflow-hidden border border-neutral-200 dark:border-white/5 hover:border-[var(--theme-primary)]/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/10">
                            <!-- Background Pattern/Header -->
                            <div class="h-32 bg-neutral-100 dark:bg-neutral-900 relative overflow-hidden">
                                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/20"></div>
                            </div>
                            
                            <!-- Avatar (Floating) -->
                            <div class="relative -mt-16 text-center">
                                <div class="w-32 h-32 mx-auto rounded-full p-1 bg-white dark:bg-[#0a0a0a] ring-4 ring-neutral-50 dark:ring-[#0f0f0f] relative z-10">
                                    <div class="w-full h-full rounded-full overflow-hidden">
                                         <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <!-- Role Badge -->
                                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 z-20">
                                    <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[var(--theme-primary)] text-white shadow-lg shadow-[var(--theme-primary)]/20 border border-white/10">
                                        {{ $member->role }}
                                    </span>
                                </div>
                            </div>

                            <div class="pt-12 pb-8 px-8 text-center">
                                <h3 class="text-xl font-bold text-neutral-900 dark:text-white mb-2">{{ $member->name }}</h3>
                                <p class="text-sm text-neutral-500 dark:text-neutral-400 mb-6">{{ $member->bio }}</p>
                                
                                <div class="border-t border-neutral-200 dark:border-white/5 pt-6">
                                    <a href="https://discord.com/users/{{ $member->discord }}" target="_blank" class="inline-flex items-center gap-2 text-neutral-500 hover:text-[#5865F2] transition-colors">
                                        <span class="material-icons text-lg">discord</span>
                                        <span class="text-sm font-medium">{{ $member->discord }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
