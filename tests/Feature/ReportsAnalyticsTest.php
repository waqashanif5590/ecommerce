<?php

use App\Livewire\Admin\ReportsAnalytics;
use App\Models\Order;
use App\Models\User;
use Livewire\Livewire;

function createOrderForAnalyticsTest(User $user, string $status, int $total): Order
{
    return Order::create([
        'user_id' => $user->id,
        'order_number' => 'ORD-ANALYTICS-'.uniqid(),
        'status' => $status,
        'shipping_name' => $user->name,
        'shipping_email' => $user->email,
        'shipping_phone' => $user->phone,
        'shipping_address' => 'Test address',
        'shipping_city' => 'Test city',
        'shipping_province' => 'Test province',
        'shipping_postal_code' => '00000',
        'subtotal' => $total,
        'shipping' => 0,
        'discount' => 0,
        'total' => $total,
    ]);
}

test('average order value uses completed orders', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    createOrderForAnalyticsTest($admin, 'completed', 1000);
    createOrderForAnalyticsTest($admin, 'completed', 3000);
    createOrderForAnalyticsTest($admin, 'pending', 9000);

    Livewire::actingAs($admin)
        ->test(ReportsAnalytics::class)
        ->assertSee('Average Order Value')
        ->assertSee('2,000')
        ->assertDontSee('656');
});

test('average order value is zero when there are no completed orders', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    Livewire::actingAs($admin)
        ->test(ReportsAnalytics::class)
        ->assertSeeInOrder([
            'Average Order Value',
            '0',
            'Compared with last month',
        ]);
});

test('average order value growth compares completed orders with the previous month', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    createOrderForAnalyticsTest($admin, 'completed', 1000)
        ->forceFill(['created_at' => now()->subMonth()->startOfMonth()->addDays(5)])
        ->save();
    createOrderForAnalyticsTest($admin, 'completed', 3000);

    Livewire::actingAs($admin)
        ->test(ReportsAnalytics::class)
        ->assertSee('3,000')
        ->assertSee('+200.0%');
});
