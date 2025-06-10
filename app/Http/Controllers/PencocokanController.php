<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\LostItem;
use App\Models\HistoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PencocokanController extends Controller
{
    /**
     * Menampilkan daftar semua item hilang (yang belum cocok) untuk FoundItem yang diberikan.
     */
    public function compare(FoundItem $foundItem)
    {
        $foundItem->load('user');

        // --- PERBAIKAN DI SINI: Gunakan filter() untuk menghapus NULL dari hasil pluck ---
        // 1. Ambil ID dari semua LostItem yang sudah ada di tabel history_items.
        //    '.filter()' akan menghapus nilai NULL dari koleksi sebelum diubah menjadi array.
        $matchedLostItemIds = HistoryItem::pluck('lost_item_id')->filter()->toArray();

        // 2. Ambil semua LostItem (yang sesuai kriteria), tetapi KECUALIKAN yang sudah cocok.
        //    Sekarang $matchedLostItemIds hanya berisi ID integer yang valid, membuat whereNotIn efektif.
        $matchingLostItems = LostItem::whereNotIn('id', $matchedLostItemIds)
                                    ->orderBy('date', 'desc')
                                    ->get();

        // --- DIAGNOSA (setelah perbaikan, jika masih ada masalah) ---
        // dd([
        //     'FoundItem (Initiating Comparison)' => $foundItem->toArray(),
        //     'Cleaned Matched Lost Item IDs (used for exclusion)' => $matchedLostItemIds, // Periksa apakah ini sekarang array ID integer tanpa NULL
        //     'Final Matching Lost Items' => $matchingLostItems->toArray(),
        // ]);
        // --- AKHIR DIAGNOSA ---

        return view('lists.list_pencocokan', compact('foundItem', 'matchingLostItems'));
    }

    /**
     * Menandai item hilang dan ditemukan sebagai cocok dan membuat entri di HistoryItem.
     * Setelah itu, record aslinya akan dihapus dari tabel LostItem dan FoundItem.
     */
     public function markMatched(Request $request)
    {
        $request->validate([
            'found_item_id' => 'required|exists:found_items,id',
            'lost_item_id' => 'required|exists:lost_items,id',
        ]);

        $lostItemToDelete = LostItem::find($request->lost_item_id);
        $foundItemToDelete = FoundItem::find($request->found_item_id);

        $existingHistory = HistoryItem::where('found_item_id', $request->found_item_id)
                                    ->where('lost_item_id', $request->lost_item_id)
                                    ->first();
        if ($existingHistory) {
            return redirect()->back()->with('error', 'Item ini sudah ditandai cocok sebelumnya.');
        }

        if ($lostItemToDelete && $foundItemToDelete) {
            try {
                $historyItem = HistoryItem::create([
                    'found_item_id' => $foundItemToDelete->id,
                    'lost_item_id' => $lostItemToDelete->id,
                    'resolved_date' => now()->toDateString(),
                    'notes' => 'Dicocokkan secara manual oleh petugas.'
                ]);

                // BARIS INI AKAN MENGHAPUS FISIK (JIKA SOFT DELETES TIDAK AKTIF)
                $lostItemToDelete->delete();
                $foundItemToDelete->delete();

                $message = 'Barang berhasil ditandai cocok dan dipindahkan ke riwayat.';
                return redirect()->route('list_history_petugas')->with('success', $message);

            } catch (\Exception $e) {
                // Jika ini terpanggil, berarti ada error saat create HistoryItem atau delete
                dd("Error di proses creation/deletion: " . $e->getMessage(), $e->getTrace());
            }

        } else {
            $message = 'Terjadi kesalahan: Barang hilang atau ditemukan tidak ditemukan untuk dihapus.';
            return redirect()->back()->with('error', $message);
        }
    }
}