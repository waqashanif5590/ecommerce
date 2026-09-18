<?php

namespace App\Livewire\Shop;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class Cart extends Component
{
    #[On('confirmation-confirmed')]
    public function handleConfirmationConfirmed($name, $id)
    {
        if ($name === 'remove-cart-item') {
            $this->removeCartItem($id);
        }
        if ($name === 'clear-cart') {
            $this->clearCart($id);
        }
    }

    public function confirmRemoveCartItem(int $cartItemId)
    {
        $this->dispatch(
            'open-confirmation-modal',
            name: 'remove-cart-item',
            id: $cartItemId
        );
    }

    public function confirmClearCart(int $userId)
    {
        $this->dispatch(
            'open-confirmation-modal',
            name: 'clear-cart',
            id: $userId
        );
    }

    public function setQuantity($operator, $itemId)
    {

        $cartItem = CartItem::where('id', $itemId)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->firstOrFail();

        if ($operator === 'min') {
            if ($cartItem->quantity <= 1) {
                $this->dispatch(
                    'alert',
                    message: 'Quantity cannot be less than 1',
                    type: 'error'
                );

                return;
            } else {
                $cartItem->decrement('quantity', 1);
            }
        } elseif ($operator === 'plus') {
            if ($cartItem->quantity >= $cartItem->productVariant->quantity) {
                $this->dispatch(
                    'alert',
                    message: 'Quantity cannot be more than available stock',
                    type: 'error'
                );

                return;
            } else {
                $cartItem->increment('quantity', 1);
            }
        }
    }

    public function addToWishlist(int $productId): void
    {
        if (Auth::guest()) {
            $this->redirectRoute('login');

            return;
        }

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();
        if ($wishlist) {
            $wishlist->delete();
            $this->dispatch(
                'alert',
                message: 'Product removed from wishlist successfully',
                type: 'success'
            );

            return;
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
            $this->dispatch(
                'alert',
                message: 'Product added to wishlist successfully',
                type: 'success'
            );
        }
    }

    public function removeCartItem($cartItemId)
    {
        $cartItem = CartItem::where('id', $cartItemId)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->firstOrFail();
        $cartItem->delete();
        $this->dispatch(
            'alert',
            message: 'Product was removed from Cart successfully',
            type: 'success'
        );
    }

    public function clearCart($userId)
    {
        $cartItems = CartItem::whereHas('cart', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->get();
        if ($cartItems->isEmpty()) {
            $this->dispatch(
                'alert',
                message: 'Your cart is already empty',
                type: 'info'
            );

            return;
        }
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
        $this->dispatch(
            'alert',
            message: 'All products were removed from Cart successfully',
            type: 'success'
        );
    }

    public function render()
    {
        $products = Product::withExists(['wishlists as isInWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();
        $cartItems = CartItem::with([
            'productVariant.product.category',
            'productVariant.product.primaryImage',
        ])
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->get();
        $subTotal = $cartItems->sum(function ($item) {
            return $item->productVariant->product->price * $item->quantity;
        });
        $discount = $cartItems->sum('discount_amount');
        $shipping = 0;
        $totalBill = $subTotal + $shipping - $discount;

        return view('livewire.shop.cart', compact(['products', 'cartItems', 'discount', 'totalBill', 'shipping', 'subTotal']));
    }
}
