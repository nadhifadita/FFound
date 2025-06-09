<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\FoundItem; // Penting: Pastikan Anda mengimpor model FoundItem
use Closure;
use Illuminate\Contracts\View\View;

class FoundItemCard extends Component
{
    public FoundItem $item; // Properti publik untuk menerima instance model FoundItem
    public bool $isPetugasViewer; // Properti opsional untuk menentukan viewer

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\FoundItem  $item The FoundItem model instance
     * @param  bool  $isPetugasViewer  Optional: true if displayed for a petugas viewer. Default to false.
     * @return void
     */
    public function __construct(FoundItem $item, bool $isPetugasViewer = false)
    {
        $this->item = $item;
        $this->isPetugasViewer = $isPetugasViewer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.found-item-card');
    }
}