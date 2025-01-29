<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ShippingArea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\shippingAreasRequest;

class ShippingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ShippingArea::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.shippingAreas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.shippingAreas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(shippingAreasRequest $request)
    {
        ShippingArea::create($request->validated());
        return redirect()->route('dashboard.shippingAreas.index')->with('success', __('shippingAreas.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingArea $shippingArea)
    {
        return view('dashboard.shippingAreas.show', compact('shippingArea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingArea $shippingArea)
    {
        return view('dashboard.shippingAreas.edit', compact('shippingArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(shippingAreasRequest $request, ShippingArea $shippingArea)
    {
        $shippingArea->update($request->validated());
        return redirect()->route('dashboard.shippingAreas.index')->with('success', __('shippingAreas.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingArea $shippingArea)
    {
        $shippingArea->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Shipping Area has been deleted successfully.'
        ]);
    }
}