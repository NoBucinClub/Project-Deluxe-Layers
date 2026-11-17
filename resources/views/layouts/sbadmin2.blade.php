<!DOCTYPE html>
<html lang="id" class="h-full bg-[#0F0F11]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard — Deluxe Layers</title>
    
    <!-- Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0F0F11; }
        ::-webkit-scrollbar-thumb { background: #27272A; border-radius: 3px; }
    </style>
</head>
<body class="h-full text-zinc-100 flex flex-col justify-between selection:bg-amber-500 selection:text-[#0F0F11]">

    <!-- Top Navigation -->
    <header class="bg-[#18181B] border-b border-zinc-800 px-6 py-4 flex justify-between items-center sticky top-0 z-30">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-[#B59226] to-[#E5C158] flex items-center justify-center text-[#0F0F11] font-serif font-bold text-sm shadow">
                DL
            </div>
            <div>
                <span class="font-serif text-lg font-bold text-white tracking-wide">Deluxe Layers</span>
                <span class="text-[10px] block uppercase tracking-widest text-amber-400">Admin Control Panel</span>
            </div>
        </div>

        <!-- Bagian Kanan: Tombol Website & Profil Admin -->
        <div class="flex items-center gap-4">
            <a href="{{ route('landing') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-zinc-900 border border-zinc-700 text-xs font-semibold text-zinc-300 hover:text-amber-400 transition">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i> Lihat Website
            </a>
            
            <!-- Profil & Tombol Logout -->
            <div class="flex items-center gap-3 pl-3 border-l border-zinc-800">
                <div class="flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-zinc-900 border border-zinc-800">
                    <div class="w-7 h-7 rounded-full bg-amber-500/20 text-amber-400 font-bold text-xs flex items-center justify-center border border-amber-500/30">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <span class="text-xs font-semibold text-zinc-200 hidden sm:inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 transition flex items-center justify-center" title="Logout">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Body Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-xs text-zinc-600 border-t border-zinc-900 bg-[#18181B]">
        &copy; {{ date('Y') }} Deluxe Layers Culinary. Admin Dashboard.
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>