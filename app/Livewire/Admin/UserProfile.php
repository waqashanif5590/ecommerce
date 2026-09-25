<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserProfile extends Component
{
    public $customer;

    public function mount($customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        $total_orders = Order::count();
        $user = User::findOrFail($this->customer);
        $address = Address::where('is_default', true)->where('user_id', $this->customer)->first();
        $orders = Order::where('user_id', $this->customer)->get();
        return view('livewire.admin.user-profile', compact(['total_orders', 'user', 'address','orders']));
    }
}
