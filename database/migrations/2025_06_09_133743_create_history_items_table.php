<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('history_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lost_item_id')->constrained('lost_items')->onDelete('cascade');
        $table->foreignId('found_item_id')->constrained('found_items')->onDelete('cascade');
        $table->foreignId('user_id')->nullable()->constrained('users'); // Petugas yang mencocokkan
        $table->timestamp('matched_at')->nullable(); // tanggal pencocokan
        $table->text('notes')->nullable(); // keterangan tambahan (opsional)
        $table->timestamps();
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
