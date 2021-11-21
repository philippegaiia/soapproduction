<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listing = new Listing();
        $suppliers = Supplier::all();
        return view('listings.create', compact('listing', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listing = Listing::create($this->validateRequest());

        return redirect()->route('listings.show', $listing->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $suppliers = Supplier::all();
        $ingredients = Ingredient::all();
        return view('listings.edit', compact('listing', 'ingredients', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Listing $listing)
    {
        $listing->update($this->validateRequest());
        return redirect()->route('listings.index')->with('message', 'Un listing a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
         $listing->delete();

        return redirect('listings');
    }

    private function validateRequest(){

        return request()->validate([
            'supplier_id' => 'required',
            'ingredient_id' => 'required',
            'code' => 'nullable|max:6',
            'supplier_ref' => 'nullable|max:24',
            'name' => 'required|max:60',
            'pkg' => 'required',
            'unit_weight' => 'required|numeric|max:20000',
            'organic' => 'required',
            'fairtrade' => 'required',
            'cosmos' => 'required',
            'cosmecert' => 'required',
            'active' =>'required',
            'infos' => 'nullable|max:1000',
        ]);
    }
}
