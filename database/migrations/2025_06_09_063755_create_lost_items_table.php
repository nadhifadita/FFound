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
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            // foreignId ke tabel users, menandakan siapa yang melaporkan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('lost_by');          // Nama orang yang kehilangan
            $table->string('item_name');        // Nama barang yang hilang
            $table->string('phone');            // Nomor telepon pelapor
            $table->string('location');         // Lokasi terakhir terlihat
            $table->date('date');               // Tanggal kehilangan
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
        Schema::dropIfExists('lost_items');
    }
};