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
        // PENTING: Gunakan withTrashed() pada relasi 'lostItem' dan 'foundItem'
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
    public function indexPetugas(Request $request)
    {
        // PENTING: Gunakan withTrashed() pada relasi 'lostItem' dan 'foundItem'
        $query = HistoryItem::with([
            'lostItem' => function($query) {
                $query->withTrashed(); // Sertakan item hilang yang di-soft-delete
            },
            'foundItem' => function($query) {
                $query->withTrashed(); // Sertakan item ditemukan yang di-soft-delete
            }
        ]);

        $sortOrder = $request->query('sort_order', 'desc');
        if (!in_array($sortOrder, ['asc', 'desc'])) { $sortOrder = 'desc'; }
        $query->orderBy('resolved_date', $sortOrder);

        $historyItems = $query->get();
        return view('lists.list_history_petugas', compact('historyItems'));
    }

    /**
     * Menampilkan detail item riwayat pencocokan.
     * Ini juga perlu memuat item yang di-soft-delete.
     */
    public function show(HistoryItem $historyItem)
    {
        // PENTING: Gunakan withTrashed() pada relasi 'lostItem' dan 'foundItem' di sini
        // Juga, load relasi 'user' di dalam relasi item jika Anda menampilkannya di detail
        $historyItem->load([
            'lostItem' => function($query) {
                $query->withTrashed()->with('user'); // Sertakan soft-deleted dan eager load user-nya
            },
            'foundItem' => function($query) {
                $query->withTrashed()->with('user'); // Sertakan soft-deleted dan eager load user-nya
            }
            // Jika User model juga menggunakan SoftDeletes, Anda mungkin perlu menambah withTrashed() di sini juga:
            // 'lostItem.user' => function($query) { $query->withTrashed(); },
            // 'foundItem.user' => function($query) { $query->withTrashed(); }
        ]);

        if (Auth::check() && Auth::user()->role === 'petugas') {
            return view('Details.history_item_details_petugas', compact('historyItem'));
        } else {
            return view('Details.history_item_details', compact('historyItem'));
        }
    }
}