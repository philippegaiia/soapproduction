<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\IngredientCategory;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ingredients = Ingredient::orderBy('code')->get();
        // return view('ingredients.index', ['ingredients' => $ingredients]);

        return view('ingredients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = IngredientCategory::all();
        $ingredient = new Ingredient();
        return view('ingredients.create', compact('categories', 'ingredient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ingredient $ingredient)
    {

        $countIngredientsInCategory = Ingredient::withTrashed()->where('ingredient_category_id', $request->ingredient_category_id)->count();

        if ($countIngredientsInCategory > 0){
            $lastCodeInCategory = Ingredient::where('ingredient_category_id', $request->ingredient_category_id)->firstOrFail()->id;
            $codeCategory = Ingredient::findOrFail($lastCodeInCategory);
            $code = $codeCategory->ingredientCategory->code;
        } else {
            $categoryId = $request->ingredient_category_id;
            $codeCategory = IngredientCategory::findOrFail($categoryId);
            $code = $codeCategory->code;
        }

        // $lastIngredient = Ingredient::where('ingredient_category_id', $request->ingredient_category_id)->count();

        // if ($countIngredientsInCategory > 0){
        //     $lastCodeInCategory = Ingredient::where('ingredient_category_id', $request->ingredient_category_id)->firstOrFail()->id;
        //     $codeCategory = Ingredient::findOrFail($lastCodeInCategory);
        //     $code = $codeCategory->ingredientCategory->code;
        // } else {
        //     $categoryId = $request->ingredient_category_id;
        //     $codeCategory = IngredientCategory::findOrFail($categoryId);
        //     $code = $codeCategory->code;
        // }

        $data = request()->validate([
            // 'code' => "required|min:2|max:6|unique:ingredients,code,$ingredient->id",
            'name' => 'required|max:60',
            'name_en' => 'required|max:60',
            'inci' => 'required|max:60',
            'inci_koh' => 'max:60',
            'inci_naoh' => 'max:60',
            'cas' => 'max:40',
            'cas_einecs' => 'max:40',
            'einecs' => 'max:20',
            'ingredient_category_id' => 'required',
            'infos' => 'max:1000',
            'active' => 'required'
        ]);

        $data['code'] = $code . ($countIngredientsInCategory + 1);

        // dd($data);

        Ingredient::create($data);
        return redirect('ingredients')->with('message', 'L\'ingrédient '.$data['name'].' a bien été créé !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
         $categories = IngredientCategory::all();

         return view('ingredients.edit', compact('categories', 'ingredient'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        // dd($request);

        if($ingredient->ingredient_category_id != $request->ingredient_category_id) {

            $countIngredientsInCategory = Ingredient::withTrashed()->where('ingredient_category_id', $request->ingredient_category_id)->count();

            if ($countIngredientsInCategory > 0){
                $lastCodeInCategory = Ingredient::where('ingredient_category_id', $request->ingredient_category_id)->firstOrFail()->id;
                $codeCategory = Ingredient::findOrFail($lastCodeInCategory);
                $code = $codeCategory->ingredientCategory->code;
            } else {
                $categoryId = $request->ingredient_category_id;
                $codeCategory = IngredientCategory::findOrFail($categoryId);
                $code = $codeCategory->code;
            }
        }

        $data = request()->validate([
            //'code' => "required|min:2|max:6|unique:ingredients,code,$ingredient->id",
            'name' => 'required|max:60',
            'name_en' => 'required|max:60',
            'inci' => 'required|max:60',
            'inci_koh' => 'max:60',
            'inci_naoh' => 'max:60',
            'cas' => 'max:40',
            'cas_einecs' => 'max:40',
            'einecs' => 'max:20',
            'ingredient_category_id' => 'required',
            'infos' => 'max:1000',
            'active' => 'required'
        ]);

        if($ingredient->ingredient_category_id != $request->ingredient_category_id){
            $data['code'] = $code . ($countIngredientsInCategory + 1);
        }

        $ingredient->update($data);

        return redirect('ingredients')->with('message', 'L\'ingrédient a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect('ingredients')->with('message', 'L\'ingrédient a été effacé !');
    }

}
