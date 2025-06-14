<?php

namespace App\Http\Controllers;

use App\Models\LostItem; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostItemController extends Controller
{
    /**
     * Menampilkan daftar barang hilang untuk user umum (mahasiswa).
     */
    public function index()
    {
        $lostItems = LostItem::orderBy('created_at', 'desc')->get();

        return view('lists.list_lost', compact('lostItems'));
    }


    public function indexPetugas()
    {
        $lostItems = LostItem::orderBy('created_at', 'desc')->get();

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

        if (Auth::check() && Auth::user()->role === 'petugas') {
            return view('Details.lost_item_details_petugas', compact('lostItem'));
        } else {
            return view('Details.lost_item_details', compact('lostItem'));
        }
    }
}