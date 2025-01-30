<?php

namespace App\Livewire\WebSite;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class BookFilter extends Component
{

    use WithPagination;
    public $categories_id = [];

    #[Computed]
    public function categories()
    {
        return Category::has('books')->withCount('books')->get();
    }

    public function clear()
    {
        $this->reset('categories_id');
    }
    public function render()
    {
        $books = Book::filter(['category_id' => $this->categories_id])->orderByDesc('id')->paginate(10);
        return view('website.book-filter', compact('books'));
    }
}