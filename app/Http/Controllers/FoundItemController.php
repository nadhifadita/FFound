<?php

namespace App\Http\Controllers;

use App\Models\FoundItem; // Pastikan model FoundItem diimport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth; // Diperlukan untuk logika role di metode show, tapi disarankan diimport di sini

class FoundItemController extends Controller
{
    /**
     * Menampilkan daftar barang ditemukan untuk user umum (mahasiswa).
     * (Untuk list_found.blade.php)
     */
    public function index()
    {
        // Ambil semua barang ditemukan, diurutkan berdasarkan tanggal terbaru
        // Anda bisa menambahkan pagination di sini jika daftar sangat panjang, misal: ->paginate(10)
        $foundItems = FoundItem::orderBy('created_at', 'desc')->get();

        return view('lists.list_found', compact('foundItems'));
    }

    /**
     * Menampilkan daftar barang ditemukan khusus untuk petugas/admin.
     * (Untuk list_found_petugas.blade.php)
     */
    public function indexPetugas()
    {
        // Ambil semua barang ditemukan. Anda bisa menambahkan filter, sorting, atau pagination di sini.
        $foundItems = FoundItem::orderBy('created_at', 'desc')->get(); // Atau ->paginate(10)

        // Teruskan data yang diambil ke view 'lists.list_found_petugas'
        return view('lists.list_found_petugas', compact('foundItems'));
    }

    /**
     * Menampilkan detail item.
     * Ini akan memilih view detail yang benar berdasarkan role pengguna.
     */
    public function show(FoundItem $foundItem)
    {
        // Penting: Eager load relasi 'user' untuk mendapatkan detail pelapor
        $foundItem->load('user');

        // Logic untuk memilih view berdasarkan role pengguna yang sedang login (viewer)
        if (Auth::check() && Auth::user()->role === 'petugas') {
            return view('Details.found_item_details', compact('foundItem'));
        } else {
            return view('Details.found_item_details', compact('foundItem'));
        }
    }
}