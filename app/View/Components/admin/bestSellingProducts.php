<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BestSellingProducts extends Component
{
    public $topSellingProducts;

    public function __construct($topSellingProducts = [])
    {
        $this->topSellingProducts = $topSellingProducts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.best-selling-products', [
            'topSellingProducts' => $this->topSellingProducts,
        ]);
    }
}
