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
     
        return view('website.books');
    }
}