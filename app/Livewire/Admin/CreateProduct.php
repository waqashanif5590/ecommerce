<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class CreateProduct extends Component
{
    use WithFileUploads;

    public string $name = '';

    public int|string $categoryId = '';

    public string $description = '';

    public int|float|string $price = '';

    public int|string|null $totalDiscount = null;

    public string $badge = '';

    public bool $isNew = false;

    public array $images = [];

    public int|string $primaryImage = 0;

    public array $variants = [
        [
            'size' => '',
            'color' => '',
            'quantity' => '',
        ],
    ];

    public function mount(): void
    {
        $this->authorizeAdmin();
    }

    public function save(): void
    {
        $this->authorizeAdmin();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'categoryId' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'totalDiscount' => ['nullable', 'integer', 'min:0', 'max:100'],
            'badge' => ['nullable', 'string', 'max:255'],
            'isNew' => ['boolean'],
            'variants' => ['required', 'array', 'min:1'],
            'variants.*.size' => ['required', 'string', 'max:255'],
            'variants.*.color' => ['required', 'string', 'max:255'],
            'variants.*.quantity' => ['required', 'integer', 'min:1'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'primaryImage' => ['required', 'integer', Rule::in(array_keys($this->images))],
        ]);

        $product = Product::create([
            'category_id' => $validated['categoryId'],
            'name' => $validated['name'],
            'slug' => $this->uniqueSlug($validated['name']),
            'description' => $validated['description'],
            'price' => $validated['price'],
            'total_discount' => $validated['totalDiscount'],
            'badge' => $validated['badge'],
            'is_new' => $validated['isNew'],
            'status' => true,
        ]);
        foreach ($validated['variants'] as $variant) {
            $product->variants()->create([
                'size' => $variant['size'],
                'color' => $variant['color'],
                'quantity' => $variant['quantity'],
                'status' => true,
            ]);
        }

        foreach ($validated['images'] as $index => $image) {

            $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();

            $image->storeAs(
                'images',
                $imageName,
                'public'
            );

            $product->images()->create([
                'image' => $imageName,
                'is_primary' => $index === (int) $validated['primaryImage'],
                'sort_order' => $index + 1,
            ]);
        }

        session()->flash('alert', [
            'message' => 'Product created successfully.',
            'type' => 'success',
        ]);

        $this->redirectRoute('products', navigate: true);
    }

    public function addVariant(): void
    {
        $this->variants[] = [
            'size' => '',
            'color' => '',
            'quantity' => '',
        ];
    }

    public function removeVariant(int $index): void
    {
        if (count($this->variants) > 1) {
            unset($this->variants[$index]);
            $this->variants = array_values($this->variants);
        }
    }

    public function removeImage(int $index): void
    {
        $this->authorizeAdmin();
        abort_unless(array_key_exists($index, $this->images), 404);

        unset($this->images[$index]);
        $this->images = array_values($this->images);

        if ($this->images === []) {
            $this->primaryImage = 0;

            return;
        }

        $primaryIndex = (int) $this->primaryImage;
        $this->primaryImage = $index === $primaryIndex
            ? 0
            : $primaryIndex - (int) ($index < $primaryIndex);
    }

    public function render(): View
    {
        $this->authorizeAdmin();

        return view('livewire.admin.create-product', [
            'categories' => Category::query()->orderBy('title')->get(),
        ]);
    }

    private function authorizeAdmin(): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
    }

    private function uniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name) ?: 'product';
        $slug = $baseSlug;
        $suffix = 2;

        while (Product::query()->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
