<?php

namespace App\Livewire\WebSite\Cart;

use Livewire\Component;

class CartListComponent extends Component
{

    public $books;
    public $cart;
    public function render()
    {
        return view('website.cart.cart-list-component');
    }
}