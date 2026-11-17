<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#0F0F11]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deluxe Layers — Staff Authentication</title>

    <!-- Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="h-full text-zinc-100 flex flex-col justify-between selection:bg-amber-500 selection:text-[#0F0F11]">
    
    <!-- Navbar Minimalis -->
    <nav class="bg-[#0F0F11]/80 backdrop-blur-md border-b border-zinc-800 px-6 py-4 flex justify-between items-center">
        <a href="{{ route('landing') }}" class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#B59226] to-[#E5C158] flex items-center justify-center text-[#0F0F11] font-serif font-bold text-sm">
                DL
            </div>
            <span class="font-serif text-lg font-bold text-white tracking-wide">Deluxe Layers</span>
        </a>
        <div class="flex items-center gap-4 text-xs font-medium text-zinc-300">
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="hover:text-amber-400 transition">Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-amber-400 transition">Register</a>
                @endif
            @else
                <span class="text-amber-400">{{ Auth::user()->name }}</span>
            @endguest
        </div>
    </nav>

    <!-- Content Section -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-xs text-zinc-600 border-t border-zinc-900">
        &copy; {{ date('Y') }} Deluxe Layers Culinary. All Rights Reserved.
    </footer>
</body>
</html>