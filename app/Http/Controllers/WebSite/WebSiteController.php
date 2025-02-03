<?php

namespace App\Http\Controllers\WebSite;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\AddToCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class WebSiteController extends Controller
{

    public function index()
    {
      

        return view('website.index');
    }

    public function getBooks()
    {
        $categories = Category::has('books')->withCount('books')->get();
        return view('website.books', compact('categories'));
    }
}