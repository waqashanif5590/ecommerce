<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use App\Models\Wishlist as WishlistModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Wishlist extends Component
{
    public $message = '';

    public function addToWishlist(int $productId): void
    {
        if (Auth::guest()) {
            session()->flash('alert', [
                'message' => 'Please login to your account',
                'type' => 'error',
            ]);
            $this->redirectRoute('login');

            return;
        }

        $wishlist = WishlistModel::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();
        if ($wishlist) {
            $wishlist->delete();
            $this->dispatch(
                'alert',
                message: 'Product removed from wishlist successfully.',
                type: 'success'
            );

            return;
        } else {
            WishlistModel::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
            $this->dispatch(
                'alert',
                message: 'Product added to wishlist successfully.',
                type: 'success'
            );
        }
    }

    public function render()
    {
        $wishlists = WishlistModel::with(['product' => function ($query) {
            $query->withExists(['wishlists as isInWishlist' => function ($query) {
                $query->where('user_id', Auth::id());
            }]);
        }])->where('user_id', Auth::id())
            ->get();
        $newproducts = Product::where('is_new', true)->withExists(['wishlists as isInWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        return view('livewire.shop.wishlist', compact(['wishlists', 'newproducts']));
    }
}
