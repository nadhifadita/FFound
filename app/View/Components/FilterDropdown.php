<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;
use Illuminate\Contracts\View\View;

class FilterDropdown extends Component
{
    public function __construct() { } // Konstruktor kosong untuk saat ini

    public function render(): View|Closure|string
    {
        return view('components.filter-dropdown');
    }
}