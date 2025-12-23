@extends('layouts.admin')

@section('title', 'Bewerbung Details')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3 mb-2">
                 <a href="{{ route('admin.applications.index') }}" class="text-neutral-500 hover:text-white transition-colors">
                    <span class="material-icons">arrow_back</span>
                </a>
                <h1 class="text-3xl font-black text-white">Bewerbung von {{ $application->name }}</h1>
            </div>
            <p class="text-neutral-500">Eingereicht am {{ $application->created_at->format('d.m.Y \u\m H:i') }} Uhr</p>
        </div>
        
        <div class="flex items-center gap-3">
            @if($application->status === 'pending')
                <form action="{{ route('admin.applications.update', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" class="px-4 py-2 rounded-xl bg-red-500/10 text-red-500 border border-red-500/20 hover:bg-red-500 hover:text-white font-bold transition-all flex items-center gap-2">
                        <span class="material-icons">close</span> Ablehnen
                    </button>
                </form>
                <form action="{{ route('admin.applications.update', $application) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="accepted">
                    <button type="submit" class="px-6 py-2 rounded-xl bg-green-500 text-white font-bold hover:bg-green-600 shadow-lg shadow-green-500/20 transition-all flex items-center gap-2">
                        <span class="material-icons">check</span> Annehmen
                    </button>
                </form>
            @else
                <div class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 text-neutral-400 font-bold uppercase tracking-wider">
                    Status: {{ ucfirst($application->status) }}
                </div>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content (Q&A) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">description</span>
                    Bewerbungsinhalt
                </h3>
                
                <div class="prose prose-invert max-w-none text-neutral-300">
                    {!! nl2br(e($application->content)) !!}
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-6 space-y-6">
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Bewerber Name</span>
                    <span class="text-white font-bold text-lg">{{ $application->name }}</span>
                </div>
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Discord</span>
                    <span class="text-[#5865F2] font-bold text-lg flex items-center gap-2">
                        <span class="material-icons text-lg">discord</span>
                        {{ $application->discord_name }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Bewerbungstyp</span>
                    <span class="px-3 py-1 rounded-lg bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] border border-[var(--theme-primary)]/20 font-bold inline-block">
                        {{ ucfirst($application->type) }}
                    </span>
                </div>
                <div class="pt-6 border-t border-white/5">
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Kontaktieren</span>
                    <a href="https://discord.com" target="_blank" class="w-full py-3 rounded-xl bg-[#5865F2] hover:bg-[#4752c4] text-white font-bold flex items-center justify-center gap-2 transition-colors">
                        Auf Discord anschreiben
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
