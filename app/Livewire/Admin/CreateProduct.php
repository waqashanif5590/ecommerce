<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use RuntimeException;
use Throwable;

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

    public string $size = '';

    public string $color = '';

    public int|string $quantity = '';

    public ?TemporaryUploadedFile $image = null;

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
            'size' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:0'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $imagePath = $validated['image']->storePublicly('images', 'public');

        if ($imagePath === false) {
            throw new RuntimeException('The product image could not be saved.');
        }

        try {
            DB::transaction(function () use ($validated, $imagePath): void {
                $product = Product::query()->create([
                    'category_id' => $validated['categoryId'],
                    'name' => $validated['name'],
                    'slug' => $this->uniqueSlug($validated['name']),
                    'description' => $validated['description'],
                    'price' => $validated['price'],
                    'total_discount' => $validated['totalDiscount'] ?: null,
                    'badge' => $validated['badge'] ?: null,
                    'is_new' => $validated['isNew'],
                    'status' => true,
                ]);

                $product->images()->create([
                    'image' => basename($imagePath),
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);

                $product->variants()->create([
                    'size' => $validated['size'],
                    'color' => $validated['color'],
                    'quantity' => $validated['quantity'],
                    'status' => true,
                ]);
            });
        } catch (Throwable $exception) {
            Storage::disk('public')->delete($imagePath);

            throw $exception;
        }

        session()->flash('alert', [
            'message' => 'Product created successfully.',
            'type' => 'success',
        ]);

        $this->redirectRoute('products', navigate: true);
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
