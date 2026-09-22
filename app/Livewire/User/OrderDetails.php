<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class OrderDetails extends Component
{
    private const STATUS_OPTIONS = [
        'processed',
        'shipped',
        'out_for_delivery',
        'delivered',
        'completed',
    ];

    public Order $order;

    public function mount(Order $order): void
    {
        // abort_unless($order->user_id === Auth::id(), 403);
        $this->order = $order->load([
            'items.product',
            'items.variant',
            'payment',
        ]);
    }

    public function setStatus(string $status): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
        abort_unless(in_array($status, self::STATUS_OPTIONS, true), 422);

        $this->order->update(['status' => $status]);
        $this->order->refresh();
    }

    public function render()
    {
        return view('livewire.user.order-details');
    }
}
