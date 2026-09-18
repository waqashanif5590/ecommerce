<?php

namespace App\View\Components\Shop;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $cartItem;

    public function __construct($cartItem)
    {
        $this->cartItem = $cartItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.cart-item');
    }
}
