<?php

use App\Livewire\Admin\EditCategory;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

test('admins can edit category details without replacing the current image', function () {
    $this->actingAs(User::factory()->create(['role' => 'admin']));

    $category = Category::query()->create([
        'title' => 'Trail Running',
        'description' => 'Shoes for trail running.',
        'slug' => 'trail-running',
        'image' => 'trail-running.jpg',
    ]);

    Livewire::test(EditCategory::class, ['category' => $category])
        ->set('title', 'Mountain Running')
        ->set('description', 'Updated trail running shoes.')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirect(route('categories'));

    $category->refresh();

    expect($category->title)->toBe('Mountain Running')
        ->and($category->description)->toBe('Updated trail running shoes.')
        ->and($category->image)->toBe('trail-running.jpg');
});
