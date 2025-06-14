<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\HistoryItem; 
use Closure;
use Illuminate\Contracts\View\View;

class HistoryItemCard extends Component
{
    public HistoryItem $item;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\HistoryItem  $item The HistoryItem model instance
     * @return void
     */
    public function __construct(HistoryItem $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.history-item-card');
    }
}