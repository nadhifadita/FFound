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
        Schema::create('history_items', function (Blueprint $table) {
            $table->id();
            // --- PERUBAHAN DI SINI: tambahkan nullable() dan ubah onDelete() ---
            $table->foreignId('lost_item_id')
                  ->nullable() // Izinkan kolom ini menjadi NULL
                  ->constrained('lost_items')
                  ->onDelete('set null'); // Ketika lost_item dihapus, set lost_item_id menjadi NULL

            $table->foreignId('found_item_id')
                  ->nullable() // Izinkan kolom ini menjadi NULL
                  ->constrained('found_items')
                  ->onDelete('set null'); // Ketika found_item dihapus, set found_item_id menjadi NULL
            // --- AKHIR PERUBAHAN ---

            $table->date('resolved_date'); // Tanggal ketika item ini ditandai cocok
            $table->text('notes')->nullable(); // Catatan tambahan tentang pencocokan (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_items');
    }
};