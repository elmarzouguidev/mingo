<?php

namespace App\Http\Mingo\Livewire\Product;

use App\Models\Product;
use App\Models\Wishlist;
use Elmarzouguidev\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SingleProduct extends Component
{
    public array $quantity = [];

    public $product;

    //public $colors;
    public $cart;

    public $attributesData = [];

    public function mount($product)
    {
        $this->product = $product;

        $this->quantity[$product->id] = 1;
    }

    public function render()
    {
        return view('livewire.product.single-product');
    }

    public function addToCart($product_id)
    {

        //  dd($this->attributesData);
        $product = Product::findOrFail($product_id);

        Cart::add(
            $product->id,
            $product->field('name'),
            $this->quantity[$product_id],
            $product->formated_price / 1,
            0,
            [

                'attributesData' => $this->attributesData ?? [],
                'image' => $product->photo,
                'url' => $product->url,
            ]
        );

        $this->emit('cart_updated');

        $this->dispatchBrowserEvent('added_to_cart', [
            'type' => 'success',
            'message' => 'le produit est ajouté à votre panier',
        ]);
    }

    public function addToWishList($productId)
    {
        if (auth()->guard('customer')->check()) {

            $wish = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)

                ->whereIn('product_id', [$productId]);
            //dd($wish->toSql());
            //dd($wish->exists());
            if (! $wish->exists()) {
                $wishlist = new Wishlist();
                $wishlist->product_id = $productId;
                //$wishlist->customer_id = auth()->guard('customer')->user()->id;
                $wishlist->save();

                $this->dispatchBrowserEvent('added_to_cart', [
                    'type' => 'success',
                    'message' => 'le produit est ajouté à votre Favorie',
                ]);
            }
            /*$this->dispatchBrowserEvent('added_to_cart', [
                'type' => 'success',
                'message' => 'le produit est deja à votre Favorie'
            ]);*/
        }
    }
}
