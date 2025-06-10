<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('history_items', function (Blueprint $table) {
            $table->id();
            // --- KEMBALIKAN KE DEFINISI FOREIGN ID STANDAR (TIDAK NULLABLE) ---
            $table->foreignId('lost_item_id')->constrained('lost_items'); // Ini akan default ke onDelete('restrict')
            $table->foreignId('found_item_id')->constrained('found_items'); // Ini akan default ke onDelete('restrict')
            // --- AKHIR PERUBAHAN ---
            $table->date('resolved_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_items');
    }
};