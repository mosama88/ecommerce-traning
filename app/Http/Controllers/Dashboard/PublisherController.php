<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PublisherRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Publisher::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('dashboard.publishers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherRequest $request)
    {
        Publisher::create($request->validated());
        return redirect()->route('dashboard.publishers.index')->with('success', __('publishers.store_message'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('dashboard.publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('dashboard.publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->validated());
        return redirect()->route('dashboard.publishers.index')->with('success', __('publishers.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Publisher has been deleted successfully.'
        ]);
    }
}