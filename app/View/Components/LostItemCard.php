<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\LostItem; 
use Closure;
use Illuminate\Contracts\View\View;

class LostItemCard extends Component
{
    public $item;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\LostItem  $item  Instance dari model LostItem
     * @return void
     */
    public function __construct(LostItem $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lost-item-card');
    }
}