<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\CustomerReview;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
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

        $wishlist = Wishlist::where('user_id', Auth::id())
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
            Wishlist::create([
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
        $products = Product::withExists(['wishlists as isInWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();
        $customer_reviews = CustomerReview::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })->get();
        $categories = Category::all();
        $new_products = Product::where('is_new', true)->withExists(['wishlists as isInWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        return view('livewire.index', compact([
            'categories',
            'products',
            'new_products',
            'customer_reviews',
        ]));
    }
}
