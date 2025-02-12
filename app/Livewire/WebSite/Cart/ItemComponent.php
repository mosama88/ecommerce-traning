<?php

namespace App\Livewire\WebSite\Cart;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class ItemComponent extends Component
{
    public $book;
    public $quantity;

    public function increment()
    {
        $this->quantity++;
        $this->updateAddToCartQuantity(Auth::id(), $this->book->id, $this->quantity);
    }

    public function decrement()
    {
        if ($this->quantity == 1) return;
        $this->quantity--;
        $this->updateAddToCartQuantity(Auth::id(), $this->book->id, $this->quantity);
    }

    public function updateAddToCartQuantity($user_id, $book_id, $quantity)
    {
        if ($user_id) {
            AddToCart::where('user_id', Auth::id())->where('book_id', $book_id)
                ->update(['quantity' => $this->quantity]);
        } else {
            $cart = Session::get('cart');
            $cart[$book_id] = $quantity;
            Session::put('cart');
        }
    }



    public function render()
    {
        return view('website.cart.item-component');
    }
}
