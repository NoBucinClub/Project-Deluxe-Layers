<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin untuk kelola menu & pesanan
        User::create([
            'name' => 'Admin Deluxe',
            'email' => 'admin@deluxelayers.com',
            'password' => Hash::make('password123'),
        ]);

        // Data Awal Menu Deluxe Layers
        $menus = [
            // MENU PEMBUKA
            [
                'nama_menu' => 'Tahu Walik Krispi',
                'kategori' => 'pembuka',
                'harga' => 15000,
                'deskripsi' => 'Tahu pong renyah dengan isian adonan ayam cincang berbumbu rempah khas, disajikan dengan sambal kecap pedas manis.',
                'gambar' => 'https://images.unsplash.com/photo-1626804475297-41608ea09aeb?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],
            [
                'nama_menu' => 'Lumpia Ayam Rebung',
                'kategori' => 'pembuka',
                'harga' => 18000,
                'deskripsi' => 'Kulit lumpia tipis digoreng keemasan berisi tumisan ayam, rebung manis, dan telur dengan saus tauco spesial.',
                'gambar' => 'https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?auto=format&fit=crop&w=800&q=80', // Link gambar diganti yang pas
                'is_best_seller' => false,
            ],
            [
                'nama_menu' => 'Pangsit Goreng Keju',
                'kategori' => 'pembuka',
                'harga' => 16000,
                'deskripsi' => 'Pangsit renyah isi daging ayam fillet dan lelehan keju gurih di bagian dalam.',
                'gambar' => 'https://images.unsplash.com/photo-1541696432-82c6da8ce7bf?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],

            // MENU UTAMA
            [
                'nama_menu' => 'Nasi Goreng Kampung Spesial',
                'kategori' => 'utama',
                'harga' => 28000,
                'deskripsi' => 'Nasi goreng racikan bumbu ulek tradisional dengan suwiran ayam kampung, telur mata sapi, acar, dan kerupuk udang.',
                'gambar' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],
            [
                'nama_menu' => 'Nasi Uduk Komplit Ayam Bakar',
                'kategori' => 'utama',
                'harga' => 32000,
                'deskripsi' => 'Nasi uduk santan gurih harum daun pandan, disajikan bersama ayam bakar madu, tempe orek, bihun goreng, dan sambal terasi.',
                'gambar' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],
            [
                'nama_menu' => 'Nasi Ayam Geprek Sambal Matah',
                'kategori' => 'utama',
                'harga' => 26000,
                'deskripsi' => 'Nasi putih hangat dengan dada ayam krispi geprek yang disiram segarnya sambal matah kecombrang khas Bali.',
                'gambar' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => false,
            ],
            [
                'nama_menu' => 'Mie Goreng Jawa Tek-Tek',
                'kategori' => 'utama',
                'harga' => 25000,
                'deskripsi' => 'Mie kuning kenyal dimasak dengan bumbu kemiri gurih manis, potongan bakso sapi, sawi hijau, dan taburan bawang goreng.',
                'gambar' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => false,
            ],

            // MENU PENUTUP
            [
                'nama_menu' => 'Pisang Goreng Gula Aren Keju',
                'kategori' => 'penutup',
                'harga' => 18000,
                'deskripsi' => 'Pisang kepok matang digoreng renyah, disiram lelehan gula aren asli dan parutan keju cheddar melimpah.',
                'gambar' => 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],
            [
                'nama_menu' => 'Es Cendol Dawet Gula Malaka',
                'kategori' => 'penutup',
                'harga' => 15000,
                'deskripsi' => 'Minuman penutup segar dengan bulir cendol pandan lembut, santan gurih, nangka harum, dan sirup gula malaka.',
                'gambar' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => true,
            ],
            [
                'nama_menu' => 'Puding Cokelat Vla Vanilla',
                'kategori' => 'penutup',
                'harga' => 17000,
                'deskripsi' => 'Puding dark chocolate lembut berlapis yang disajikan dingin bersama siraman saus vla vanilla creamy.',
                'gambar' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=800&q=80',
                'is_best_seller' => false,
            ],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert(array_merge($menu, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}