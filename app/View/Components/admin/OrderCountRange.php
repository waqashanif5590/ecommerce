<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderCountRange extends Component
{
    public $orderCompleted;
    public $orderPending;
    public $orderCancelled;
    public function __construct(
        $orderCompleted,
        $orderPending,
        $orderCancelled
    ) {
        $this->orderCompleted = $orderCompleted;
        $this->orderPending = $orderPending;
        $this->orderCancelled = $orderCancelled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.order-count-range');
    }
}
