<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['authors'] = Author::get();
        $other['categories'] = Category::get();
        $other['publishers'] = Publisher::get();
        return view('dashboard.books.create', compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        if ($request->has('image')) {
            $book->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }
        return redirect()->route('dashboard.books.index')->with('success', __('books.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $other['authors'] = Author::get();
        $other['categories'] = Category::get();
        $other['publishers'] = Publisher::get();
        return view('dashboard.books.show', compact('book', 'other'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $other['authors'] = Author::get();
        $other['categories'] = Category::get();
        $other['publishers'] = Publisher::get();
        return view('dashboard.books.edit', compact('book', 'other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('dashboard.books.index')->with('success', __('books.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Book has been deleted successfully.'
        ]);
    }
}
