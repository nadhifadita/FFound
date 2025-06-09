<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('found_items', function (Blueprint $table) {
            $table->id();
            // foreignId ke tabel users, menandakan siapa yang menemukan/melaporkan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('item_name');        // Nama barang yang ditemukan
            // Kolom 'phone' tidak ada di sini sesuai revisi Anda
            $table->string('location');         // Lokasi ditemukan
            $table->date('date');               // Tanggal ditemukan
            $table->text('description')->nullable(); // Deskripsi, bisa kosong
            $table->string('photo_path')->nullable(); // Path gambar, bisa kosong
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};