<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $total_orders;

    public function __construct($total_orders)
    {
        $this->total_orders = $total_orders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.admin-sidebar');
    }
}
