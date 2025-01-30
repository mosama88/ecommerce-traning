<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Discount::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.discounts.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        Discount::create($request->validated());

        return redirect()->route('dashboard.discounts.index')->with('success', __('discount.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return view('dashboard.discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());
        return redirect()->route('dashboard.discounts.index')->with('success', __('discount.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Category has been deleted successfully.'
        ]);
    }



    public function checkCode(Request $request)
    {
        $discount = Discount::where('code', $request->code)->count();
        return response()->json(['data' => ['is_exist', $discount]]);
    }


    public function search_category(Request $request)
    {
        $discounts = Discount::where('code', 'LIKE', '%' . $request->q . '%')->orWhere('percentage', 'LIKE', '%' . $request->q . '%')->limit(5)->get();
        return response()->json(['data' => $discounts]);
    }


    public function search(Request $request)
    {
        $discounts = Discount::where('code', 'LIKE', '%' . $request->q . '%')
            ->orWhere('percentage', 'LIKE', '%' . $request->q . '%')
            ->limit(5)
            ->get();

        return response()->json(['data' => ['discounts' => $discounts]]);
    }
}