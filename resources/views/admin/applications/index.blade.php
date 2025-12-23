@extends('layouts.admin')

@section('title', 'Bewerbungen')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Bewerbungen</h1>
            <p class="text-neutral-500">Übersicht aller eingegangenen Bewerbungen.</p>
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
                    <th class="p-6 font-bold">Bewerber</th>
                    <th class="p-6 font-bold">Typ</th>
                    <th class="p-6 font-bold">Discord</th>
                    <th class="p-6 font-bold">Status</th>
                    <th class="p-6 font-bold text-right">Aktion</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($applications as $app)
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="p-6">
                            <div class="font-bold text-white">{{ $app->name }}</div>
                            <div class="text-xs text-neutral-500">{{ $app->created_at->format('d.m.Y H:i') }}</div>
                        </td>
                        <td class="p-6">
                            <span class="px-3 py-1 rounded-full border border-white/5 text-xs font-bold bg-white/5 text-white">
                                {{ ucfirst($app->type) }}
                            </span>
                        </td>
                        <td class="p-6 text-[#5865F2] text-sm">{{ $app->discord_name }}</td>
                        <td class="p-6">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                                    'accepted' => 'bg-green-500/10 text-green-500 border-green-500/20',
                                    'rejected' => 'bg-red-500/10 text-red-500 border-red-500/20',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full border text-xs font-bold uppercase tracking-wider {{ $statusColors[$app->status] ?? 'bg-gray-500/10 text-gray-400' }}">
                                {{ $app->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <a href="{{ route('admin.applications.show', $app) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] hover:bg-[var(--theme-primary)] hover:text-white transition-all font-bold text-sm">
                                Öffnen
                                <span class="material-icons text-sm">arrow_forward</span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-neutral-500">
                            <span class="material-icons text-4xl mb-2 opacity-50">inbox</span>
                            <p>Keine Bewerbungen vorhanden.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="p-6 border-t border-white/5">
            {{ $applications->links() }}
        </div>
    </div>
@endsection
