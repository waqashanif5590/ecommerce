<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Order;

#[Layout('layouts.app')]
class ReportsAnalytics extends Component
{
    public function render()
    {
        $totalOrders = Order::count();
        return view('livewire.admin.reports-analytics', compact(['totalOrders']));
    }
}
