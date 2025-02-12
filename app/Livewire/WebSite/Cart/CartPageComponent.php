<?php

namespace App\Livewire\WebSite\Cart;

use Livewire\Component;
use App\Models\ShippingArea;

class CartPageComponent extends Component
{

    public $books;
    public $books_sum;
    public $cart;
    public $shipping_areas;
    public $total;
    public function render()
    {
        $this->shipping_areas = ShippingArea::select("id", "name", "fee")->orderByDesc('id')->get();
        $this->total = 0;
        return view('website.cart.cart-page-component');
    }
}