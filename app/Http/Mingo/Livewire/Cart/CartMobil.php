<?php

namespace App\Http\Mingo\Livewire\Cart;

use Elmarzouguidev\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartMobil extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cartItemes = Cart::content();
        $totalPrice = Cart::priceTotal();
        $subTotal = Cart::subtotal();

        return view('livewire.cart.cart-mobil', compact('cartItemes', 'totalPrice', 'subTotal'));
    }
}
