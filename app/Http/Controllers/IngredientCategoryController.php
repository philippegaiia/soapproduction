<?php

namespace App\Http\Controllers;

use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class IngredientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientCategories = IngredientCategory::orderBy('code')->get();

        return view('ingredient_categories.index', compact('ingredientCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientCategory = new IngredientCategory();
        return view('ingredient_categories.create', compact('ingredientCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IngredientCategory::create($this->validateRequest());

        return redirect('ingredient_categories')->with('message' , 'Une nouvelle catégorie ingrédients a été créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IngredientCategory $ingredientCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IngredientCategory $ingredient_category)
    {
        return view('ingredient_categories.edit', compact('ingredient_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientCategory $ingredient_category)
    {
        $ingredient_category->update($this->validateRequest());

        return redirect('ingredient_categories')->with('message' , 'Une nouvelle catégorie ingrédients a été mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IngredientCategory  $ingredientCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngredientCategory $ingredientCategory)
    {
        $ingredientCategory->delete();

        return redirect('ingredient_categories');
    }

    private function validateRequest()
    {
        return request()->validate([
            'code' => 'required|min:2',
            'name' => 'required|min:5|max:50',
            'name_en' => 'required|min:5|max:50',
        ]);
    }
}
