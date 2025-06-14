<?php

namespace App\Http\Controllers;

use App\Models\HistoryItem; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryItemController extends Controller
{
    /**
     * Menampilkan daftar riwayat pencocokan untuk user umum (mahasiswa).
     */
    public function index(Request $request)
    {
        $query = HistoryItem::with([
            'lostItem' => function($query){
                $query->withTrashed(); // Sertakan item hilang yang di-soft-delete
            },
            'foundItem' => function($query){
                $query->withTrashed(); // Sertakan item ditemukan yang di-soft-delete
            }
        ]);
        $sortOrder = $request->query('sort_order', 'desc');
        if (!in_array($sortOrder, ['asc', 'desc'])) { $sortOrder = 'desc'; }
        $query->orderBy('resolved_date', $sortOrder);
        $historyItems = $query->get();

        return view('lists.list_history', compact('historyItems'));
    }

    /**
     * Menampilkan daftar riwayat pencocokan untuk petugas.
     */
    /*
    public function indexPetugas(Request $request)
    {
        $query = HistoryItem::with([
            'lostItem' => function($query) {
                $query->withTrashed(); // Sertakan item yang di-soft-delete
            },
            'foundItem' => function($query) {
                $query->withTrashed(); // Sertakan item yang di-soft-delete
            }
        ]);
        $sortOrder = $request->query('sort_order', 'desc');
        if (!in_array($sortOrder, ['asc', 'desc'])) { $sortOrder = 'desc'; }
        $query->orderBy('resolved_date', $sortOrder);
        $historyItems = $query->get();
        return view('lists.list_history_petugas', compact('historyItems'));
    }
    */

    /**
     * Menampilkan detail item riwayat pencocokan.
     * Metode ini akan memilih view detail yang benar berdasarkan role pengguna.
     *
     * @param  \App\Models\HistoryItem  $historyItem  Instance model HistoryItem.
     * @return \Illuminate\View\View
     */
    public function show(HistoryItem $historyItem) // <--- PASTIKAN METODE INI ADA
    {
        // PENTING: Eager load relasi 'lostItem', 'foundItem', dan 'user' di dalamnya.
        // Ini memastikan data LostItem, FoundItem, dan informasi pelapornya tersedia di view.
        $historyItem->load([
            'lostItem' => function($query) {
                $query->withTrashed();
            },
            'foundItem' => function($query) {
                $query->withTrashed()->with('user');
            },
            //'lostItem.user', // User pelapor lost item (tidak perlu withTrashed kecuali user juga soft-delete)
            //'foundItem.user', // User pelapor found item
        ]);

        return view('Details.history_item_details', compact('historyItem'));
    }
}