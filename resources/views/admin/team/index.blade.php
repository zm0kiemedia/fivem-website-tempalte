@extends('layouts.admin')

@section('title', 'Team verwalten')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Team Management</h1>
            <p class="text-neutral-500">Verwalte deine Teammitglieder und deren Rollen.</p>
        </div>
        <a href="{{ route('admin.team.create') }}" class="px-6 py-3 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <span class="material-icons">person_add</span>
            Mitglied hinzufügen
        </a>
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
                <tr class="border-b border-white/5 bg-white/5">
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Rang</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Mitglied</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Bio & Discord</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500 text-right">Aktionen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($members as $member)
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="p-6">
                            <span class="font-mono text-neutral-500">#{{ $member->rank_order }}</span>
                        </td>
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                @if($member->image)
                                    <div class="w-12 h-12 rounded-full bg-cover bg-center shrink-0 border border-white/10" style="background-image: url('{{ Storage::url($member->image) }}')"></div>
                                @else
                                    <div class="w-12 h-12 rounded-full bg-neutral-800 flex items-center justify-center shrink-0 text-neutral-600 font-bold border border-white/10">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="font-bold text-white group-hover:text-[var(--theme-primary)] transition-colors">{{ $member->name }}</div>
                                    <div class="text-xs text-[var(--theme-primary)] font-bold uppercase tracking-wider">{{ $member->role }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <div class="text-sm text-neutral-400 max-w-xs truncate">{{ $member->bio }}</div>
                            <div class="text-xs text-[#5865F2] mt-1 flex items-center gap-1">
                                <span class="material-icons text-[10px]">discord</span>
                                {{ $member->discord }}
                            </div>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.team.edit', $member) }}" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition-colors">
                                    <span class="material-icons">edit</span>
                                </a>
                                <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Wirklich löschen?');">
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
                        <td colspan="4" class="p-12 text-center text-neutral-500">
                            <span class="material-icons text-4xl mb-2 opacity-50">groups</span>
                            <p>Keine Teammitglieder gefunden.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
