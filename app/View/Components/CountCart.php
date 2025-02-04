<?php

namespace App\View\Components;

use Closure;
use App\Models\AddToCart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CountCart extends Component
{
    public int $book_count;

    public function __construct()
    {
        if (Auth::check()) {
            $this->book_count = AddToCart::where('user_id', Auth::id())->count();
        } else {
            $cart = Session::get('cart', []); // تعيين القيمة الافتراضية كمصفوفة
            $cart = is_array($cart) ? $cart : []; // تأكيد أنه مصفوفة
            $this->book_count = count($cart);
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.count-cart');
    }
}
