<?php

namespace App\Http\Controllers\WebSite;

use App\Models\AddToCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart');
    }


    public function addItem($book_id, Request $request)
    {

        $quantity = $request->has('quantity') ? $request->get('quantity') : 1;
        if (Auth::check()) {
            AddToCart::updateOrCreate(['user_id' => Auth::id(), 'book_id' => $book_id], [
                'quantity' => $quantity
            ]);
        } else {

            $cart = Session::get('cart', []);
            $cart[$book_id] = $quantity;
            Session::put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Book Added To Cart Successfully');
    }
}
