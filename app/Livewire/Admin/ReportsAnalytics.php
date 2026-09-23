<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ReportsAnalytics extends Component
{
    public function render()
    {
        return view('livewire.admin.reports-analytics');
    }
}
