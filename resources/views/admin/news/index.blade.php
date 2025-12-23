@extends('layouts.admin')

@section('title', 'News verwalten')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">News Management</h1>
            <p class="text-neutral-500">Verwalte alle Neuigkeiten und Ankündigungen.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="px-6 py-3 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
            <span class="material-icons">add</span>
            Neuer Beitrag
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
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Titel</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500">Datum</th>
                    <th class="p-6 text-xs font-bold uppercase tracking-wider text-neutral-500 text-right">Aktionen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($posts as $post)
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="p-6">
                            <div class="flex items-center gap-4">
                                @if($post->image)
                                    <div class="w-12 h-12 rounded-lg bg-cover bg-center shrink-0" style="background-image: url('{{ Storage::url($post->image) }}')"></div>
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-neutral-800 flex items-center justify-center shrink-0 text-neutral-600">
                                        <span class="material-icons">image_not_supported</span>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-bold text-white group-hover:text-[var(--theme-primary)] transition-colors">{{ $post->title }}</div>
                                    <div class="text-xs text-neutral-500 truncate max-w-xs">{{ Str::limit($post->excerpt ?? $post->content, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-6">
                            <span class="px-3 py-1 rounded-full bg-white/5 text-xs font-bold text-neutral-400 border border-white/5">
                                {{ $post->published_at ? $post->published_at->format('d.m.Y H:i') : 'Entwurf' }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.news.edit', $post) }}" class="p-2 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition-colors">
                                    <span class="material-icons">edit</span>
                                </a>
                                <form action="{{ route('admin.news.destroy', $post) }}" method="POST" onsubmit="return confirm('Wirklich löschen?');">
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
                        <td colspan="3" class="p-12 text-center text-neutral-500">
                            <span class="material-icons text-4xl mb-2 opacity-50">inbox</span>
                            <p>Keine Beiträge gefunden.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="p-6 border-t border-white/5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
