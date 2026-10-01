<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Insights extends Component
{
    public $newCustomers;
    public $customersGrowth;
    public $topCity;
    public $repeatPurchaseRate;
    public $returningCustomersRate;
    public function __construct(
        $newCustomers,
        $customersGrowth,
        $topCity,
        $repeatPurchaseRate,
        $returningCustomersRate
    ) {
        $this->newCustomers = $newCustomers;
        $this->customersGrowth = $customersGrowth;
        $this->topCity = $topCity;
        $this->repeatPurchaseRate = $repeatPurchaseRate;
        $this->returningCustomersRate = $returningCustomersRate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.insights');
    }
}
