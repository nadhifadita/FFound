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

        // 1. Ambil ID dari semua LostItem yang sudah ada di tabel history_items
        $matchedLostItemIds = HistoryItem::pluck('lost_item_id')->toArray();

        // 2. Ambil semua LostItem (atau yang sesuai kriteria), tetapi KECUALIKAN yang sudah cocok
        $matchingLostItems = LostItem::whereNotIn('id', $matchedLostItemIds)
                                    ->orderBy('date', 'desc')
                                    ->get();

        return view('lists.list_pencocokan', compact('foundItem', 'matchingLostItems'));
    }

    /**
     * Menandai item hilang dan ditemukan sebagai cocok dan membuat entri di HistoryItem.
     * Setelah itu, record aslinya akan dihapus dari tabel LostItem dan FoundItem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function markMatched(Request $request)
    {
        $request->validate([
            'found_item_id' => 'required|exists:found_items,id',
            'lost_item_id' => 'required|exists:lost_items,id',
        ]);

        $lostItemToDelete = LostItem::find($request->lost_item_id);
        $foundItemToDelete = FoundItem::find($request->found_item_id);

        // Periksa kondisi duplikasi terlebih dahulu
        $existingHistory = HistoryItem::where('found_item_id', $request->found_item_id)
                                    ->where('lost_item_id', $request->lost_item_id)
                                    ->first();
        if ($existingHistory) {
            return redirect()->back()->with('error', 'Item ini sudah ditandai cocok sebelumnya.');
        }

        // Pastikan kedua item ditemukan sebelum mencoba membuat HistoryItem dan menghapus
        if ($lostItemToDelete && $foundItemToDelete) {
            try {
                $historyItem = HistoryItem::create([
                    'found_item_id' => $foundItemToDelete->id,
                    'lost_item_id' => $lostItemToDelete->id,
                    'resolved_date' => now()->toDateString(),
                    'notes' => 'Dicocokkan secara manual oleh petugas.'
                ]);

                $lostItemToDelete->delete();
                $foundItemToDelete->delete();

                $message = 'Barang berhasil ditandai cocok dan dihapus dari daftar aktif.';
                return redirect()->route('list_history_petugas')->with('success', $message);

            } catch (\Exception $e) {
                // Ini akan menangkap dan menampilkan error jika ada masalah database atau MassAssignmentException
                dd("Error di proses creation/deletion: " . $e->getMessage(), $e->getTrace());
            }

        } else {
            // Ini terjadi jika find() mengembalikan null, padahal validasi exists seharusnya mencegahnya
            $message = 'Terjadi kesalahan: Barang hilang atau ditemukan tidak ditemukan untuk dihapus.';
            return redirect()->back()->with('error', $message);
        }
    }
}