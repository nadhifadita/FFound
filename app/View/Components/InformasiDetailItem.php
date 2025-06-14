<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\FoundItem; 
use Closure;
use Illuminate\Contracts\View\View;

class InformasiDetailItem extends Component
{
    public FoundItem $item; 

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\FoundItem  $item  Item yang ditemukan untuk ditampilkan.
     * @return void
     */
    public function __construct(FoundItem $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.informasi-detail-item');
    }
}