<?php

use App\Models\User;

test('admin dashboard loads for an admin user', function () {
    $user = User::factory()->create([
        'role' => 'admin',
    ]);

    $this->actingAs($user);

    $this->get('/admin-dashboard')
        ->assertOk();
});
