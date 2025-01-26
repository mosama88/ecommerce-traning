<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Discount;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('dashboard.categories.index')->with('success', __("category.createCategory"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $discounts = Discount::orderByDesc('id')->get();
        return view('dashboard.categories.show', compact('category', 'discounts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        session()->flash('success', 'Category has been Updated');
        return redirect()->route('dashboard.categories.index')->with('success', __("category.updateCategory"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Category has been deleted successfully.'
        ]);
    }

    public function addDiscount(Request $request, Category $category)
    {
        $request->validate(['discount_id' => 'required|exists:discounts,id']);
        $category->update(['discount_id' => $request->discount_id]);
        return redirect()->route('dashboard.categories.index')->with('success', __("category.addDiscount"));
    }
}    
// 