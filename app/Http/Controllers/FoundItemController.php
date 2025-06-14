<?php

namespace App\Http\Controllers;

use App\Models\FoundItem; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth; 

class FoundItemController extends Controller
{
    /**
     * Menampilkan daftar barang ditemukan.
     * (Untuk list_found.blade.php)
     */
    public function index()
    {
        $foundItems = FoundItem::orderBy('created_at', 'desc')->get();

        return view('lists.list_found', compact('foundItems'));
    }

    /**
     * Menampilkan detail item.
     * Ini akan memilih view detail yang benar berdasarkan role pengguna.
     */
    public function show(FoundItem $foundItem)
    {
        $foundItem->load('user');

        return view('Details.found_item_details', compact('foundItem'));
    }
}