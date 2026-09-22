<?php

use App\Livewire\User\OrderDetails;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Livewire\Livewire;

function createOrderForStatusTest(User $user): Order
{
    $order = Order::create([
        'user_id' => $user->id,
        'order_number' => 'ORD-TEST-'.uniqid(),
        'status' => 'pending',
        'shipping_name' => $user->name,
        'shipping_email' => $user->email,
        'shipping_phone' => $user->phone,
        'shipping_address' => 'Test address',
        'shipping_city' => 'Test city',
        'shipping_province' => 'Test province',
        'shipping_postal_code' => '00000',
        'subtotal' => 1000,
        'shipping' => 0,
        'discount' => 0,
        'total' => 1000,
    ]);

    Payment::create([
        'order_id' => $order->id,
        'method' => 'cod',
        'status' => 'pending',
    ]);

    return $order;
}

it('allows admins to update an order status', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $order = createOrderForStatusTest($admin);

    Livewire::actingAs($admin)
        ->test(OrderDetails::class, ['order' => $order])
        ->call('setStatus', 'processed')
        ->assertSet('order.status', 'processed');

    expect($order->fresh()->status)->toBe('processed');
});

it('hides status controls and rejects status updates for non admins', function () {
    $user = User::factory()->create();
    $order = createOrderForStatusTest($user);

    Livewire::actingAs($user)
        ->test(OrderDetails::class, ['order' => $order])
        ->assertDontSee('Processed')
        ->call('setStatus', 'processed');

    expect($order->fresh()->status)->toBe('pending');
});
