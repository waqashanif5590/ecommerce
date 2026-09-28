<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
class UserProfile extends Component
{
    #[On('confirmation-confirmed')]
    public function handleConfirmationConfirmed($name, $id)
    {
        if ($name === 'block-user') {
            $this->blockUser($id);
        }
        if ($name === 'delete-user') {
            $this->deleteUser($id);
        }
    }
    public $customer;

    public function mount($customer)
    {
        $this->customer = $customer;
    }
    public function confirmBlockUser($Id)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $this->dispatch(
            'open-confirmation-modal',
            name: 'block-user',
            id: $Id,
        );
    }
    public function confirmDeleteUser($Id)
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $this->dispatch(
            'open-confirmation-modal',
            name: 'delete-user',
            id: $Id,
        );
    }

    public function blockUser(int $id): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $user = User::findOrFail($id);
        $user->status = ! (bool) $user->status;
        $user->save();

        $this->dispatch(
            'alert',
            message: $user->status
                ? 'The selected user was unblocked successfully'
                : 'The selected user was blocked successfully',
            type: 'success'
        );
    }
    public function deleteUser(int $id): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('alert', 'The selected user was deleted successfully');
        $this->redirectRoute('all.users', navigate: true);
    }

    public function render()
    {
        $total_orders = Order::count();
        $user = User::findOrFail($this->customer);
        $address = Address::where('is_default', true)->where('user_id', $this->customer)->first();
        $orders = Order::where('user_id', $this->customer)->get();
        return view('livewire.admin.user-profile', compact(['total_orders', 'user', 'address', 'orders']));
    }
}
