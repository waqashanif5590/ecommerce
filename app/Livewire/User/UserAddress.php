<?php

namespace App\Livewire\User;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UserAddress extends Component
{
    public ?int $addressToEdit = null;
    public ?int $addressToDelete = null;
    public $address_line;
    public $name;
    public $phone;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $type = 'home';
    public $is_default = false;

    #[On('confirmation-confirmed')]
    public function handleConfirmation($name, $id)
    {
        if ($name === 'delete-address') {
            $this->deleteAddress($id);
        }
    }

    public function confirmDelete($id)
    {
        $this->addressToDelete = $id;
        $this->dispatch('open-confirmation-modal', name: 'delete-address', id: $id);
    }

    public function deleteAddress($id)
    {
        $address = Address::where('id', $id)->firstOrFail();
        $this->addressToDelete = $address->id;
        $address->delete();
        // If no address is set as default, set the first address as default
        if (! Address::where('user_id', Auth::id())->where('is_default', true)->exists()) {
            $firstAddress = Address::where('user_id', Auth::id())->first();
            if ($firstAddress) {
                $firstAddress->is_default = true;
                $firstAddress->save();
            }
        }


        $this->dispatch(
            'alert',
            message: 'Address deleted successfully',
            type: 'success'
        );
    }

    public function saveAddress()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address_line' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:10'],
            'country' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:home,office,other'],
            'is_default' => ['boolean'],
        ]);
        $data['user_id'] = Auth::id();
        if (! empty($data['is_default'])) {
            Address::where('user_id', Auth::id())
                ->where('is_default', true)
                ->update(['is_default' => false]);
        }

        if ($this->addressToEdit) {
            $address = Address::where('user_id', Auth::id())->where('id', $this->addressToEdit)->firstOrFail();
            $address->update($data);
            $message = 'Address updated successfully';
        } else {

            Address::create($data);
            $message = 'New address created successfully';
        }

        $this->reset();

        $this->dispatch('close-modal', name: 'save-address');

        $this->dispatch(
            'alert',
            message: $message,
            type: 'success'
        );
    }
    public function makeDefaultAddress($addressId)
    {
        $address = Address::where('user_id', Auth::id())->where('id', $addressId)->firstOrFail();
        if ($address->is_default == false) {
            $other_address = Address::where('user_id', Auth::id())->where('is_default', true)->first();
            if ($other_address) {
                $other_address->is_default = false;
                $other_address->save();
            }
            $address->is_default = true;
            $address->save();
        }
        $this->dispatch(
            'alert',
            message: 'Default address changed successfully',
            type: 'success'
        );
    }
    public function editAddress($addressId)
    {
        $address = Address::where('user_id', Auth::id())->where('id', $addressId)->firstOrFail();
        $this->addressToEdit = $address->id;
        $this->name = $address->name;
        $this->phone = $address->phone;
        $this->address_line = $address->address_line;
        $this->city = $address->city;
        $this->state = $address->state;
        $this->postal_code = $address->postal_code;
        $this->country = $address->country;
        $this->type = $address->type;
        $this->is_default = $address->is_default;

        $this->dispatch('open-modal', name: 'save-address');
    }

    public function render()
    {
        $addresses = Address::where('user_id', Auth::id())->get();

        return view('livewire.user.user-address', compact(['addresses']));
    }
}
