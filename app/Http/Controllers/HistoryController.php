<?php

namespace App\Http\Controllers;

use App\Models\HistoryItem;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $historyItems = HistoryItem::with(['lostItem', 'foundItem', 'user'])
            ->orderBy('matched_at', 'desc')
            ->get();

        return view('lists.list_history_petugas', compact('historyItems'));
    }

}
