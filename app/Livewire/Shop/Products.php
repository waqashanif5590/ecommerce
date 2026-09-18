<?php

namespace App\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Products extends Component
{
    public $slug = null;
    public $message = '';
    public $search = '';
    public $sortBy = '';
    public $feature = '';
    public $price = '';
    public function addToWishlist(int $productId): void
    {
        if (Auth::guest()) {
            session()->flash('alert', [
                'message' => 'Please login to your account.',
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

    public function mount($slug = null)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $products = Product::query()
            ->withExists([
                'wishlists as isInWishlist' => function ($query) {
                    $query->where('user_id', Auth::id());
                }
            ])
            ->when($this->slug, function ($query) {
                $query->whereHas('category', function ($query) {
                    $query->where('slug', $this->slug);
                });
            })
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->sortBy, function ($query) {
                switch ($this->sortBy) {
                    case 'price-asc':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price-desc':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'discount':
                        $query->orderBy('total_discount', 'desc');
                        break;
                    case 'newest':
                        $query->orderBy('is_new', 'desc');
                        break;
                    default:
                        $query->orderBy('created_at', 'desc');
                }
            })
            ->when($this->feature, function ($query) {
                $query->where('badge', 'like', '%' . $this->feature . '%');
            })
            ->when($this->price, function ($query) {
                switch ($this->price) {
                    case '<1500':
                        $query->where('price', '<', 1500);
                        break;
                    case '1500-3000':
                        $query->whereBetween('price', [1500, 3000]);
                        break;
                    case '3000-4000':
                        $query->whereBetween('price', [3000, 4000]);
                        break;
                    case '>4000':
                        $query->where('price', '>', 4000);
                        break;
                }
            })
            ->get();
        $categories = Category::with('products')->get();

        return view('livewire.shop.products', compact(['products', 'categories']));
    }
}
