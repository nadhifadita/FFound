<?php

namespace App\Http\Controllers;

use App\Models\LostItem; // Pastikan Anda mengimpor model LostItem
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostItemController extends Controller
{
    /**
     * Menampilkan daftar barang hilang untuk user umum (mahasiswa).
     */
    public function index()
    {
        // Ambil semua barang hilang, diurutkan berdasarkan tanggal terbaru
        // Anda bisa menambahkan pagination jika daftar sangat panjang, misal: ->paginate(10)
        $lostItems = LostItem::orderBy('created_at', 'desc')->get();

        // Meneruskan data ke view list_lost
        return view('lists.list_lost', compact('lostItems'));
    }

    /**
     * Menampilkan daftar barang hilang untuk petugas/admin.
     * Mungkin ada perbedaan detail atau filter yang diterapkan di sini.
     */
    public function indexPetugas()
    {
        // Ambil semua barang hilang untuk petugas, mungkin dengan eager loading relasi jika diperlukan
        $lostItems = LostItem::orderBy('created_at', 'desc')->get();

        // Meneruskan data ke view list_lost_petugas
        return view('lists.list_lost_petugas', compact('lostItems'));
    }

    /**
     * Menampilkan detail dari satu barang hilang.
     * Route Model Binding akan otomatis mengambil LostItem berdasarkan ID dari URL.
     */
    // app/Http/Controllers/LostItemController.php

// ...

    public function show(LostItem $lostItem)
    {
        $lostItem->load('user');

        // Logic untuk memilih view berdasarkan role pengguna yang sedang login (viewer)
        if (Auth::check() && Auth::user()->role === 'petugas') {
            return view('Details.lost_item_details_petugas', compact('lostItem'));
        } else {
            return view('Details.lost_item_details', compact('lostItem'));
        }
    }
}