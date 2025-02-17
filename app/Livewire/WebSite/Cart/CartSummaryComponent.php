<?php

namespace App\Livewire\WebSite\Cart;

use App\Models\Book;
use Livewire\Component;
use App\Models\AddToCart;
use App\Models\ShippingArea;
use App\Models\BookInteraction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartSummaryComponent extends Component
{
    public $books;
    public $cart;
    public $shipping_areas;
    public $total;
    public $books_sum;


    function mount()
    {
        $this->shipping_areas = ShippingArea::select('id', 'fee', 'name')->get();
        if (Auth::check()) {
            $cart = AddToCart::where('user_id', Auth::id())->get();
            $bookIds = $cart->pluck('book_id')->toArray();
            $cart = $cart->mapWithKeys(fn($item) => [
                $item->book_id => $item->quantity
            ])->toArray();
        } else {
            $cart = Session::get('cart', []);
            $bookIds = array_keys($cart);
            $cart = collect($cart);
        }
        $books = Book::whereIn('id', $bookIds)->get();
        $this->books_sum = $books->sum(fn($book) => $book->price * ($cart[$book->id] ?? 0));
        $this->total = $this->books_sum +  ($this->books_sum * 4) / 100;
    }

    public function render()
    {
        return view('website.cart.cart-summary-component');
    }
}
