<?php

namespace App\Http\Controllers;

use App\Models\Administrasi; // Tabel orders
use App\Models\Dokter;       // Tabel menus
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    // Halaman Utama Pelanggan (Deluxe Layers)
    public function landing()
    {
        $menus = Dokter::orderBy('is_best_seller', 'desc')->get();
        return view('welcome', compact('menus'));
    }

    // Proses Checkout Pesanan dari Pelanggan
    public function storeOrder(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja_atau_hp' => 'required|string|max:50',
            'tipe_pesanan' => 'required|in:Dine-In,Takeaway',
            'detail_pesanan' => 'required|string',
            'total_harga' => 'required|integer|min:1000',
        ]);

        $kode = 'DLX-' . strtoupper(Str::random(5));

        $order = Administrasi::create([
            'kode_pesanan' => $kode,
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_meja_atau_hp' => $request->nomor_meja_atau_hp,
            'tipe_pesanan' => $request->tipe_pesanan,
            'detail_pesanan' => $request->detail_pesanan,
            'total_harga' => $request->total_harga,
            'status' => 'Menunggu',
        ]);

        return response()->json([
            'success' => true,
            'kode_pesanan' => $order->kode_pesanan,
            'message' => 'Pesanan berhasil dibuat!'
        ]);
    }

    // Dashboard Admin (Wajib Login)
    public function index()
    {
        $menus = Dokter::latest()->get();
        $orders = Administrasi::latest()->get();
        $totalPendapatan = Administrasi::where('status', 'Selesai')->sum('total_harga');
        
        return view('home', compact('menus', 'orders', 'totalPendapatan'));
    }

    // Tambah Menu Baru dari Admin
    public function storeMenu(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|in:pembuka,utama,penutup',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|url',
        ]);

        Dokter::create([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar ?: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=800&q=80',
            'is_best_seller' => $request->has('is_best_seller'),
        ]);

        return back()->with('success', 'Menu baru berhasil ditambahkan ke Deluxe Layers!');
    }

    // Hapus Menu
    public function destroyMenu($id)
    {
        Dokter::findOrFail($id)->delete();
        return back()->with('success', 'Menu berhasil dihapus.');
    }

    // Update Status Pesanan
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Administrasi::findOrFail($id);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan ' . $order->kode_pesanan . ' diperbarui!');
    }
}