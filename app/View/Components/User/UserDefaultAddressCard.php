<?php

namespace App\View\Components\user;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserDefaultAddressCard extends Component
{
    public $address;
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.user-default-address-card');
    }
}
