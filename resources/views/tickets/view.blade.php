@extends('layouts.app')

@section('title', 'Ticket Ansehen')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[40vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-[var(--theme-primary)]/20 to-[var(--theme-secondary)]/20"></div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[var(--theme-primary)]/10 border border-[var(--theme-primary)]/20 text-[var(--theme-primary)] text-sm font-bold uppercase tracking-widest mb-4">
                <span class="material-icons text-sm">confirmation_number</span>
                Ticket #{{ $ticket->id }}
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-neutral-900 dark:text-white mb-4">{{ $ticket->subject }}</h1>
            <div class="flex items-center justify-center gap-4 text-neutral-600 dark:text-neutral-400">
                <span class="flex items-center gap-2">
                    <span class="material-icons text-sm">schedule</span>
                    {{ $ticket->created_at->format('d.m.Y H:i') }}
                </span>
                <span class="w-1 h-1 bg-neutral-400 rounded-full"></span>
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase 
                    {{ $ticket->status === 'open' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : '' }}
                    {{ $ticket->status === 'answered' ? 'bg-green-500/10 text-green-500 border border-green-500/20' : '' }}
                    {{ $ticket->status === 'closed' ? 'bg-neutral-500/10 text-neutral-500 border border-neutral-500/20' : '' }}
                ">
                    {{ $ticket->status }}
                </span>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-neutral-50 dark:bg-[#050505]">
        <div class="container mx-auto px-6 max-w-4xl">
            <!-- Original Message -->
            <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl border border-neutral-200 dark:border-white/5 p-8 mb-8">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-neutral-200 dark:border-white/5">
                    <div class="w-12 h-12 rounded-full bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] flex items-center justify-center font-bold text-xl">
                        {{ substr($ticket->email, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-bold text-neutral-900 dark:text-white">{{ $ticket->email }}</div>
                        <div class="text-sm text-neutral-500">{{ $ticket->created_at->diffForHumans() }}</div>
                    </div>
                    <span class="ml-auto px-3 py-1 rounded-full text-xs font-bold bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] border border-[var(--theme-primary)]/20">{{ $ticket->category }}</span>
                </div>
                
                <div class="prose prose-neutral dark:prose-invert max-w-none">
                    <p class="text-neutral-700 dark:text-neutral-300 whitespace-pre-wrap">{{ $ticket->message }}</p>
                </div>
            </div>

            <!-- Admin Replies -->
            @if($ticket->replies->count() > 0)
                <div class="space-y-6">
                    <h2 class="text-2xl font-black text-neutral-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="material-icons text-[var(--theme-primary)]">forum</span>
                        Antworten vom Team ({{ $ticket->replies->count() }})
                    </h2>
                    
                    @foreach($ticket->replies as $reply)
                        <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl border border-neutral-200 dark:border-white/5 p-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-full {{ $reply->is_admin ? 'bg-green-500/10 text-green-500' : 'bg-blue-500/10 text-blue-500' }} flex items-center justify-center">
                                    <span class="material-icons">{{ $reply->is_admin ? 'support_agent' : 'person' }}</span>
                                </div>
                                <div>
                                    <div class="font-bold text-neutral-900 dark:text-white">{{ $reply->is_admin ? ($reply->replied_by ?? 'Team Support') : 'Du' }}</div>
                                    <div class="text-sm text-neutral-500">{{ $reply->created_at->diffForHumans() }}</div>
                                </div>
                                <span class="ml-auto px-3 py-1 rounded-full text-xs font-bold {{ $reply->is_admin ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'bg-blue-500/10 text-blue-500 border border-blue-500/20' }}">
                                    {{ $reply->is_admin ? 'Admin' : 'Deine Antwort' }}
                                </span>
                            </div>
                            
                            <div class="prose prose-neutral dark:prose-invert max-w-none">
                                <p class="text-neutral-700 dark:text-neutral-300 whitespace-pre-wrap">{{ $reply->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl border border-neutral-200 dark:border-white/5 p-12 text-center">
                    <span class="material-icons text-6xl text-neutral-400 mb-4">pending</span>
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white mb-2">Noch keine Antwort</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">Unser Team arbeitet an deinem Ticket. Du wirst benachrichtigt, sobald wir geantwortet haben.</p>
                </div>
            @endif

            <!-- User Reply Form -->
            @if($ticket->status !== 'closed')
                <div class="mt-8 bg-white dark:bg-[#0a0a0a] rounded-3xl border border-neutral-200 dark:border-white/5 p-8">
                    <h3 class="text-xl font-bold text-neutral-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-icons text-[var(--theme-primary)]">reply</span>
                        Antworten
                    </h3>
                    
                    @if(session('success'))
                        <div class="mb-4 bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded-xl flex items-center gap-2">
                            <span class="material-icons text-sm">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('tickets.user-reply', $ticket->access_token) }}" method="POST">
                        @csrf
                        <textarea 
                            name="message" 
                            rows="5" 
                            class="w-full bg-neutral-100 dark:bg-black/20 border border-neutral-200 dark:border-white/10 rounded-xl p-4 text-neutral-900 dark:text-white focus:border-[var(--theme-primary)] focus:ring-2 focus:ring-[var(--theme-primary)]/20 transition-all" 
                            placeholder="Schreibe deine Antwort hier..."
                            required
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                        
                        <div class="mt-4 flex justify-between items-center">
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">Deine Antwort wird dem Team zugestellt.</p>
                            <button type="submit" class="px-6 py-3 bg-[var(--theme-primary)] hover:bg-[var(--theme-secondary)] text-white rounded-xl font-bold transition-colors flex items-center gap-2 shadow-lg shadow-[var(--theme-primary)]/20">
                                <span class="material-icons text-sm">send</span>
                                Antwort senden
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="mt-8 bg-neutral-500/5 border border-neutral-500/20 rounded-2xl p-6 text-center">
                    <span class="material-icons text-4xl text-neutral-400 mb-2">lock</span>
                    <p class="text-neutral-600 dark:text-neutral-400">Dieses Ticket wurde geschlossen und akzeptiert keine weiteren Antworten.</p>
                </div>
            @endif

            <!-- Info Box -->
            <div class="mt-8 bg-blue-500/5 border border-blue-500/20 rounded-2xl p-6">
                <div class="flex items-start gap-4">
                    <span class="material-icons text-blue-500 text-2xl">info</span>
                    <div class="flex-1">
                        <h4 class="font-bold text-neutral-900 dark:text-white mb-2">💡 Tipp</h4>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            Speichere diesen Link, um dein Ticket später erneut anzusehen. Du wirst automatisch benachrichtigt, wenn wir antworten.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
