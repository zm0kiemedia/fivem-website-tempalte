@extends('layouts.admin')

@section('title', 'Benutzerverwaltung')
@section('header', 'Benutzer')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div class="relative max-w-md w-full">
            <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-400">search</span>
            <input type="text" placeholder="Suchen..." class="w-full pl-12 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-neutral-500 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
        </div>
        
        <a href="{{ route('admin.users.create') }}" class="group flex items-center gap-2 px-6 py-3 bg-[var(--theme-primary)] text-white font-bold rounded-xl hover:shadow-lg hover:shadow-[var(--theme-primary)]/20 hover:scale-105 transition-all duration-300">
            <span class="material-icons text-white group-hover:rotate-90 transition-transform">add</span>
            Neuer Benutzer
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-white/5 border border-white/10 rounded-2xl relative overflow-hidden group hover:border-[var(--theme-primary)]/30 transition-colors">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <span class="material-icons text-6xl">people</span>
            </div>
            <div class="text-neutral-400 text-sm font-bold uppercase tracking-wider mb-2">Gesamt</div>
            <div class="text-4xl font-black text-white">{{ $users->total() }}</div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-md">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/5">
                        <th class="p-6 text-xs font-bold text-neutral-400 uppercase tracking-widest">Name</th>
                        <th class="p-6 text-xs font-bold text-neutral-400 uppercase tracking-widest">Email</th>
                        <th class="p-6 text-xs font-bold text-neutral-400 uppercase tracking-widest">Erstellt</th>
                        <th class="p-6 text-xs font-bold text-neutral-400 uppercase tracking-widest text-right">Aktionen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($users as $user)
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[var(--theme-primary)] to-purple-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="font-bold text-white group-hover:text-[var(--theme-primary)] transition-colors">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="p-6 font-mono text-sm text-neutral-400">{{ $user->email }}</td>
                            <td class="p-6 text-neutral-400 text-sm">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-xs">calendar_today</span>
                                    {{ $user->created_at->format('d.m.Y H:i') }}
                                </div>
                            </td>
                            <td class="p-6">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all transform translate-x-4 group-hover:translate-x-0">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] rounded-lg hover:bg-[var(--theme-primary)] hover:text-white transition-all transform hover:scale-110" title="Bearbeiten">
                                        <span class="material-icons text-lg">edit</span>
                                    </a>
                                    
                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Wirklich löschen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all transform hover:scale-110" title="Löschen">
                                                <span class="material-icons text-lg">delete</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-neutral-500">
                                    <span class="material-icons text-6xl mb-4 opacity-50">person_off</span>
                                    <p class="text-lg font-medium">Keine Benutzer gefunden</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
            <div class="p-6 border-t border-white/5">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
