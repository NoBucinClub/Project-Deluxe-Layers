<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Deluxe Layers — Taste the Perfection in Every Layer</title>
    
    <!-- Google Fonts: Playfair Display (Elegan) & Plus Jakarta Sans (Modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        obsidian: '#0F0F11',
                        charcoal: '#18181B',
                        gold: {
                            400: '#E5C158',
                            500: '#D4AF37',
                            600: '#B59226',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0F0F11; }
        ::-webkit-scrollbar-thumb { background: #27272A; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #D4AF37; }
    </style>
</head>
<body class="bg-obsidian text-zinc-100 font-sans antialiased selection:bg-gold-500 selection:text-obsidian">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-40 bg-obsidian/85 backdrop-blur-md border-b border-zinc-800/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-gold-600 to-gold-400 flex items-center justify-center text-obsidian font-serif font-bold text-xl shadow-lg shadow-gold-500/20">
                        DL
                    </div>
                    <div>
                        <span class="font-serif text-xl sm:text-2xl font-bold tracking-wide text-white group-hover:text-gold-400 transition">Deluxe Layers</span>
                        <p class="text-[10px] uppercase tracking-[0.25em] text-gold-500 hidden sm:block">Culinary Heritage</p>
                    </div>
                </a>

                <!-- Desktop Menu Links -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-zinc-300">
                    <a href="#beranda" class="hover:text-gold-400 transition">Beranda</a>
                    <a href="#katalog-menu" class="hover:text-gold-400 transition">Daftar Menu</a>
                    <a href="#keunggulan" class="hover:text-gold-400 transition">Tentang Kami</a>
                    <a href="#lokasi" class="hover:text-gold-400 transition">Outlet</a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <button onclick="toggleCart()" class="relative p-2.5 rounded-full bg-charcoal border border-zinc-700 hover:border-gold-500 text-zinc-200 hover:text-gold-400 transition">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                        <span id="cart-badge" class="absolute -top-1.5 -right-1.5 bg-gold-500 text-obsidian text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">0</span>
                    </button>
                    
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold border border-zinc-700 hover:border-gold-500 text-zinc-300 hover:text-gold-400 transition">
                        <i data-lucide="lock" class="w-3.5 h-3.5"></i> Staff
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-gold-500/10 via-obsidian to-obsidian -z-10"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Copy -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-charcoal border border-gold-500/30 text-gold-400 text-xs font-medium tracking-wider uppercase">
                        <span class="w-2 h-2 rounded-full bg-gold-500 animate-pulse"></span>
                        Cita Rasa Nusantara Berkelas
                    </div>
                    
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-white">
                        Kelezatan Berlapis dalam Setiap <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600 italic">Sajian Sederhana.</span>
                    </h1>
                    
                    <p class="text-zinc-400 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Nikmati hidangan favorit yang akrab di lidah—mulai dari Nasi Goreng Kampung, Nasi Uduk Komplit, hingga kudapan pembuka dan penutup yang diracik dengan standar restoran bintang lima.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="#katalog-menu" class="w-full sm:w-auto px-8 py-4 rounded-full bg-gold-500 hover:bg-gold-400 text-obsidian font-bold text-sm tracking-wide transition shadow-lg shadow-gold-500/20 flex items-center justify-center gap-2">
                            Pesan Sekarang <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <a href="#lokasi" class="w-full sm:w-auto px-8 py-4 rounded-full bg-charcoal hover:bg-zinc-800 border border-zinc-700 text-white font-semibold text-sm transition flex items-center justify-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-gold-400"></i> Lihat Outlet
                        </a>
                    </div>
                </div>

                <!-- Right Image Showcase -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden border border-zinc-800 shadow-2xl aspect-[4/3] sm:aspect-square lg:aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=900&q=80" alt="Signature Dish Deluxe Layers" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-obsidian via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 p-5 rounded-2xl bg-charcoal/90 backdrop-blur-md border border-zinc-700/80">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xs text-gold-400 font-semibold uppercase tracking-wider">Best Seller</span>
                                    <h3 class="font-serif text-lg font-bold text-white">Nasi Goreng Kampung Spesial</h3>
                                </div>
                                <span class="text-gold-400 font-bold text-lg">Rp 28K</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KATALOG MENU SECTION -->
    <section id="katalog-menu" class="py-20 bg-charcoal/40 border-y border-zinc-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header & Search -->
            <div class="text-center max-w-2xl mx-auto mb-12 space-y-4">
                <span class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em]">Kurasi Hidangan</span>
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white">Daftar Menu Deluxe Layers</h2>
                <p class="text-zinc-400 text-sm sm:text-base">Pilih rangkaian hidangan lengkap mulai dari pembuka yang menggugah selera, menu utama yang mengenyangkan, hingga penutup yang manis.</p>
            </div>

            <!-- Filter Tabs & Search Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">
                <!-- Category Buttons -->
                <div class="flex flex-wrap justify-center gap-2 w-full md:w-auto">
                    <button onclick="filterCategory('all')" class="cat-btn active px-5 py-2.5 rounded-full text-sm font-semibold bg-gold-500 text-obsidian transition" data-cat="all">Semua Menu</button>
                    <button onclick="filterCategory('pembuka')" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold bg-charcoal text-zinc-300 hover:text-white border border-zinc-700 transition" data-cat="pembuka">Menu Pembuka</button>
                    <button onclick="filterCategory('utama')" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold bg-charcoal text-zinc-300 hover:text-white border border-zinc-700 transition" data-cat="utama">Menu Utama</button>
                    <button onclick="filterCategory('penutup')" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold bg-charcoal text-zinc-300 hover:text-white border border-zinc-700 transition" data-cat="penutup">Menu Penutup</button>
                </div>

                <!-- Search Input -->
                <div class="relative w-full md:w-72">
                    <i data-lucide="search" class="w-4 h-4 text-zinc-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
                    <input type="text" id="search-menu" onkeyup="searchMenu()" placeholder="Cari nasi goreng, tahu..." class="w-full pl-11 pr-4 py-2.5 rounded-full bg-charcoal border border-zinc-700 text-sm text-white placeholder-zinc-500 focus:outline-none focus:border-gold-500 transition">
                </div>
            </div>

            <!-- Responsive Grid Cards -->
            <div id="menu-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($menus as $menu)
                <div class="menu-card group bg-charcoal rounded-2xl border border-zinc-800 hover:border-gold-500/60 overflow-hidden flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-lg" 
                     data-category="{{ $menu->kategori }}" 
                     data-name="{{ strtolower($menu->nama_menu) }}">
                    
                    <div>
                        <!-- Image Aspect Ratio 16:10 -->
                        <div class="relative aspect-[16/10] overflow-hidden bg-zinc-900">
                            <img src="{{ $menu->gambar }}" alt="{{ $menu->nama_menu }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-obsidian/80 backdrop-blur-md text-gold-400 border border-gold-500/30">
                                    {{ $menu->kategori }}
                                </span>
                                @if($menu->is_best_seller)
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-gold-500 text-obsidian">
                                    Favorit
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5 space-y-2">
                            <h3 class="font-serif text-lg font-bold text-white group-hover:text-gold-400 transition line-clamp-1">{{ $menu->nama_menu }}</h3>
                            <p class="text-zinc-400 text-xs leading-relaxed line-clamp-2">{{ $menu->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Price & Add Button -->
                    <div class="px-5 pb-5 pt-2 flex items-center justify-between border-t border-zinc-800/60 mt-2">
                        <div>
                            <span class="text-[11px] text-zinc-500 block">Harga</span>
                            <span class="text-base font-bold text-gold-400">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                        </div>
                        <button onclick="addToCart({{ $menu->id }}, '{{ addslashes($menu->nama_menu) }}', {{ $menu->harga }})" 
                                class="px-4 py-2 rounded-xl bg-zinc-800 hover:bg-gold-500 text-white hover:text-obsidian font-semibold text-xs flex items-center gap-1.5 transition">
                            <i data-lucide="plus" class="w-4 h-4"></i> Tambah
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN / BRAND STORY -->
    <section id="keunggulan" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-3xl bg-charcoal border border-zinc-800/80 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400">
                        <i data-lucide="flame" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-white">Dimasak Saat Dipesan</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Setiap porsi nasi goreng dan lauk pauk dimasak langsung di wajan panas (*freshly cooked*) untuk menjaga aroma *smoky* yang autentik.</p>
                </div>
                <div class="p-8 rounded-3xl bg-charcoal border border-zinc-800/80 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400">
                        <i data-lucide="layers" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-white">Rasa Berlapis & Kaya Rempah</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Sesuai nama Deluxe Layers, kami memadukan bumbu dasar tradisional dengan sentuhan modern sehingga menciptakan harmoni rasa di setiap suapan.</p>
                </div>
                <div class="p-8 rounded-3xl bg-charcoal border border-zinc-800/80 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-gold-500/10 border border-gold-500/30 flex items-center justify-center text-gold-400">
                        <i data-lucide="sparkles" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-white">Harga Bersahabat, Kualitas Mewah</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Menghadirkan kenyamanan suasana restoran premium dengan harga yang tetap ramah untuk makan siang maupun makan malam bersama keluarga.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LOKASI & FOOTER -->
    <footer id="lokasi" class="bg-charcoal border-t border-zinc-800 pt-16 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-12 border-b border-zinc-800">
                <div class="space-y-4">
                    <span class="font-serif text-2xl font-bold text-white">Deluxe Layers</span>
                    <p class="text-zinc-400 text-sm leading-relaxed">Restoran kasual modern yang menyajikan hidangan Nusantara favorit dengan standar penyajian terbaik.</p>
                </div>
                <div class="space-y-3">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-gold-400">Jam Operasional</h4>
                    <p class="text-zinc-400 text-sm">Senin – Jumat: 10.00 – 22.00 WIB</p>
                    <p class="text-zinc-400 text-sm">Sabtu – Minggu: 09.00 – 23.00 WIB</p>
                </div>
                <div class="space-y-3">
                    <h4 class="text-sm font-bold uppercase tracking-wider text-gold-400">Outlet Utama</h4>
                    <p class="text-zinc-400 text-sm">Jl. Jenderal Sudirman No. 88, Kota Jambi</p>
                    <p class="text-zinc-400 text-sm">Reservasi: +62 812-3456-7890</p>
                </div>
            </div>
            <div class="pt-8 text-center text-xs text-zinc-500">
                &copy; {{ date('Y') }} Deluxe Layers Culinary. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- SLIDE-OVER CART DRAWER -->
    <div id="cart-modal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/75 backdrop-blur-sm" onclick="toggleCart()"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-md bg-charcoal border-l border-zinc-800 shadow-2xl flex flex-col justify-between p-6 overflow-y-auto">
            
            <div>
                <div class="flex items-center justify-between pb-5 border-b border-zinc-800">
                    <h3 class="font-serif text-xl font-bold text-white flex items-center gap-2">
                        <i data-lucide="shopping-bag" class="w-5 h-5 text-gold-400"></i> Pesanan Anda
                    </h3>
                    <button onclick="toggleCart()" class="p-2 rounded-full hover:bg-zinc-800 text-zinc-400 hover:text-white">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Cart Items Container -->
                <div id="cart-items" class="py-6 space-y-4">
                    <p class="text-zinc-500 text-sm text-center py-8">Keranjang pesanan masih kosong.</p>
                </div>
            </div>

            <!-- Checkout Form -->
            <div id="checkout-section" class="border-t border-zinc-800 pt-5 space-y-4 hidden">
                <div class="flex justify-between items-center text-base font-bold">
                    <span class="text-zinc-300">Total Pembayaran</span>
                    <span id="cart-total" class="text-gold-400 text-xl">Rp 0</span>
                </div>

                <div class="space-y-3">
                    <input type="text" id="cust-name" placeholder="Nama Pemesan" class="w-full px-4 py-2.5 rounded-xl bg-obsidian border border-zinc-700 text-sm text-white focus:border-gold-500 focus:outline-none">
                    
                    <div class="grid grid-cols-2 gap-2">
                        <select id="order-type" class="px-3 py-2.5 rounded-xl bg-obsidian border border-zinc-700 text-sm text-white focus:border-gold-500 focus:outline-none">
                            <option value="Dine-In">Makan di Tempat</option>
                            <option value="Takeaway">Bawa Pulang</option>
                        </select>
                        <input type="text" id="cust-table" placeholder="No. Meja / No. WA" class="px-4 py-2.5 rounded-xl bg-obsidian border border-zinc-700 text-sm text-white focus:border-gold-500 focus:outline-none">
                    </div>
                </div>

                <button onclick="submitOrder()" id="btn-submit-order" class="w-full py-3.5 rounded-xl bg-gold-500 hover:bg-gold-400 text-obsidian font-bold text-sm tracking-wide transition shadow-lg shadow-gold-500/20">
                    Konfirmasi Pesanan
                </button>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT INTERAKTIF -->
    <script>
        lucide.createIcons();

        let cart = [];

        function filterCategory(category) {
            // Update active button style
            document.querySelectorAll('.cat-btn').forEach(btn => {
                btn.classList.remove('bg-gold-500', 'text-obsidian');
                btn.classList.add('bg-charcoal', 'text-zinc-300');
                if (btn.dataset.cat === category) {
                    btn.classList.remove('bg-charcoal', 'text-zinc-300');
                    btn.classList.add('bg-gold-500', 'text-obsidian');
                }
            });

            // Filter cards
            document.querySelectorAll('.menu-card').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function searchMenu() {
            const keyword = document.getElementById('search-menu').value.toLowerCase();
            document.querySelectorAll('.menu-card').forEach(card => {
                const name = card.dataset.name;
                card.style.display = name.includes(keyword) ? 'flex' : 'none';
            });
        }

        function toggleCart() {
            document.getElementById('cart-modal').classList.toggle('hidden');
        }

        function addToCart(id, name, price) {
            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({ id, name, price, qty: 1 });
            }
            updateCartUI();
        }

        function changeQty(id, delta) {
            const index = cart.findIndex(item => item.id === id);
            if (index > -1) {
                cart[index].qty += delta;
                if (cart[index].qty <= 0) {
                    cart.splice(index, 1);
                }
            }
            updateCartUI();
        }

        function updateCartUI() {
            const badge = document.getElementById('cart-badge');
            const container = document.getElementById('cart-items');
            const checkoutSec = document.getElementById('checkout-section');
            const totalEl = document.getElementById('cart-total');

            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

            badge.innerText = totalQty;

            if (cart.length === 0) {
                container.innerHTML = '<p class="text-zinc-500 text-sm text-center py-8">Keranjang pesanan masih kosong.</p>';
                checkoutSec.classList.add('hidden');
                return;
            }

            checkoutSec.classList.remove('hidden');
            totalEl.innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');

            container.innerHTML = cart.map(item => `
                <div class="flex items-center justify-between bg-obsidian p-3.5 rounded-xl border border-zinc-800">
                    <div>
                        <h4 class="text-sm font-bold text-white">${item.name}</h4>
                        <span class="text-xs text-gold-400">Rp ${(item.price * item.qty).toLocaleString('id-ID')}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="changeQty(${item.id}, -1)" class="w-7 h-7 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white font-bold">-</button>
                        <span class="text-sm font-semibold w-5 text-center">${item.qty}</span>
                        <button onclick="changeQty(${item.id}, 1)" class="w-7 h-7 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-white font-bold">+</button>
                    </div>
                </div>
            `).join('');
        }

        async function submitOrder() {
            const name = document.getElementById('cust-name').value.trim();
            const type = document.getElementById('order-type').value;
            const table = document.getElementById('cust-table').value.trim();

            if (!name || !table) {
                alert('Mohon isi Nama Pemesan dan Nomor Meja / WhatsApp!');
                return;
            }

            const totalHarga = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const detailText = cart.map(item => `${item.name} (${item.qty}x)`).join(', ');

            const btn = document.getElementById('btn-submit-order');
            btn.disabled = true;
            btn.innerText = 'Memproses...';

            try {
                const response = await fetch('{{ route("order.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        nama_pelanggan: name,
                        tipe_pesanan: type,
                        nomor_meja_atau_hp: table,
                        detail_pesanan: detailText,
                        total_harga: totalHarga
                    })
                });

                const result = await response.json();
                if (result.success) {
                    alert(`Terima kasih ${name}! Pesanan Anda berhasil dibuat dengan Kode: ${result.kode_pesanan}`);
                    cart = [];
                    updateCartUI();
                    toggleCart();
                }
            } catch (error) {
                alert('Terjadi kesalahan saat mengirim pesanan.');
            } finally {
                btn.disabled = false;
                btn.innerText = 'Konfirmasi Pesanan';
            }
        }
    </script>
</body>
</html>