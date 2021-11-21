<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Supplier;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class SupplierListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supplier $supplier)
    {
        $listing = new Listing();

        return view('suppliers.listings.create', compact('supplier', 'listing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Supplier $supplier)
    {

        $data = request()->validate([
            'ingredient_id' => 'required',
            'code' => 'nullable|max:6',
            'supplier_ref' => 'nullable|max:12',
            'name' => 'required',
            'pkg' => 'required',
            'unit_weight' => 'required|numeric',
            'organic' => 'required',
            'fairtrade' => 'required',
            'cosmos' => 'required',
            'active' =>'required',
            'infos' => 'nullable|max:1000',
        ]);

        $data['supplier_id'] = $supplier->id;

        $listing = Listing::create($data);

        return redirect()->route('suppliers.index')->with('message', 'Un ingrédient a été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
