<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;
use Illuminate\Contracts\View\View;

class FilterDropdown extends Component
{
    public function __construct() { }

    public function render(): View|Closure|string
    {
        return view('components.filter-dropdown');
    }
}