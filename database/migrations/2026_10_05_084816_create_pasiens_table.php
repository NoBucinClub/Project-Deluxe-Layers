<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->string('nama_pelanggan');
            $table->string('nomor_meja_atau_hp');
            $table->enum('tipe_pesanan', ['Dine-In', 'Takeaway']);
            $table->text('detail_pesanan'); // Menyimpan JSON list item
            $table->integer('total_harga');
            $table->enum('status', ['Menunggu', 'Dimasak', 'Selesai'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};