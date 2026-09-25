<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerList extends Component
{
    public $customers;
    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.customer-list');
    }
}
