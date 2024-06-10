<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemCategoryResource;
use App\Http\Resources\ItemCategoryCollection;
use App\Models\ItemCategory;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return new ItemCategoryCollection(ItemCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemCategory::create($request->all());
        return response()->json([
		    'created' => true,
		]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ItemCategoryResource(ItemCategory::FindOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        // create try catch for errors
        $item_category = ItemCategory::FindOrFail($id);
        $item_category->update($request->all());
        return response()->json([
            'updated' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item_category = ItemCategory::FindOrFail($id);
        $item_category->delete();

  	    return response()->json(['delete' => true]);
    }
}
