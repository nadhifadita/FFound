<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\LostItem; // Import model LostItem
use App\Models\FoundItem; // Import model FoundItem

class ReportController extends Controller
{
    /**
     * Handle submission for Lost Items.
     * This method will be used for 'mahasiswa' and 'lost' report types.
     */
    public function storeLostItem(Request $request)
    {
        $validatedData = $request->validate([
            'lost_by' => 'required|string|max:255',    // Nama Orang yang Kehilangan
            'item_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',       // Nomor Telepon Pelapor
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File gambar
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('item_photos/lost', 'public');
        }

        LostItem::create([
            'user_id' => Auth::id(),
            'lost_by' => $validatedData['lost_by'],
            'item_name' => $validatedData['item_name'],
            'phone' => $validatedData['phone'],
            'location' => $validatedData['location'],
            'date' => $validatedData['date'],
            'description' => $validatedData['description'],
            'photo_path' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Laporan barang hilang berhasil dikirim!');
    }

    /**
     * Handle submission for Found Items.
     * This method will be used for 'found' report type.
     */
    public function storeFoundItem(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File gambar
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('item_photos/found', 'public');
        }

        FoundItem::create([
            'user_id' => Auth::id(),
            'item_name' => $validatedData['item_name'],
            'location' => $validatedData['location'],
            'date' => $validatedData['date'],
            'description' => $validatedData['description'],
            'photo_path' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Laporan barang ditemukan berhasil dikirim!');
    }
}