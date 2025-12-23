@extends('layouts.admin')

@section('title', 'Regelwerk verwalten')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Regelwerk Management</h1>
            <p class="text-neutral-500">Verwalte die Server-Regeln und Richtlinien.</p>
        </div>
        <a href="{{ route('admin.rules.create') }}" class="px-6 py-3 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <span class="material-icons">add</span>
            Neue Regel
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
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Sortierung</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Sektion</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Inhalt</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Extras</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500 text-right">Aktionen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($rules as $rule)
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="p-6 font-mono text-neutral-500">#{{ $rule->sort_order }}</td>
                        <td class="p-6">
                            @php
                                $badges = [
                                    'general' => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
                                    'roleplay' => 'bg-orange-500/10 text-orange-500 border-orange-500/20',
                                    'zones' => 'bg-green-500/10 text-green-500 border-green-500/20',
                                ];
                                $names = [
                                    'general' => 'Allgemein',
                                    'roleplay' => 'Roleplay',
                                    'zones' => 'Zonen',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $badges[$rule->section] ?? 'bg-neutral-800 text-neutral-400 border-neutral-700' }}">
                                {{ $names[$rule->section] ?? ucfirst($rule->section) }}
                            </span>
                        </td>
                        <td class="p-6">
                            <p class="text-neutral-300 max-w-xl text-sm leading-relaxed">{{ Str::limit($rule->content, 80) }}</p>
                        </td>
                        <td class="p-6">
                            @if($rule->title || $rule->icon || $rule->color)
                                <div class="flex gap-2">
                                    @if($rule->title)
                                        <span class="px-2 py-1 bg-white/5 rounded text-xs text-neutral-400" title="Titel: {{ $rule->title }}">T: {{ $rule->title }}</span>
                                    @endif
                                    @if($rule->icon)
                                        <span class="px-2 py-1 bg-white/5 rounded text-xs text-neutral-400 flex items-center gap-1" title="Icon: {{ $rule->icon }}">
                                            <span class="material-icons text-[10px]">{{ $rule->icon }}</span>
                                        </span>
                                    @endif
                                    @if($rule->color)
                                        <span class="w-6 h-6 rounded bg-{{ $rule->color }}-500 block" title="Farbe: {{ $rule->color }}"></span>
                                    @endif
                                </div>
                            @else
                                <span class="text-neutral-600">-</span>
                            @endif
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.rules.edit', $rule) }}" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition-colors">
                                    <span class="material-icons">edit</span>
                                </a>
                                <form action="{{ route('admin.rules.destroy', $rule) }}" method="POST" onsubmit="return confirm('Wirklich löschen?');">
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
                            <span class="material-icons text-4xl mb-2 opacity-50">menu_book</span>
                            <p>Keine Regeln gefunden.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="p-6 border-t border-white/5">
            {{ $rules->links() }}
        </div>
    </div>
@endsection
