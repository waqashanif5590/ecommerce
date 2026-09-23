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

    private const STATUS_ORDER = [
        'pending',
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

    public function isStatusCompleted(string $status): bool
    {
        return match ($status) {
            'processed' => $this->order->processed_at !== null,
            'shipped' => $this->order->shipped_at !== null,
            'out_for_delivery' => $this->order->out_for_delivery_at !== null,
            'delivered' => $this->order->delivered_at !== null,
            'completed' => $this->order->completed_at !== null,
            default => false,
        };
    }

    public function getStatusDate(string $status): ?string
    {
        return match ($status) {
            'processed' => $this->order->processed_at?->format('M j, Y'),
            'shipped' => $this->order->shipped_at?->format('M j, Y'),
            'out_for_delivery' => $this->order->out_for_delivery_at?->format('M j, Y'),
            'delivered' => $this->order->delivered_at?->format('M j, Y'),
            'completed' => $this->order->completed_at?->format('M j, Y'),
            default => null,
        };
    }

    public function isCurrentStatus(string $status): bool
    {
        return $this->order->status === $status;
    }

    public function isNextStatus(string $status): bool
    {
        return match ($status) {
            'processed' => $this->order->status === 'pending',
            'shipped' => $this->order->status === 'processed',
            'out_for_delivery' => $this->order->status === 'shipped',
            'delivered' => $this->order->status === 'out_for_delivery',
            'completed' => $this->order->status === 'delivered',
            default => false,
        };
    }

    public function setStatus(string $status): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        abort_unless(in_array($status, self::STATUS_OPTIONS, true), 422);

        $currentIndex = array_search($this->order->status, self::STATUS_ORDER, true);
        $newIndex = array_search($status, self::STATUS_ORDER, true);

        abort_unless($newIndex === $currentIndex + 1, 422);

        $dateColumn = match ($status) {
            'processed' => 'processed_at',
            'shipped' => 'shipped_at',
            'out_for_delivery' => 'out_for_delivery_at',
            'delivered' => 'delivered_at',
            'completed' => 'completed_at',
        };

        $this->order->update([
            'status' => $status,
            $dateColumn => now(),
        ]);

        if ($status === 'completed') {
            $this->order->payment->update([
                'status' => 'completed',
                'amount_paid' => $this->order->total,
                'paid_at' => now(),
            ]);
        }

        $this->order->refresh();
        $this->order->payment->refresh();
    }

    public function render()
    {
        return view('livewire.user.order-details');
    }
}
