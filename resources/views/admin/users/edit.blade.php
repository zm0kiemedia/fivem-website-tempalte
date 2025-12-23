@extends('layouts.admin')

@section('title', 'Benutzer bearbeiten')
@section('header', 'Benutzer bearbeiten')

@section('content')
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-neutral-400 hover:text-white mb-8 transition-colors group">
            <span class="material-icons text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
            Zurück zur Übersicht
        </a>

        <div class="bg-white/5 border border-white/10 rounded-2xl p-8 backdrop-blur-md">
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- General -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-black text-white flex items-center gap-2 mb-6 border-b border-white/10 pb-4">
                            <span class="material-icons text-[var(--theme-primary)]">badge</span>
                            Grunddaten
                        </h3>
                        
                        <!-- Name -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-neutral-400 uppercase tracking-widest">Name</label>
                            <div class="relative group">
                                <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 group-focus-within:text-[var(--theme-primary)] transition-colors">person</span>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
                                       class="w-full pl-12 pr-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                            </div>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-neutral-400 uppercase tracking-widest">E-Mail</label>
                            <div class="relative group">
                                <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 group-focus-within:text-[var(--theme-primary)] transition-colors">email</span>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                                       class="w-full pl-12 pr-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                            </div>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-black text-white flex items-center gap-2 mb-6 border-b border-white/10 pb-4">
                            <span class="material-icons text-[var(--theme-primary)]">lock</span>
                            Sicherheit (Optional)
                        </h3>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-neutral-400 uppercase tracking-widest">Neues Passwort</label>
                            <div class="relative group">
                                <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 group-focus-within:text-[var(--theme-primary)] transition-colors">key</span>
                                <input type="password" name="password" placeholder="Leer lassen zum Beibehalten"
                                       class="w-full pl-12 pr-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                            </div>
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-neutral-400 uppercase tracking-widest">Passwort bestätigen</label>
                            <div class="relative group">
                                <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 group-focus-within:text-[var(--theme-primary)] transition-colors">lock_reset</span>
                                <input type="password" name="password_confirmation" placeholder="Falls Passwort geändert wird"
                                       class="w-full pl-12 pr-4 py-3 bg-black/20 border border-white/10 rounded-xl text-white placeholder-neutral-600 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-white/10 flex justify-end">
                    <button type="submit" class="group flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-[var(--theme-primary)] to-purple-600 text-white font-black uppercase tracking-wider rounded-xl hover:shadow-lg hover:shadow-[var(--theme-primary)]/20 hover:scale-105 transition-all duration-300">
                        <span class="material-icons group-hover:rotate-12 transition-transform">save</span>
                        Änderungen speichern
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
