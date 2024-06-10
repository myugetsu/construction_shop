<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemFeedbackResource;
use App\Http\Resources\ItemFeedbackCollection;
use App\Models\ItemFeedback;

class ItemFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return new ItemFeedbackCollection(ItemFeedback::all());
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
        ItemFeedback::create($request->all());
        return response()->json([
		    'created' => true,
		]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ItemFeedbackResource(ItemFeedback::FindOrFail($id));
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
        $item_Feedback = ItemFeedback::FindOrFail($id);
        $item_Feedback->update($request->all());
        return response()->json([
            'updated' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item_Feedback = ItemFeedback::FindOrFail($id);
        $item_Feedback->delete();

  	    return response()->json(['delete' => true]);
    }
}
