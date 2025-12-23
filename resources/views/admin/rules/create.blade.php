@extends('layouts.admin')

@section('title', 'Regel erstellen')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Regel erstellen</h1>
            <p class="text-neutral-500">Füge eine neue Regel zum Regelwerk hinzu.</p>
        </div>
        <a href="{{ route('admin.rules.index') }}" class="px-6 py-3 rounded-xl bg-white/5 text-white font-bold hover:bg-white/10 transition-colors">
            Abbrechen
        </a>
    </div>

    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8" x-data="{ section: 'general' }">
        <form action="{{ route('admin.rules.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Section -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Sektion</label>
                    <select name="section" x-model="section" required
                            class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all appearance-none cursor-pointer">
                        <option value="general">Allgemeine Regeln</option>
                        <option value="roleplay">Roleplay Regeln</option>
                        <option value="zones">Zonen & Events</option>
                    </select>
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Sortierung</label>
                    <input type="number" name="sort_order" value="0" required
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                </div>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Inhalt</label>
                <textarea name="content" rows="4" required
                          class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all"
                          placeholder="Der Text der Regel..."></textarea>
            </div>

            <!-- Zone Special Fields -->
            <div x-show="section === 'zones'" x-transition 
                 class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 rounded-xl bg-white/5 border border-white/5">
                
                <div class="md:col-span-3">
                    <h3 class="text-sm font-bold text-white mb-1 flex items-center gap-2">
                        <span class="material-icons text-sm text-[var(--theme-primary)]">map</span>
                        Zonen Einstellungen
                    </h3>
                    <p class="text-xs text-neutral-500 mb-4">Diese Einstellungen sind nur für Zonen-Regeln relevant.</p>
                </div>

                <!-- Title -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Titel</label>
                    <input type="text" name="title"
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all"
                           placeholder="z.B. Safezone">
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Icon (Material Icons)</label>
                    <input type="text" name="icon"
                           class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all"
                           placeholder="z.B. shield">
                </div>

                <!-- Color -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Farbe</label>
                    <select name="color"
                            class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all appearance-none cursor-pointer">
                        <option value="">Standard</option>
                        <option value="red">Rot (Redzone)</option>
                        <option value="green">Grün (Safezone)</option>
                        <option value="blue">Blau</option>
                    </select>
                </div>
            </div>
            
            <div class="pt-6 border-t border-white/5 flex justify-end">
                <button type="submit" class="px-8 py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                    <span class="material-icons">save</span>
                    Regel Speichern
                </button>
            </div>
        </form>
    </div>
@endsection
