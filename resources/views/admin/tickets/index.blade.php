@extends('layouts.admin')

@section('title', 'Support Tickets')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Support Tickets</h1>
            <p class="text-neutral-500">Verwalte Anfragen und Support-Fälle.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 font-bold flex items-center gap-3">
            <span class="material-icons">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-white/5 bg-white/5 text-neutral-500 text-xs uppercase tracking-wider">
                    <th class="p-6 font-bold">Betreff</th>
                    <th class="p-6 font-bold">Ersteller</th>
                    <th class="p-6 font-bold">Kategorie</th>
                    <th class="p-6 font-bold">Status</th>
                    <th class="p-6 font-bold text-right">Aktion</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($tickets as $ticket)
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="p-6">
                            <div class="font-bold text-white group-hover:text-[var(--theme-primary)] transition-colors">{{ $ticket->subject }}</div>
                            <div class="text-xs text-neutral-500">{{ Str::limit($ticket->message, 50) }}</div>
                        </td>
                        <td class="p-6">
                            <div class="text-sm text-neutral-300">{{ $ticket->email }}</div>
                            <div class="text-xs text-neutral-500">{{ $ticket->created_at->diffForHumans() }}</div>
                        </td>
                         <td class="p-6">
                            <span class="px-3 py-1 rounded-full border border-white/5 text-xs font-bold bg-white/5 text-white capitalize">
                                {{ $ticket->category }}
                            </span>
                        </td>
                        <td class="p-6">
                            @php
                                $statusColors = [
                                    'open' => 'bg-green-500/10 text-green-500 border-green-500/20',
                                    'answered' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                                    'closed' => 'bg-gray-500/10 text-gray-500 border-gray-500/20',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full border text-xs font-bold uppercase tracking-wider {{ $statusColors[$ticket->status] ?? 'bg-white/5' }}">
                                {{ $ticket->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.tickets.show', $ticket) }}" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition-colors">
                                    <span class="material-icons">visibility</span>
                                </a>
                                <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('Ticket unwiderruflich löschen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-neutral-400 hover:text-red-500 hover:bg-red-500/10 transition-colors">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-neutral-500">
                            <span class="material-icons text-4xl mb-2 opacity-50">gpp_good</span>
                            <p>Keine offenen Tickets.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="p-6 border-t border-white/5">
            {{ $tickets->links() }}
        </div>
    </div>
@endsection
