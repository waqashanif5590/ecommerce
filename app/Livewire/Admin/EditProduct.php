<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use RuntimeException;

#[Layout('layouts.app')]
class EditProduct extends Component
{
    use WithFileUploads;

    public $slug;

    public $name;

    public $category_id;

    public $description;

    public $price;

    public $total_discount;

    public $badge;

    public $status;

    public $is_new;

    public $variants = [];

    public $newImages = [];

    public $primaryImage;

    public function mount(string $product): void
    {
        $this->authorizeAdmin();

        $product = Product::query()
            ->with('variants')
            ->where('slug', $product)
            ->firstOrFail();

        $this->slug = $product->slug;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->total_discount = $product->total_discount;
        $this->badge = $product->badge;
        $this->status = $product->status;
        $this->is_new = (bool) $product->is_new;
        $this->variants = $product->variants
            ->map(function ($variant) {
                return [
                    'id' => $variant->id,
                    'size' => $variant->size,
                    'color' => $variant->color,
                    'quantity' => $variant->quantity,
                    'status' => $variant->status,
                ];
            })
            ->toArray();

        $this->primaryImage = $product->images()
            ->where('is_primary', true)
            ->value('id');
    }

    #[On('confirmation-confirmed')]
    public function handleConfirmationConfirmed($id, $name)
    {
        if ($name === 'save-changes') {
            $this->editProduct($id);
        }
    }

    public function confirmSaveChanges($productId)
    {
        $this->dispatch(
            'open-confirmation-modal',
            name: 'save-changes',
            id: $productId
        );
    }

    public function editProduct($productId): void
    {
        $this->authorizeAdmin();

        $product = Product::findOrFail($productId);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'total_discount' => 'required|numeric|min:0|max:100',
            'badge' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'is_new' => 'boolean',
            'variants' => 'array',
            'variants.*.size' => 'required|string|max:255',
            'variants.*.color' => 'required|string|max:255',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.status' => 'required|boolean',
            'newImages' => 'nullable|array',
            'newImages.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'total_discount' => $validated['total_discount'],
            'badge' => $validated['badge'],
            'status' => $validated['status'],
            'is_new' => $validated['is_new'] ?? false,
        ]);

        foreach ($validated['variants'] as $variant) {
            $productVariant = ProductVariant::where('product_id', $product->id)
                ->firstOrFail();
            $productVariant->update([
                'size' => $variant['size'],
                'color' => $variant['color'],
                'quantity' => $variant['quantity'],
                'status' => $variant['status'],
            ]);
        }

        if (! empty($validated['newImages'])) {
            foreach ($validated['newImages'] as $image) {
                $imagePath = $image->storePublicly('images', 'public');

                if ($imagePath === false) {
                    throw new RuntimeException('The product image could not be saved.');
                }

                $product->images()->create([
                    'image' => basename($imagePath),
                    'is_primary' => false,
                    'sort_order' => $product->images()->count(),
                ]);
            }
        }

        $product->images()->update([
            'is_primary' => false,
        ]);

        if ($this->primaryImage) {
            $product->images()
                ->where('id', $this->primaryImage)
                ->update([
                    'is_primary' => true,
                ]);
        }

        $this->newImages = [];

        $this->dispatch(
            'alert',
            message: 'The selected product was updated successfully',
            type: 'success'
        );
    }

    public function render()
    {
        $this->authorizeAdmin();

        $product = Product::where('slug', $this->slug)
            ->with(['images', 'variants', 'category'])
            ->firstOrFail();
        $categories = Category::all();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();

        return view('livewire.admin.edit-product', compact(
            'product',
            'categories',
            'pendingOrders'
        ));
    }

    private function authorizeAdmin(): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
    }
}
