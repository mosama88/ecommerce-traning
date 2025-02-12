<?php

namespace App\Livewire\WebSite\Cart;

use App\Models\ShippingArea;
use Livewire\Component;

class CartSummaryComponent extends Component
{
    public $shipping_areas;
    public $total;
    public function render()
    {
        $shipping_areas = ShippingArea::select("*")->orderByDesc('id')->get();
        return view('website.cart.cart-summary-component', compact('shipping_areas'));
    }
}
