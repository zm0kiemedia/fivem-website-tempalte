@extends('layouts.admin')

@section('title', 'Ticket ansehen')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3 mb-2">
                 <a href="{{ route('admin.tickets.index') }}" class="text-neutral-500 hover:text-white transition-colors">
                    <span class="material-icons">arrow_back</span>
                </a>
                <h1 class="text-3xl font-black text-white">Ticket #{{ $ticket->id }}</h1>
            </div>
            <p class="text-neutral-500">Betreff: {{ $ticket->subject }}</p>
        </div>
        
        <div class="flex items-center gap-3">
             @if($ticket->status !== 'closed')
                <form action="{{ route('admin.tickets.update', $ticket) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="closed">
                    <button type="submit" class="px-6 py-2 rounded-xl bg-green-500 text-white font-bold hover:bg-green-600 shadow-lg shadow-green-500/20 transition-all flex items-center gap-2">
                        <span class="material-icons">check_circle</span> Ticket schließen
                    </button>
                </form>
            @else
                <form action="{{ route('admin.tickets.update', $ticket) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="open">
                    <button type="submit" class="px-6 py-2 rounded-xl bg-white/5 text-neutral-400 font-bold hover:bg-white/10 border border-white/10 transition-all flex items-center gap-2">
                        <span class="material-icons">replay</span> Wieder öffnen
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-white/5">
                    <div class="w-12 h-12 rounded-full bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] flex items-center justify-center font-bold">
                        {{ substr($ticket->email, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-bold text-white">{{ $ticket->email }}</div>
                        <div class="text-xs text-neutral-500">Erstellt am {{ $ticket->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                </div>
                
                <div class="prose prose-invert max-w-none text-neutral-300">
                    <p>{{ $ticket->message }}</p>
                </div>
            </div>

            <!-- Replies Section -->
            @if($ticket->replies->count() > 0)
                <div class="space-y-4">
                    <h3 class="font-bold text-white text-xl mb-6">Antworten ({{ $ticket->replies->count() }})</h3>
                    @foreach($ticket->replies as $reply)
                        <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-green-500/10 text-green-500 flex items-center justify-center font-bold">
                                    <span class="material-icons text-sm">support_agent</span>
                                </div>
                                <div>
                                    <div class="font-bold text-white">{{ $reply->replied_by ?? 'Admin' }}</div>
                                    <div class="text-xs text-neutral-500">{{ $reply->created_at->diffForHumans() }}</div>
                                </div>
                                <span class="ml-auto px-3 py-1 rounded-full text-xs font-bold bg-green-500/10 text-green-500 border border-green-500/20">Admin</span>
                            </div>
                            <div class="prose prose-invert max-w-none text-neutral-300 pl-13">
                                <p class="whitespace-pre-wrap">{{ $reply->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Reply Form -->
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
                <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                    <span class="material-icons text-[var(--theme-primary)]">reply</span>
                    Neue Antwort schreiben
                </h3>
                <form action="{{ route('admin.tickets.reply', $ticket) }}" method="POST">
                    @csrf
                    <textarea 
                        name="message" 
                        class="w-full bg-black/20 border border-white/10 rounded-xl p-4 text-white focus:border-[var(--theme-primary)] focus:ring-2 focus:ring-[var(--theme-primary)]/20 transition-all" 
                        rows="5" 
                        placeholder="Schreibe deine Antwort hier..."
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-xs text-neutral-500">Diese Antwort wird dem Ticket hinzugefügt und der Status wird auf "Beantwortet" gesetzt.</p>
                        <button type="submit" class="px-6 py-3 bg-[var(--theme-primary)] text-white rounded-xl font-bold hover:bg-[var(--theme-secondary)] transition-colors flex items-center gap-2 shadow-lg shadow-[var(--theme-primary)]/20">
                            <span class="material-icons text-sm">send</span>
                            Antwort senden
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-6 space-y-6">
                 <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Status</span>
                    <span class="font-bold text-white capitalize">{{ $ticket->status }}</span>
                </div>
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Kategorie</span>
                    <span class="font-bold text-white capitalize">{{ $ticket->category }}</span>
                </div>
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Email Kontakt</span>
                    <a href="mailto:{{ $ticket->email }}" class="text-[var(--theme-primary)] hover:underline font-bold">{{ $ticket->email }}</a>
                </div>
                @if($ticket->discord)
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-1">Discord</span>
                        <div class="flex items-center gap-2">
                            <span class="material-icons text-[var(--theme-primary)] text-sm">chat</span>
                            <span class="font-bold text-white">{{ $ticket->discord }}</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
