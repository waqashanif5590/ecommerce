<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OrderDetails extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);
        $this->order = $order->load([
            'items.product',
            'items.variant',
            'payment',
        ]);
    }

    public function render()
    {
        return view('livewire.user.order-details');
    }
}
