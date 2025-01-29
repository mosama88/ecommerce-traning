<?php

namespace App\Http\Controllers\WebSite;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class WebSiteController extends Controller
{
    public function getBooks()
    {
        $categories = Category::get();
        $books = Book::orderByDesc('id')->paginate(10);
        return view('website.books', compact('books', 'categories'));
    }
}