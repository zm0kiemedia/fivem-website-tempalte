@extends('layouts.app')

@section('title', 'Kontakt - FiveM Server')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] flex items-center justify-center overflow-hidden perspective-1000">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105 opacity-80 dark:opacity-40" style="background-image: url('{{ $heroImages['contact'] ?? 'https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1920&auto=format&fit=crop' }}');"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/50 to-transparent dark:from-[#050505] dark:via-[#050505]/60 dark:to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center animate-fade-in-up">
            <span class="inline-block py-1 px-3 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-xs font-bold uppercase tracking-widest mb-4">
                Help & Support
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-neutral-900 dark:text-white mb-6">
                KONTAKT
            </h1>
            <p class="text-lg text-neutral-600 dark:text-neutral-400 max-w-2xl mx-auto">
                Du hast Fragen, Probleme oder Feedback? Wir sind für dich da.
            </p>
        </div>
    </section>

    <!-- Support Options -->
    <section class="py-24 bg-neutral-50 dark:bg-[#050505] relative z-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                <!-- Ticket System -->
                <div class="group relative bg-white dark:bg-[#0a0a0a] p-10 rounded-3xl border border-neutral-200 dark:border-white/5 hover:border-[var(--theme-primary)]/30 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[var(--theme-primary)]/10 text-center">
                    <div class="w-20 h-20 mx-auto bg-neutral-50 dark:bg-[#111] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[var(--theme-primary)] transition-colors duration-300 shadow-inner">
                        <span class="material-icons text-4xl text-neutral-400 group-hover:text-white">confirmation_number</span>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-4">Ticket System</h3>
                    <p class="text-neutral-500 dark:text-neutral-400 mb-8 leading-relaxed">
                        Erstelle ein Ticket für Support-Anfragen, Bug-Reports oder Beschwerden direkt über unsere Website.
                    </p>
                    <a href="{{ route('tickets.create') }}" class="inline-block w-full py-3 rounded-xl bg-neutral-100 dark:bg-white/5 text-neutral-900 dark:text-white font-bold hover:bg-[var(--theme-primary)] hover:text-white transition-all">
                        Ticket Erstellen
                    </a>
                </div>

                <!-- Teamspeak -->
                <div class="group relative bg-white dark:bg-[#0a0a0a] p-10 rounded-3xl border border-neutral-200 dark:border-white/5 hover:border-blue-500/30 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/10 text-center">
                    <div class="w-20 h-20 mx-auto bg-neutral-50 dark:bg-[#111] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-blue-500 transition-colors duration-300 shadow-inner">
                        <span class="material-icons text-4xl text-neutral-400 group-hover:text-white">headset_mic</span>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-4">TeamSpeak</h3>
                    <p class="text-neutral-500 dark:text-neutral-400 mb-8 leading-relaxed">
                        Komm in unseren Support-Wartebereich für persönliche Gespräche mit einem Teammitglied.
                    </p>
                    <a href="#" class="inline-block w-full py-3 rounded-xl bg-neutral-100 dark:bg-white/5 text-neutral-900 dark:text-white font-bold hover:bg-blue-500 hover:text-white transition-all">
                        Verbinden
                    </a>
                </div>

                <!-- Discord -->
                <div class="group relative bg-white dark:bg-[#0a0a0a] p-10 rounded-3xl border border-neutral-200 dark:border-white/5 hover:border-[#5865F2]/30 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#5865F2]/10 text-center">
                    <div class="w-20 h-20 mx-auto bg-neutral-50 dark:bg-[#111] rounded-2xl flex items-center justify-center mb-8 group-hover:bg-[#5865F2] transition-colors duration-300 shadow-inner">
                        <span class="material-icons text-4xl text-neutral-400 group-hover:text-white">discord</span>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-900 dark:text-white mb-4">Discord</h3>
                    <p class="text-neutral-500 dark:text-neutral-400 mb-8 leading-relaxed">
                        Tritt unserer Community bei, chatte mit anderen Spielern und bleib auf dem Laufenden.
                    </p>
                    <a href="#" class="inline-block w-full py-3 rounded-xl bg-neutral-100 dark:bg-white/5 text-neutral-900 dark:text-white font-bold hover:bg-[#5865F2] hover:text-white transition-all">
                        Join Server
                    </a>
                </div>
            </div>
            
            <!-- Additional Info -->
            <div class="mt-24 text-center">
                <h3 class="text-xl font-bold text-neutral-900 dark:text-white mb-8">Häufig gestellte Fragen (FAQ)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-4xl mx-auto text-left">
                     <div class="bg-white dark:bg-[#111] p-6 rounded-2xl border border-neutral-200 dark:border-white/5">
                         <h4 class="font-bold text-neutral-900 dark:text-white mb-2">Wie kann ich mich bewerben?</h4>
                         <p class="text-sm text-neutral-500 dark:text-neutral-400">Nutze unser Bewerbungsformular im "Bewerben" Bereich im Menü.</p>
                     </div>
                     <div class="bg-white dark:bg-[#111] p-6 rounded-2xl border border-neutral-200 dark:border-white/5">
                         <h4 class="font-bold text-neutral-900 dark:text-white mb-2">Wie alt muss ich sein?</h4>
                         <p class="text-sm text-neutral-500 dark:text-neutral-400">Das Mindestalter für unseren Server beträgt 16 Jahre. Ausnahmen sind nicht möglich.</p>
                     </div>
                </div>
            </div>
        </div>
    </section>
@endsection
