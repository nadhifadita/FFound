<?php

namespace App\Http\Controllers;

use App\Models\Compare;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $compares = Compare::with(['lostItem', 'foundItem'])->latest()->get();
        return view('lists.list_pencocokan', compact('compares'));
    }

    public function create()
    {
        $lostItems = LostItem::all();
        $foundItems = FoundItem::all();
        return view('compare.create', compact('lostItems', 'foundItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lost_item_id' => 'required|exists:lost_items,id',
            'found_item_id' => 'required|exists:found_items,id',
        ]);

        Compare::create([
            'lost_item_id' => $request->lost_item_id,
            'found_item_id' => $request->found_item_id,
            'compared_at' => now(),
            'similarity_score' => null, // atau hitung secara dinamis
        ]);

        return redirect()->route('compare.index')->with('success', 'Pencocokan berhasil disimpan.');
    }
}
