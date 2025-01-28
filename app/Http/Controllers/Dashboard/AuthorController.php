<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Author::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.authors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('dashboard.authors.index')->with('success', __('authors.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('dashboard.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('dashboard.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return redirect()->route('dashboard.authors.index')->with('success', __('authors.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Author has been deleted successfully.'
        ]);
    }
}