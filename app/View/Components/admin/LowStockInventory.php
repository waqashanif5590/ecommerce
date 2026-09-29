<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LowStockInventory extends Component
{
    public $lowStocks;
    public function __construct($lowStocks)
    {
        $this->lowStocks = $lowStocks;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.low-stock-inventory');
    }
}
