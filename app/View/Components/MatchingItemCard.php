<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Model; 
use Closure;
use Illuminate\Contracts\View\View;

class MatchingItemCard extends Component
{
    public Model $item; 
    public bool $showMatchedButton; 
    public int $initiatingFoundItemId;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $item  LostItem (yang cocok)
     * @param  bool  $showMatchedButton  Menampilkan tombol 'Tandai Cocok'
     * @param  int  $initiatingFoundItemId  ID dari FoundItem yang sedang dibandingkan.
     * @return void
     */
    public function __construct(Model $item, bool $showMatchedButton = false, int $initiatingFoundItemId)
    {
        $this->item = $item;
        $this->showMatchedButton = $showMatchedButton;
        $this->initiatingFoundItemId = $initiatingFoundItemId; // Ini harus selalu ada jika showMatchedButton true
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.matching-item-card');
    }
}