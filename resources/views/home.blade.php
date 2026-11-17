@extends('layouts.sbadmin2')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
    
    @if(session('success'))
    <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-2">
        <i data-lucide="check-circle" class="w-4 h-4"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-[#18181B] p-6 rounded-3xl border border-zinc-800 space-y-1">
            <span class="text-xs text-zinc-400 uppercase tracking-wider">Total Varian Menu</span>
            <h3 class="font-serif text-3xl font-bold text-white">{{ $menus->count() }} Menu</h3>
        </div>
        <div class="bg-[#18181B] p-6 rounded-3xl border border-zinc-800 space-y-1">
            <span class="text-xs text-zinc-400 uppercase tracking-wider">Pesanan Masuk</span>
            <h3 class="font-serif text-3xl font-bold text-amber-400">{{ $orders->count() }} Pesanan</h3>
        </div>
        <div class="bg-[#18181B] p-6 rounded-3xl border border-zinc-800 space-y-1">
            <span class="text-xs text-zinc-400 uppercase tracking-wider">Pendapatan (Selesai)</span>
            <h3 class="font-serif text-3xl font-bold text-emerald-400">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
        </div>
    </div>

    <!-- Tabel Pesanan Pelanggan -->
    <div class="bg-[#18181B] rounded-3xl border border-zinc-800 overflow-hidden shadow-xl">
        <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
            <h2 class="font-serif text-xl font-bold text-white flex items-center gap-2">
                <i data-lucide="clipboard-list" class="w-5 h-5 text-amber-400"></i> Kelola Pesanan Masuk
            </h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-[#0F0F11] text-zinc-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Kode</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Detail Pesanan</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/80">
                    @forelse($orders as $order)
                    <tr class="hover:bg-zinc-800/30 transition">
                        <td class="px-6 py-4 font-bold text-amber-400">{{ $order->kode_pesanan }}</td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-white">{{ $order->nama_pelanggan }}</div>
                            <div class="text-xs text-zinc-400">{{ $order->tipe_pesanan }} • {{ $order->nomor_meja_atau_hp }}</div>
                        </td>
                        <td class="px-6 py-4 text-zinc-300">{{ $order->detail_pesanan }}</td>
                        <td class="px-6 py-4 font-semibold text-amber-400">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="bg-[#0F0F11] border border-zinc-700 rounded-xl px-3 py-1.5 text-xs text-white focus:border-amber-400 focus:outline-none cursor-pointer">
                                    <option value="Menunggu" {{ $order->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Dimasak" {{ $order->status == 'Dimasak' ? 'selected' : '' }}>Dimasak</option>
                                    <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-zinc-500 text-sm">Belum ada pesanan masuk dari pelanggan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah Menu & Katalog Menu -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Tambah Menu -->
        <div class="lg:col-span-4 bg-[#18181B] p-6 rounded-3xl border border-zinc-800 h-fit space-y-4 shadow-xl">
            <h2 class="font-serif text-xl font-bold text-white flex items-center gap-2">
                <i data-lucide="plus-circle" class="w-5 h-5 text-amber-400"></i> Tambah Menu Baru
            </h2>
            <form action="{{ route('admin.menu.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="text-xs text-zinc-400 block mb-1">Nama Menu</label>
                    <input type="text" name="nama_menu" required placeholder="Contoh: Nasi Goreng Spesial" class="w-full px-4 py-2.5 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-xs text-zinc-400 block mb-1">Kategori</label>
                        <select name="kategori" class="w-full px-3 py-2.5 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none">
                            <option value="pembuka">Pembuka</option>
                            <option value="utama">Utama</option>
                            <option value="penutup">Penutup</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs text-zinc-400 block mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" required placeholder="25000" class="w-full px-4 py-2.5 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none">
                    </div>
                </div>
                <div>
                    <label class="text-xs text-zinc-400 block mb-1">Link Gambar (URL)</label>
                    <input type="url" name="gambar" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2.5 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none">
                </div>
                <div>
                    <label class="text-xs text-zinc-400 block mb-1">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-[#0F0F11] border border-zinc-700 text-sm text-white focus:border-amber-400 focus:outline-none"></textarea>
                </div>
                <div class="flex items-center gap-2 pt-1">
                    <input type="checkbox" name="is_best_seller" id="best" class="rounded bg-[#0F0F11] border-zinc-700 text-amber-500 focus:ring-0">
                    <label for="best" class="text-xs text-zinc-300">Tandai sebagai Menu Favorit</label>
                </div>
                <button type="submit" class="w-full py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-[#0F0F11] font-bold text-sm tracking-wide transition shadow-lg shadow-amber-500/20">
                    Simpan Menu Baru
                </button>
            </form>
        </div>

        <!-- Katalog Menu Aktif -->
        <div class="lg:col-span-8 bg-[#18181B] rounded-3xl border border-zinc-800 overflow-hidden shadow-xl h-fit">
            <div class="p-6 border-b border-zinc-800">
                <h2 class="font-serif text-xl font-bold text-white flex items-center gap-2">
                    <i data-lucide="utensils" class="w-5 h-5 text-amber-400"></i> Katalog Menu Aktif
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-[#0F0F11] text-zinc-400 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Menu</th>
                            <th class="px-6 py-4">Kategori</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/80">
                        @foreach($menus as $m)
                        <tr class="hover:bg-zinc-800/30 transition">
                            <td class="px-6 py-4 font-semibold text-white flex items-center gap-3">
                                <img src="{{ $m->gambar }}" class="w-10 h-10 rounded-xl object-cover border border-zinc-700">
                                <div>
                                    <div>{{ $m->nama_menu }}</div>
                                    @if($m->is_best_seller)
                                    <span class="text-[10px] text-amber-400 font-bold uppercase tracking-wider">Favorit</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 uppercase text-xs font-semibold text-amber-400">{{ $m->kategori }}</td>
                            <td class="px-6 py-4 font-semibold">Rp {{ number_format($m->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.menu.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1.5 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 text-xs font-semibold border border-red-500/20 transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection