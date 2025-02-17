<?php

namespace App\Livewire\WebSite\Cart;

use App\Models\Book;
use Livewire\Component;
use App\Models\ShippingArea;
use App\Models\BookInteraction;

class CartSummaryComponent extends Component
{
    public $books;
    public $cart;
    public $shipping_areas;
    public $total;


    function mount()
    {
        $this->shipping_areas = ShippingArea::select('id', 'fee', 'name')->get();
        $this->total = 0;
    }
    public function render()
    {
        return view('website.cart.cart-summary-component');
    }
}