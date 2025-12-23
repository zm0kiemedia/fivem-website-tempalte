@extends('layouts.app')

@section('title', 'Bewerben - FiveM Server')

@section('content')
    <div class="container mx-auto px-6 py-24">
         <div class="max-w-2xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold mb-4 text-white">Bewerbung einreichen</h1>
                <p class="text-neutral-400">Werde Teil des Teams oder starte deine Karriere.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
                    <span class="material-icons">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('applications.store') }}" method="POST" class="bg-neutral-900/50 p-8 rounded-3xl border border-white/5 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">Name / Ingame Name</label>
                        <input type="text" name="name" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="Max Mustermann" required>
                         @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-neutral-400 mb-2">Discord Name</label>
                        <input type="text" name="discord_name" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="user#1234" required>
                        @error('discord_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-400 mb-2">Bewerbungsart</label>
                    <select name="type" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors">
                        <option value="whitelist">Whitelist Antrag (Bürger)</option>
                        <option value="police">Polizei (LSPD)</option>
                        <option value="medic">Rettungsdienst (LSMD)</option>
                        <option value="supporter">Server Team / Support</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-400 mb-2">Anschreiben & Erfahrungen</label>
                    <textarea name="content" rows="8" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[var(--theme-primary)] transition-colors" placeholder="Wieso sollten wir dich annehmen? Erzähle uns von deiner RP Erfahrung..." required></textarea>
                    @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-start gap-3 p-4 bg-[var(--theme-primary)]/10 rounded-xl border border-[var(--theme-primary)]/20 text-orange-200 text-sm mb-4">
                     <span class="material-icons text-[var(--theme-primary)] shrink-0">info</span>
                     <p>Mit dem Absenden bestätigst du, dass du das Regelwerk gelesen und verstanden hast. Falschangaben führen zur Ablehnung.</p>
                </div>

                <button type="submit" class="w-full bg-neutral-800 hover:bg-[var(--theme-primary)] text-white font-bold py-4 rounded-xl transition-all flex items-center justify-center gap-2 group">
                    Bewerbung Absenden
                    <span class="material-icons group-hover:translate-x-1 transition-transform">send</span>
                </button>
            </form>
        </div>
    </div>
@endsection
