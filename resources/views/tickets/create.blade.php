@extends('layouts.app')

@section('title', 'Support Ticket - FiveM Server')

@section('content')
    <div class="container mx-auto px-6 py-24">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold mb-4 text-white">Ticket erstellen</h1>
                <p class="text-neutral-400">Wie können wir dir helfen?</p>
            </div>


            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 rounded-3xl p-8 mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                            <span class="material-icons text-green-400 text-2xl">check_circle</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">{{ session('success') }}</h3>
                            <p class="text-neutral-400 text-sm">Wir werden uns so schnell wie möglich bei dir melden.</p>
                        </div>
                    </div>

                    @if(session('access_link'))
                        <div class="bg-black/20 rounded-2xl p-6 border border-white/5">
                            <label class="block text-sm font-bold text-neutral-400 mb-3 uppercase tracking-wider">🔗 Dein Ticket-Link</label>
                            <div class="flex items-center gap-3 bg-black/40 rounded-xl p-4 mb-4 border border-white/10">
                                <input 
                                    type="text" 
                                    value="{{ session('access_link') }}" 
                                    readonly 
                                    class="flex-1 bg-transparent text-white text-sm font-mono outline-none"
                                    id="accessLink"
                                >
                                <button 
                                    onclick="copyLink()" 
                                    class="px-4 py-2 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-lg font-bold text-sm transition-colors flex items-center gap-2"
                                >
                                    <span class="material-icons text-sm">content_copy</span>
                                    Kopieren
                                </button>
                            </div>
                            <div class="flex items-start gap-3 text-sm text-neutral-400">
                                <span class="material-icons text-yellow-500">info</span>
                                <p>
                                    <strong class="text-white">Wichtig:</strong> Speichere diesen Link! 
                                    Über diesen Link kannst du jederzeit den Status deines Tickets überprüfen und Antworten vom Team sehen.
                                </p>
                            </div>
                        </div>

                        <script>
                            function copyLink() {
                                const input = document.getElementById('accessLink');
                                input.select();
                                document.execCommand('copy');
                                
                                const btn = event.target.closest('button');
                                const originalHTML = btn.innerHTML;
                                btn.innerHTML = '<span class="material-icons text-sm">check</span> Kopiert!';
                                btn.classList.add('bg-green-500');
                                
                                setTimeout(() => {
                                    btn.innerHTML = originalHTML;
                                    btn.classList.remove('bg-green-500');
                                }, 2000);
                            }
                        </script>
                    @endif
                </div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST" class="bg-neutral-900/50 p-8 rounded-3xl border border-white/5 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">Betreff</label>
                        <input type="text" name="subject" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="Kurze Beschreibung" required>
                         @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">E-Mail</label>
                        <input type="email" name="email" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="deine@email.de" required>
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">
                            Discord (Optional)
                            <span class="text-xs text-neutral-500 ml-1">z.B. username#1234</span>
                        </label>
                        <input type="text" name="discord" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="username#1234">
                        @error('discord') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">Kategorie</label>
                        <select name="category" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors">
                            <option value="general">Allgemeine Anfrage</option>
                            <option value="technical">Technisches Problem</option>
                            <option value="report">Spieler melden</option>
                            <option value="ban">Entbannungsantrag</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-400 mb-2">Nachricht</label>
                    <textarea name="message" rows="5" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="Beschreibe dein Anliegen so genau wie möglich..." required></textarea>
                    @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-neutral-800 hover:bg-[var(--theme-primary)] text-white font-bold py-4 rounded-xl transition-all flex items-center justify-center gap-2 group">
                    Ticket Absenden
                    <span class="material-icons group-hover:translate-x-1 transition-transform">send</span>
                </button>
            </form>
        </div>
    </div>
@endsection
