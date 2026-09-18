<?php

namespace App\Livewire\Shop;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class Checkout extends Component
{
    public $name;

    public $email;

    public $phone;

    public $address;

    public $city;

    public $province;

    public $postal_code;

    public $delivery_option = 'standard';

    public $payment_method = 'cod';

    public $selectedAddressId;

    public function mount()
    {
        $this->email = Auth::user()->email;
        $default_address = Address::where('user_id', Auth::id())->where('is_default', true)->first();
        if ($default_address) {
            $this->selectAddress($default_address->id);
        }
    }

    public function selectAddress($addressId)
    {
        $address = Address::where('id', $addressId)->where('user_id', Auth::id())->firstOrFail();
        $this->selectedAddressId = $address->id;
        $this->name = $address->name;
        $this->phone = $address->phone;
        $this->address = $address->address_line;
        $this->city = $address->city;
        $this->province = $address->state;
        $this->postal_code = $address->postal_code;
    }

    #[On('confirmation-confirmed')]
    public function handleConfirmationConfirm($name)
    {
        if ($name === 'confirm-order') {
            $this->placeOrder();
        }
    }

    public function confirmOrder()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'province' => ['required', 'string'],
            'postal_code' => ['required', 'string', 'max:20'],
            'delivery_option' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
        ]);
        $this->dispatch(
            'open-confirmation-modal',
            name: 'confirm-order'
        );
    }

    public function placeOrder()
    {

        $cart = Cart::where('user_id', Auth::id())
            ->with('items.productVariant.product')
            ->first();
        if (! $cart || $cart->items->isEmpty()) {
            session()->flash('alert', [
                'message' => 'Your cart is empty.',
                'type' => 'error',
            ]);

            return redirect()->route('cart');
        }

        // calculating the bill
        $subTotal = $cart->items->sum(function ($item) {
            return $item->productVariant->product->price * $item->quantity;
        });
        $discounted_total = $cart->items->sum('total_price');
        $discount = $cart->items->sum('discount_amount');
        $shipping = $this->delivery_option == 'standard' ? 0 : 300;

        $totalBill = $discounted_total + $shipping;

        // creating order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-'.strtoupper(uniqid()),
            'status' => 'pending',
            'shipping_name' => $this->name,
            'shipping_email' => $this->email,
            'shipping_phone' => $this->phone,
            'shipping_address' => $this->address,
            'shipping_city' => $this->city,
            'shipping_province' => $this->province,
            'shipping_postal_code' => $this->postal_code,
            'subtotal' => $subTotal,
            'shipping' => $shipping,
            'discount' => $discount,
            'total' => $totalBill,
        ]);

        // Creating Payments
        Payment::create([
            'order_id' => $order->id,
            'method' => $this->payment_method,
            'status' => 'pending',
        ]);
        foreach ($cart->items as $cartItem) {
            $product = $cartItem->productVariant->product;

            // creating order item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_variant_id' => $cartItem->product_variant_id,
                'product_name' => $product->name,
                'quantity' => $cartItem->quantity,
                'price' => $product->discounted_price,
            ]);
            // Decreasing the stock of the product variant
            $cartItem->productVariant->decrement('quantity', $cartItem->quantity);
            if ($cartItem->productVariant->quantity <= 0) {
                $cartItem->productVariant->status = false;
                $cartItem->productVariant->product->status = false;
                $cartItem->productVariant->save();
                $cartItem->productVariant->product->save();
            }
            $cartItem->delete();
        }

        session()->flash('alert', [
            'message' => 'Your order placed successfully.',
            'type' => 'success',
        ]);

        return redirect()->route('order.confirmation', ['order' => $order->id]);
    }

    public function render()
    {
        $addresses = Address::where('user_id', Auth::id())->orderByDesc('is_default')->get();
        $cartItems = CartItem::with([
            'productVariant.product.category',
            'productVariant.product.primaryImage',
        ])
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->get();
        $subTotal = $cartItems->sum(function ($item) {
            return $item->productVariant->product->price * $item->quantity;
        });
        $discount = $cartItems->sum('discount_amount');
        $shipping = 0;
        $totalBill = $subTotal + $shipping - $discount;

        return view('livewire.shop.checkout', compact(
            [
                'cartItems',
                'subTotal',
                'discount',
                'shipping',
                'totalBill',
                'addresses',
            ]
        ));
    }
}
