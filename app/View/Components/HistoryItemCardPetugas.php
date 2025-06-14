<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\HistoryItem; 
use Closure;
use Illuminate\Contracts\View\View;

class HistoryItemCardPetugas extends Component
{
    public HistoryItem $item;
    public bool $showResolved; 

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\HistoryItem  $item The HistoryItem model instance
     * @param  bool  $showResolved Optional: True jika item sejarah ini mengindikasikan status sudah diselesaikan
     * @return void
     */
    public function __construct(HistoryItem $item, bool $showResolved = false)
    {
        $this->item = $item;
        $this->showResolved = $showResolved;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.history-item-card-petugas');
    }
}