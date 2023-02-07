<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function view()
    {
        $ingredients  = Ingredient::all();
        foreach($ingredients as $ingredient)
        {
            $ingredient['category'] = IngredientCategory::where('id' ,  $ingredient['cid'] )->first(['name'])->name;
           
        }
        return view('ingredient.ingredients')->with('ingredients', $ingredients);
    }

    public function addIngredient()
    {
        $icategories = IngredientCategory::all();
        
        return view('ingredient.ingredientsAdd')->with('icategories' , $icategories);
    }

    public function postaddIngredient(Request $rqst)
    {
         //  dd($rqst->all());
            $ingredient = new Ingredient;
            $ingredient->name = $rqst->name;
            $ingredient->cid = $rqst->cid;
            $ingredient->image = $rqst->image;
            $ingredient->quantity = $rqst->quantity;
            $ingredient->price = $rqst->price;
            $ingredient->save();
           
        
        //$ingredient->save();
        return redirect('/ingredients');
    }
}
