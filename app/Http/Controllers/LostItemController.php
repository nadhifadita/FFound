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

    public function show(LostItem $lostItem)
    {
        $lostItem->load('user');
        return view('Details.lost_item_details', compact('lostItem'));
    }
}