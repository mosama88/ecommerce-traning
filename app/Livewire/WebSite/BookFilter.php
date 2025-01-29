<?php

namespace App\Livewire\WebSite;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;

class BookFilter extends Component
{
    public function render()
    {

        $categories = Category::has('books')->withCount('books')->get();
        $books = Book::orderByDesc('id')->paginate(10);

        return view('website.book-filter', compact('books', 'categories'));
    }
}