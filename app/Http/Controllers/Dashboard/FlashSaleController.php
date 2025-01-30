<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FlashSaleRequest;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FlashSale::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.flash_sales.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.flash_sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlashSaleRequest $request)
    {

        FlashSale::create(attributes: $request->validated());

        return redirect()->route('dashboard.flash_sales.index')->with('success', __('flash_sales.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashSale $flash_sale)
    {
        return view('dashboard.flash_sales.show', compact('flash_sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashSale $flash_sale)
    {
        return view('dashboard.flash_sales.edit', compact('flash_sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlashSaleRequest $request, FlashSale $flash_sale)
    {
        $flash_sale->update($request->validated());
        return redirect()->route('dashboard.flash_sales.index')->with('success', __('flash_sales.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashSale $flashSale)
    {
        $flashSale->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Flash Sale has been deleted successfully.'
        ]);
    }

    function search(Request $request)
    {
        $discounts = FlashSale::select("name", 'id')->whereLike('name', "%$request->q%")->limit(5)->get();
        return response()->json(['data' => ['discounts' => $discounts]]);
    }
}