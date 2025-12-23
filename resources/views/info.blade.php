@extends('layouts.app')

@section('title', 'Informationen - FiveM Server')

@section('content')
    <!-- Map Header -->
    <div class="relative py-24 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center grayscale opacity-30" style="background-image: url('{{ $heroImages['info'] ?? 'https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1920&auto=format&fit=crop' }}');"></div>
        <div class="absolute inset-0 bg-neutral-950/80"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-6xl font-black text-white mb-6">INFORMATIONEN</h1>
            <p class="text-xl text-neutral-400">Alles was du wissen musst.</p>
        </div>
    </div>

    <div class="container mx-auto px-6 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto -mt-12">
            <!-- Connection Info -->
            <div class="bg-neutral-900/90 backdrop-blur-xl p-8 rounded-2xl border border-white/5 hover:border-[var(--theme-primary)]/30 transition duration-300 relative overflow-hidden group shadow-2xl">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-icons text-9xl text-[var(--theme-primary)]">router</span>
                </div>
                
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-3 text-white">
                    <span class="w-10 h-10 bg-[var(--theme-primary)] rounded-lg flex items-center justify-center text-black">
                        <span class="material-icons">link</span>
                    </span>
                    Direktverbindung
                </h2>
                
                <div class="space-y-6 relative z-10">
                     <div class="bg-black/50 p-6 rounded-xl border border-white/10 flex flex-col gap-2">
                        <span class="text-xs text-neutral-500 uppercase tracking-widest">Server Address</span>
                        <div class="flex justify-between items-center">
                            <code class="text-[var(--theme-primary)] font-mono font-bold text-xl">play.fivem-server.de</code>
                            <button class="text-neutral-500 hover:text-white transition">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Voice Info -->
             <div class="bg-neutral-900/90 backdrop-blur-xl p-8 rounded-2xl border border-white/5 hover:border-white/20 transition duration-300 relative overflow-hidden group shadow-2xl">
                 <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-icons text-9xl text-white">headset_mic</span>
                </div>

                <h2 class="text-2xl font-bold mb-6 flex items-center gap-3 text-white">
                     <span class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-black">
                        <span class="material-icons">graphic_eq</span>
                    </span>
                    Kommunikation
                </h2>
                <div class="relative z-10 flex flex-col gap-4">
                    <a href="#" class="flex items-center justify-between bg-neutral-800 p-4 rounded-xl border border-white/5 hover:bg-neutral-700 transition">
                         <div class="flex items-center gap-3">
                             <img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/TeamSpeak_3_Logo.jpg" class="w-8 h-8 rounded" alt="TS3">
                             <div>
                                 <div class="font-bold text-white">TeamSpeak 3</div>
                                 <div class="text-xs text-neutral-500">SaltyChat v2.3.6 benötigt</div>
                             </div>
                         </div>
                        <span class="material-icons text-neutral-400">download</span>
                    </a>
                    
                     <a href="#" class="flex items-center justify-between bg-[#5865F2]/10 p-4 rounded-xl border border-[#5865F2]/20 hover:bg-[#5865F2]/20 transition">
                         <div class="flex items-center gap-3">
                             <span class="w-8 h-8 rounded bg-[#5865F2] flex items-center justify-center text-white"><span class="material-icons text-sm">discord</span></span>
                             <div>
                                 <div class="font-bold text-[#5865F2]">Discord Server</div>
                                 <div class="text-xs text-[#5865F2]/70">Werde Teil der Community</div>
                             </div>
                         </div>
                        <span class="material-icons text-[#5865F2]">open_in_new</span>
                    </a>
                </div>
            </div>

            <!-- Keybindings (Keyboard visual) -->
            <div class="md:col-span-2 bg-neutral-900/90 backdrop-blur-xl p-8 rounded-2xl border border-white/5 shadow-2xl">
                <h2 class="text-2xl font-bold mb-8 flex items-center gap-3 text-white">
                    <span class="material-icons text-[var(--theme-primary)]">keyboard</span>
                    Wichtige Tasten
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                     @foreach([
                        ['Smartphone', 'F1', 'phone_iphone'],
                        ['Inventar', 'F2', 'backpack'],
                        ['Animationen', 'F3', 'accessibility'],
                        ['Job Menü', 'F6', 'badge'],
                        ['Rechnungen', 'F7', 'receipt'],
                        ['Voice Range', 'Y', 'record_voice_over'],
                        ['Fahrzeug', 'U', 'lock'],
                        ['Motor', 'M', 'settings_power'],
                    ] as $key)
                        <div class="group flex flex-col items-center justify-center bg-black/40 p-4 rounded-xl border border-white/5 hover:border-[var(--theme-primary)]/50 transition-all">
                            <span class="material-icons text-neutral-500 mb-2 group-hover:text-[var(--theme-primary)] transition-colors">{{ $key[2] }}</span>
                            <span class="text-neutral-300 text-sm font-medium mb-2">{{ $key[0] }}</span>
                            <kbd class="px-3 py-1 bg-neutral-800 rounded-lg border-b-2 border-neutral-700 font-mono text-[var(--theme-secondary)] font-bold text-sm">
                                {{ $key[1] }}
                            </kbd>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
