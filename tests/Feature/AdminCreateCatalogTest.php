<?php

use App\Livewire\Admin\CreateCategory;
use App\Livewire\Admin\CreateProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

test('catalog pages show create actions only to administrators', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    $this->get(route('products'))
        ->assertOk()
        ->assertSee('Add product')
        ->assertSee(route('admin.products.create'));

    $this->get(route('categories'))
        ->assertOk()
        ->assertSee('Add category')
        ->assertSee(route('admin.categories.create'));

    $customer = User::factory()->create();
    $this->actingAs($customer);

    $this->get(route('products'))->assertDontSee('Add product');
    $this->get(route('categories'))->assertDontSee('Add category');
});

test('non-admins cannot access the catalog creation pages', function () {
    $this->actingAs(User::factory()->create());

    $this->get(route('admin.products.create'))->assertForbidden();
    $this->get(route('admin.categories.create'))->assertForbidden();
});

test('admins can create categories with a generated slug and uploaded image', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    Livewire::test(CreateCategory::class)
        ->set('title', 'Trail Running')
        ->set('description', 'Shoes and gear for trail running.')
        ->set('image', UploadedFile::fake()->image('trail.png'))
        ->call('save')
        ->assertRedirect(route('categories'));

    $category = Category::query()->firstOrFail();

    expect($category->slug)->toBe('trail-running')
        ->and($category->image)->not->toContain('/');
    Storage::disk('public')->assertExists('images/'.$category->image);
});

test('admins can create products with a primary image and an initial variant', function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create(['role' => 'admin']));
    $category = Category::query()->create([
        'title' => 'Running',
        'description' => 'Running shoes.',
        'slug' => 'running',
        'image' => 'running.jpg',
    ]);

    Livewire::test(CreateProduct::class)
        ->set('name', 'Velocity Runner')
        ->set('categoryId', $category->id)
        ->set('description', 'A lightweight daily running shoe.')
        ->set('price', '2500')
        ->set('totalDiscount', '10')
        ->set('badge', 'Bestseller')
        ->set('isNew', true)
        ->set('size', '42')
        ->set('color', 'Black')
        ->set('quantity', '12')
        ->set('image', UploadedFile::fake()->image('velocity.png'))
        ->call('save')
        ->assertRedirect(route('products'));

    $product = Product::query()->with(['images', 'variants'])->firstOrFail();

    expect($product->slug)->toBe('velocity-runner')
        ->and($product->category_id)->toBe($category->id)
        ->and($product->total_discount)->toBe(10)
        ->and((bool) $product->is_new)->toBeTrue()
        ->and($product->images)->toHaveCount(1)
        ->and((bool) $product->images->first()->is_primary)->toBeTrue()
        ->and($product->variants)->toHaveCount(1)
        ->and($product->variants->first()->quantity)->toBe(12);
    expect($product->images->first()->image)->not->toContain('/');
    Storage::disk('public')->assertExists('images/'.$product->images->first()->image);
});
