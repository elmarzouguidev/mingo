<?php

namespace App\Http\Mingo\Livewire\Product;

use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Products extends Component
{

    public $products;

    public $quantity;

    public function render()
    {
        return view('livewire.product.products');
    }

    public function mount()
    {
        $this->quantity = 1;
    }

    public function addToCart($product_id)
    {

        $product = Product::findOrFail($product_id);

        Cart::add(
            $product->id,
            $product->field('name'),
            $this->quantity,
            $product->price / 100,
            0,
            [

                //'colors' => $request->colors ?? [],
                'image' => $product->photo,
                'url' => $product->url,
            ]
        );

        $this->emit('cart_updated');

        $this->dispatchBrowserEvent('added_to_cart', [
            'type' => 'success',
            'message' => 'le produit est ajouté à votre panier'
        ]);
    }

    public function addToWishList($productId)
    {
        if (auth()->guard('customer')->check()) {

            $wish = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)

                ->whereIn('product_id', [$productId]);
            //dd($wish->toSql());
            //dd($wish->exists());
            if (!$wish->exists()) {
                $wishlist = new Wishlist();
                $wishlist->product_id = $productId;
                //$wishlist->customer_id = auth()->guard('customer')->user()->id;
                $wishlist->save();

                $this->dispatchBrowserEvent('added_to_cart', [
                    'type' => 'success',
                    'message' => 'le produit est ajouté à votre Favorie'
                ]);
            }
            /*$this->dispatchBrowserEvent('added_to_cart', [
                'type' => 'success',
                'message' => 'le produit est deja à votre Favorie'
            ]);*/
        }

    }
}
