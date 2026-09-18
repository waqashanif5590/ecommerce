<?php

namespace App\Livewire\Shop;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ProductDetails extends Component
{
    public $slug;
    public int $quantity = 1;
    public $selectedVariantId;
    public $selectedVariant;
    public $review = '';
    public ?int $rating = null;

    public function setQuantity($operator): void
    {
        $productVariant = ProductVariant::whereKey($this->selectedVariantId)
            ->whereHas('product', function ($query) {
                $query->where('slug', $this->slug);
            })
            ->first();

        if (! $productVariant) {
            $this->dispatch(
                'alert',
                message: 'Please select a valid product variant.',
                type: 'error'
            );

            return;
        }

        if ($productVariant->quantity < 1) {
            $this->dispatch(
                'alert',
                message: 'This product variant is out of stock.',
                type: 'error'

            );

            return;
        }

        if ($operator === 'min') {
            if ($this->quantity <= 1) {
                $this->dispatch(
                    'alert',
                    message: 'Quantity cannot be less than 1',
                    type: 'error'
                );

                return;
            } else {
                $this->quantity--;
            }
        } elseif ($operator === 'plus') {
            if ($this->quantity >= $productVariant->quantity) {
                $this->dispatch(
                    'alert',
                    message: 'Quantity cannot be more than available stock',
                    type: 'error'
                );

                return;
            } else {
                $this->quantity++;
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
                message: 'Item removed from wishlist successfully.',
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
                message: 'Item added to wishlist successfully.',
                type: 'success'
            );
        }
    }

    public function selectVariant(int $variantId): void
    {
        $this->selectedVariant = ProductVariant::whereKey($variantId)
            ->whereHas('product', function ($query) {
                $query->where('slug', $this->slug);
            })
            ->firstOrFail();

        $this->selectedVariantId = $this->selectedVariant->id;
        $this->quantity = 1;
    }

    public function addToCart()
    {
        if (Auth::guest()) {
            $this->redirectRoute('login');

            return;
        }

        if (! $this->selectedVariantId) {
            $this->dispatch(
                'alert',
                message: 'Please select size of your product.',
                type: 'error'
            );

            return;
        }
        // If product variant is out of stock, show an error message
        $productVariant = ProductVariant::whereKey($this->selectedVariantId)
            ->whereHas('product', function ($query) {
                $query->where('slug', $this->slug);
            })
            ->first();
        if (!$productVariant || $productVariant->quantity < 1) {
            $this->dispatch(
                'alert',
                message: 'This product variant is out of stock.',
                type: 'error'
            );

            return;
        }

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $this->selectedVariantId)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity + $this->quantity > $productVariant->quantity) {
                $this->dispatch(
                    'alert',
                    message: 'No more product available in the stock.',
                    type: 'error'
                );

                return;
            } else {
                $cartItem->increment('quantity', $this->quantity);
                $this->dispatch(
                    'alert',
                    message: 'Product updated in the Cart successfully.',
                    type: 'info'
                );
            }
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_variant_id' => $this->selectedVariantId,
                'quantity' => $this->quantity,
            ]);
            $this->dispatch(
                'alert',
                message: 'Product added to Cart successfully.',
                type: 'success'
            );
        }
    }

    public function mount($slug): void
    {
        $this->slug = $slug;
        $product = Product::where('slug', $this->slug)
            ->firstOrFail();

        $this->selectedVariant = $product->variants->first();
        $this->selectedVariantId = $this->selectedVariant?->id;
    }
    public function submitReview($productId)
    {
        $this->validate([
            'review' => ['required', 'string', 'max:1000'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $product = Product::findOrFail($productId);

        $product->reviews()->create([
            'user_id' => Auth::id(),
            'review' => $this->review,
            'rating' => $this->rating,
        ]);
        $this->dispatch('close-modal', name: 'write-review');
        $this->dispatch(
            'alert',
            message: 'Review submitted successfully.',
            type: 'success'
        );

        // Reset the review message after submission
        $this->review = '';
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)
            ->withExists(['wishlists as isInWishlist' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->firstOrFail();
        $all_products = Product::withExists(['wishlists as isInWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        return view('livewire.shop.product-details', compact(['all_products', 'product']));
    }
}
