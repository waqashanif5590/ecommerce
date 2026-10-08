<?php

use App\Livewire\Admin\EditProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

test('edit product form is populated with the current product and variant data', function () {
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $category = Category::query()->create([
        'title' => 'Running',
        'description' => 'Running shoes.',
        'slug' => 'running',
        'image' => 'running.jpg',
    ]);

    $product = Product::query()->create([
        'category_id' => $category->id,
        'name' => 'Velocity Runner',
        'slug' => 'velocity-runner',
        'description' => 'A lightweight daily running shoe.',
        'price' => 2500,
        'total_discount' => 10,
        'status' => true,
        'is_new' => false,
    ]);

    $product->images()->create([
        'image' => 'velocity.jpg',
        'is_primary' => true,
    ]);

    $variant = $product->variants()->create([
        'size' => '42',
        'color' => 'Black',
        'quantity' => 12,
        'status' => true,
    ]);

    Livewire::test(EditProduct::class, ['product' => $product->slug])
        ->assertSet('name', $product->name)
        ->assertSet('description', $product->description)
        ->assertSet('price', $product->price)
        ->assertSet('variants.0.size', $variant->size)
        ->assertSet('variants.0.color', $variant->color)
        ->assertSet('variants.0.quantity', $variant->quantity)
        ->assertSeeHtml('value="Velocity Runner"')
        ->assertSeeHtml('value="'.$product->price.'"')
        ->assertSeeHtml('A lightweight daily running shoe.')
        ->assertSeeHtml('value="42"')
        ->assertSeeHtml('value="Black"')
        ->assertSeeHtml('value="12"');
});

test('admins can upload multiple images when editing a product', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $category = Category::query()->create([
        'title' => 'Running',
        'description' => 'Running shoes.',
        'slug' => 'running',
        'image' => 'running.jpg',
    ]);

    $product = Product::query()->create([
        'category_id' => $category->id,
        'name' => 'Velocity Runner',
        'slug' => 'velocity-runner',
        'description' => 'A lightweight daily running shoe.',
        'price' => 2500,
        'total_discount' => 10,
        'status' => true,
        'is_new' => false,
    ]);

    $primaryImagePath = UploadedFile::fake()
        ->image('primary.png')
        ->storePublicly('images', 'public');

    $primaryImage = $product->images()->create([
        'image' => basename($primaryImagePath),
        'is_primary' => true,
        'sort_order' => 0,
    ]);

    Livewire::test(EditProduct::class, ['product' => $product->slug])
        ->set('newImages', [
            UploadedFile::fake()->image('front.png'),
            UploadedFile::fake()->image('side.png'),
        ])
        ->assertSee('Preview of selected image 1')
        ->call('editProduct', $product->id)
        ->assertHasNoErrors();

    $images = ProductImage::query()
        ->where('product_id', $product->id)
        ->orderBy('sort_order')
        ->get();

    expect($images)->toHaveCount(3)
        ->and($images->pluck('image')->unique())->toHaveCount(3)
        ->and($images->pluck('sort_order')->all())->toBe([0, 1, 2])
        ->and($images->where('is_primary', true))->toHaveCount(1)
        ->and($images->firstWhere('is_primary', true)->id)->toBe($primaryImage->id);

    foreach ($images as $image) {
        Storage::disk('public')->assertExists('images/'.$image->image);
    }
});

test('admins can update each product variant independently', function () {
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $category = Category::query()->create([
        'title' => 'Running',
        'description' => 'Running shoes.',
        'slug' => 'running',
        'image' => 'running.jpg',
    ]);

    $product = Product::query()->create([
        'category_id' => $category->id,
        'name' => 'Velocity Runner',
        'slug' => 'velocity-runner',
        'description' => 'A lightweight daily running shoe.',
        'price' => 2500,
        'total_discount' => 10,
        'status' => true,
        'is_new' => false,
    ]);

    $firstVariant = $product->variants()->create([
        'size' => '42',
        'color' => 'Black',
        'quantity' => 12,
        'status' => true,
    ]);
    $secondVariant = $product->variants()->create([
        'size' => '43',
        'color' => 'White',
        'quantity' => 8,
        'status' => true,
    ]);

    Livewire::test(EditProduct::class, ['product' => $product->slug])
        ->set('variants.0.size', '42.5')
        ->set('variants.0.quantity', 10)
        ->set('variants.1.color', 'Blue')
        ->set('variants.1.status', false)
        ->call('editProduct', $product->id)
        ->assertHasNoErrors();

    $firstVariant->refresh();
    $secondVariant->refresh();

    expect($firstVariant->size)->toBe('42.5')
        ->and($firstVariant->quantity)->toBe(10)
        ->and($firstVariant->color)->toBe('Black')
        ->and((bool) $firstVariant->status)->toBeTrue()
        ->and($secondVariant->size)->toBe('43')
        ->and($secondVariant->color)->toBe('Blue')
        ->and($secondVariant->quantity)->toBe(8)
        ->and((bool) $secondVariant->status)->toBeFalse();
});

test('admins can change a product primary image and only that image gets the primary badge', function () {
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $category = Category::query()->create([
        'title' => 'Running',
        'description' => 'Running shoes.',
        'slug' => 'running',
        'image' => 'running.jpg',
    ]);

    $product = Product::query()->create([
        'category_id' => $category->id,
        'name' => 'Velocity Runner',
        'slug' => 'velocity-runner',
        'description' => 'A lightweight daily running shoe.',
        'price' => 2500,
        'total_discount' => 10,
        'status' => true,
        'is_new' => false,
    ]);

    $product->images()->create([
        'image' => 'front.jpg',
        'is_primary' => true,
    ]);
    $newPrimaryImage = $product->images()->create([
        'image' => 'side.jpg',
        'is_primary' => false,
    ]);

    $component = Livewire::test(EditProduct::class, ['product' => $product->slug])
        ->set('primaryImage', $newPrimaryImage->id)
        ->call('editProduct', $product->id)
        ->assertHasNoErrors();

    expect($product->images()->where('is_primary', true)->pluck('id')->all())
        ->toBe([$newPrimaryImage->id])
        ->and(substr_count($component->html(), '>Primary image</span>'))
        ->toBe(1);
});
