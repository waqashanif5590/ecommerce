<?php

namespace App\View\Components\Shop;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderSummary extends Component
{
    /**
     * Create a new component instance.
     */
    public $discount;

    public $totalBill;

    public $shipping;

    public $subTotal;

    public function __construct(
        $discount,
        $totalBill,
        $shipping,
        $subTotal
    ) {
        $this->discount = $discount;
        $this->totalBill = $totalBill;
        $this->shipping = $shipping;
        $this->subTotal = $subTotal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.order-summary');
    }
}
