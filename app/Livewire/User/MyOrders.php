<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class MyOrders extends Component
{
    public $search = '';
    public $status = '';
    public $date = '';
    public function render()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('order_number', 'like', "%%$this->search%%")
                        ->orWhereHas('items.product', function ($productQuery) {
                            $productQuery->where('name', 'like', "%%$this->search%%");
                        });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->date, function ($query) {
                switch ($this->date) {
                    case '30days':
                        $query->where('created_at', '>=', now()->subDays(30));
                        break;

                    case '3months':
                        $query->where('created_at', '>=', now()->subMonths(3));
                        break;

                    case 'year':
                        $query->whereYear('created_at', now()->year);
                        break;
                }
            })
            ->get();

        return view('livewire.user.my-orders', compact('orders'));
    }
}
