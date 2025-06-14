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
                $query->withTrashed();
            },
            'foundItem' => function($query){
                $query->withTrashed(); 
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
     *
     * @param  \App\Models\HistoryItem  $historyItem  Instance model HistoryItem.
     * @return \Illuminate\View\View
     */
    public function show(HistoryItem $historyItem) 
    {
        
        $historyItem->load([
            'lostItem' => function($query) {
                $query->withTrashed();
            },
            'foundItem' => function($query) {
                $query->withTrashed()->with('user');
            },
            
        ]);

        return view('Details.history_item_details', compact('historyItem'));
    }
}