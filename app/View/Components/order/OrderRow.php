<?php

namespace App\View\Components\order;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderRow extends Component
{
    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order.order-row');
    }
}
