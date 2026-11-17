@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full bg-[#18181B] border border-zinc-800 rounded-3xl p-8 shadow-2xl space-y-6">
        
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-[#B59226] to-[#E5C158] flex items-center justify-center text-[#0F0F11] font-serif font-bold text-xl mx-auto shadow-lg shadow-amber-500/20">
                DL
            </div>
            <h2 class="font-serif text-2xl font-bold text-white">Staff Login</h2>
            <p class="text-xs text-zinc-400">Masuk ke panel manajemen Deluxe Layers</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-xs text-zinc-400 block mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       class="w-full px-4 py-3 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="text-xs text-zinc-400 block mb-1">Password</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-3 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none">
            </div>

            <div class="flex items-center justify-between text-xs text-zinc-400">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-[#0F0F11] border-zinc-700 text-amber-500 focus:ring-0">
                    <span>Remember Me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="hover:text-amber-400 transition">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-[#0F0F11] font-bold text-sm tracking-wide transition shadow-lg shadow-amber-500/20">
                Log In
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="{{ route('landing') }}" class="text-xs text-zinc-500 hover:text-amber-400 transition">&larr; Kembali ke Beranda Website</a>
        </div>
    </div>
</div>
@endsection