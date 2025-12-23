@extends('layouts.admin')

@section('title', 'Bild bearbeiten')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-white mb-2">Bild bearbeiten</h1>
            <p class="text-neutral-500">Bearbeite die Details dieses Bildes.</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="px-6 py-3 rounded-xl bg-white/5 text-white font-bold hover:bg-white/10 transition-colors">
            Abbrechen
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Preview -->
        <div class="md:col-span-1">
             <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-4">
                 <img src="{{ Storage::url($gallery->image_url) }}" class="rounded-xl w-full h-auto">
                 <p class="text-xs text-neutral-500 mt-4 text-center">Hochgeladen am {{ $gallery->created_at->format('d.m.Y H:i') }}</p>
             </div>
        </div>

        <!-- Form -->
        <div class="md:col-span-2">
            <div class="bg-[#0a0a0a] rounded-3xl border border-white/5 p-8">
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Category -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Kategorie</label>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach(['events' => 'Events', 'community' => 'Community', 'server' => 'Server'] as $key => $label)
                            <label class="cursor-pointer">
                                <input type="radio" name="category" value="{{ $key }}" class="peer sr-only" {{ $gallery->category == $key ? 'checked' : '' }}>
                                <div class="text-center py-3 rounded-xl border border-white/5 bg-black/20 text-neutral-400 peer-checked:bg-[var(--theme-primary)] peer-checked:text-white peer-checked:border-[var(--theme-primary)] transition-all font-bold">
                                    {{ $label }}
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Image Replace -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Bild ersetzen (Optional)</label>
                        <div class="relative group cursor-pointer" x-data="{ preview: null }">
                            <input type="file" name="image" accept="image/*" 
                                   @change="preview = URL.createObjectURL($event.target.files[0])"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10 h-32">
                            
                            <div class="border-2 border-dashed border-white/10 rounded-xl p-8 h-32 flex flex-col items-center justify-center text-center transition-all group-hover:border-[var(--theme-primary)]/50 group-hover:bg-[var(--theme-primary)]/5 overflow-hidden relative">
                                <template x-if="preview">
                                    <img :src="preview" class="absolute inset-0 w-full h-full object-cover opacity-50">
                                </template>
                                <span class="material-icons text-3xl text-neutral-600 group-hover:text-[var(--theme-primary)] transition-colors mb-1 relative z-10">cloud_upload</span>
                                <p class="text-neutral-500 text-sm font-bold relative z-10">Neues Bild auswählen</p>
                            </div>
                        </div>
                    </div>

                    <!-- Caption -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 mb-2">Beschreibung</label>
                        <input type="text" name="caption" value="{{ old('caption', $gallery->caption) }}"
                               class="w-full bg-black/20 border border-white/5 rounded-xl py-3 px-4 text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                    </div>
                    
                    <div class="pt-6 border-t border-white/5 flex justify-end">
                        <button type="submit" class="px-8 py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                            <span class="material-icons">save</span>
                            Speichern
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
