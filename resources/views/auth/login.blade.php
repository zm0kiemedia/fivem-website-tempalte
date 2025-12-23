@extends('layouts.app')

@section('title', 'Login - FiveM Server')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <!-- Background -->
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=1920&auto=format&fit=crop')] bg-cover bg-center opacity-20 dark:opacity-40"></div>
             <div class="absolute inset-0 bg-gradient-to-t from-neutral-50 via-white/80 to-transparent dark:from-[#050505] dark:via-[#050505]/80 dark:to-transparent"></div>
        </div>

        <div class="relative z-10 w-full max-w-md px-6 animate-fade-in-up">
            <div class="bg-white/80 dark:bg-[#0a0a0a]/80 backdrop-blur-xl border border-neutral-200 dark:border-white/5 p-10 rounded-3xl shadow-2xl">
                
                <div class="text-center mb-10">
                    <span class="inline-block p-3 rounded-2xl bg-[var(--theme-primary)]/10 text-[var(--theme-primary)] mb-4">
                        <span class="material-icons text-3xl">lock</span>
                    </span>
                    <h1 class="text-3xl font-black text-neutral-900 dark:text-white">Willkommen zurück</h1>
                    <p class="text-neutral-500 dark:text-neutral-400 mt-2">Melde dich an, um fortzufahren.</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 dark:text-neutral-400 mb-2">Email</label>
                        <div class="relative">
                            <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-400">email</span>
                            <input type="email" name="email" required 
                                   class="w-full bg-neutral-50 dark:bg-[#111] border border-neutral-200 dark:border-white/5 rounded-xl py-3 pl-12 pr-4 text-neutral-900 dark:text-white placeholder-neutral-400 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all"
                                   placeholder="name@example.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-500 dark:text-neutral-400 mb-2">Passwort</label>
                        <div class="relative">
                            <span class="material-icons absolute left-4 top-1/2 -translate-y-1/2 text-neutral-400">key</span>
                            <input type="password" name="password" required 
                                   class="w-full bg-neutral-50 dark:bg-[#111] border border-neutral-200 dark:border-white/5 rounded-xl py-3 pl-12 pr-4 text-neutral-900 dark:text-white placeholder-neutral-400 focus:outline-none focus:border-[var(--theme-primary)] focus:ring-1 focus:ring-[var(--theme-primary)] transition-all"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 cursor-pointer text-neutral-600 dark:text-neutral-400 select-none">
                            <input type="checkbox" name="remember" class="rounded border-neutral-300 text-[var(--theme-primary)] focus:ring-[var(--theme-primary)] bg-neutral-100 dark:bg-neutral-800">
                            <span>Angemeldet bleiben</span>
                        </label>
                        <a href="#" class="text-[var(--theme-primary)] hover:text-[var(--theme-primary)] font-bold transition-colors">Passwort vergessen?</a>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-[var(--theme-primary)] hover:bg-[var(--theme-primary)] text-white font-bold uppercase tracking-widest shadow-lg shadow-[var(--theme-primary)]/20 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                        <span>Einloggen</span>
                        <span class="material-icons group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                    
                    @if($errors->any())
                        <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500 text-sm text-center font-medium">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </form>

                <div class="mt-8 text-center border-t border-neutral-200 dark:border-white/5 pt-8">
                    <p class="text-neutral-500 dark:text-neutral-400 text-sm">
                        Noch keinen Account? 
                        <a href="#" class="text-neutral-900 dark:text-white font-bold hover:text-[var(--theme-primary)] transition-colors">Jetzt registrieren</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
