<?php

use App\Livewire\Index;
use App\Models\CustomerReview;
use App\Models\User;
use Livewire\Livewire;

test('a signed-in customer can submit a platform review', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Index::class)
        ->assertSee('wire:submit.prevent="submitCustomerReview"', escape: false)
        ->set('review', 'The ordering experience was excellent.')
        ->set('rating', 5)
        ->call('submitCustomerReview')
        ->assertHasNoErrors();

    $review = CustomerReview::query()->firstOrFail();

    expect($review->user_id)->toBe($user->id)
        ->and($review->rating)->toBe('5')
        ->and($review->comment)->toBe('The ordering experience was excellent.')
        ->and($review->status)->toBe(1);
});

test('a guest is redirected to login when submitting a platform review', function () {
    Livewire::test(Index::class)
        ->set('review', 'The ordering experience was excellent.')
        ->set('rating', 5)
        ->call('submitCustomerReview')
        ->assertRedirect(route('login', absolute: false));

    expect(CustomerReview::query()->count())->toBe(0);
});
