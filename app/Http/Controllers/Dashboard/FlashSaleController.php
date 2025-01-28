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
        return view('dashboard.flash_sale.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.flash_sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlashSaleRequest $request)
    {
        FlashSale::create($request->validated());

        return redirect()->route('dashboard.flash_sale.index')->with('success', __('flashSale.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashSale $flashSale)
    {
        return view('dashboard.flash_sale.show', compact('flashSale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashSale $flashSale)
    {
        return view('dashboard.flash_sale.edit', compact('flashSale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlashSaleRequest $request, FlashSale $flashSale)
    {
        $flashSale->update($request->validated());
        return redirect()->route('dashboard.flash_sale.index')->with('success', __('flashSale.update_message'));
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
            'message' => 'Category has been deleted successfully.'
        ]);
    }
}
