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
        $books_sum = $books->sum(fn($book) => $book->price * ($cart[$book->id] ?? 0));

        return view('website.cart', compact('books', 'cart', 'books_sum'));
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


    // public function removeItem($book_id)
    // {
    //     if (Auth::check()) {
    //         // Delete item from database if user is logged in
    //         AddToCart::where('user_id', Auth::id())->where('book_id', $book_id)->delete();
    //     } else {
    //         // Handle cart in session if user is not logged in
    //         $cart = Session::get('cart', []);

    //         if (isset($cart[$book_id])) {
    //             unset($cart[$book_id]); // Remove item from session cart
    //             Session::put('cart', $cart); // Update session
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Book Deleted From Cart Successfully');
    // }
}