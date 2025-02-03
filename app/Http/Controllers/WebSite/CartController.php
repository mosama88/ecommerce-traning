<?php

namespace App\Http\Controllers\WebSite;

use App\Models\Book;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cart = AddToCart::where('user_id')->get();
        } else {
            $cart = Session::get('cart', []);
        }
        $books = Book::whereIn('id', array_keys($cart))->get();
        $books_sum = Book::whereIn('id', array_keys($cart))->sum('price');
        return view('website.cart', compact('books', 'books_sum'));
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



    public function removeItem($book_id)
    {
        if (Auth::check()) {
            $cart =  AddToCart::where('user_id', Auth::id())->where('book_id', $book_id)->delete();
        } else {
            $cart = Session::get('cart', []);
            unset($cart[$book_id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Book Deleted From Cart Successfully');
    }
}