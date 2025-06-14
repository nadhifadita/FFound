<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lost_items', function (Blueprint $table) {
            $table->softDeletes(); // Ini akan menambahkan kolom 'deleted_at'
        });
        Schema::table('found_items', function (Blueprint $table) {
            $table->softDeletes(); // Ini akan menambahkan kolom 'deleted_at'
        });
    }

    public function down(): void
    {
        Schema::table('lost_items', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Ini akan menghapus kolom 'deleted_at'
        });
        Schema::table('found_items', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Ini akan menghapus kolom 'deleted_at'
        });
    }
};