<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Formula;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formulas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formula = new Formula();
        $formula->start_date = now();
        // dd($formula);
        return view('formulas.create', compact('formula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formula = Formula::create($this->validateRequest());
        return redirect()->route('formulas.index', $formula->id)->with('message', 'Formule créee avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Formula $formula)
    {
        return view('formulas.show', compact('formula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formula = Formula::findOrFail($id);
        return view('formulas.edit', compact('formula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // $formula->update($this->validateRequest());
        $formula = Formula::findOrFail($id);
        $formula->update($this->validateRequest());
        return redirect()->route('formulas.show', $formula->id)->with('message', 'La formule '.$formula->name.' a été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formula $formula)
    {
         $formula->delete();

        return redirect('formulas')->with('message' , 'La formule '.$formula->name.' a été supprimée avec succès');
    }

     private function validateRequest(){

        return request()->validate([
            'code' => 'required|max:15',
            'ref_dip' => 'required|max:15',
            'name' => 'required|max:60',
            'start_date_for_editing' => 'date|required',
            'active' =>'required',
            'infos' => 'nullable|max:1000',
        ]);
    }
}
