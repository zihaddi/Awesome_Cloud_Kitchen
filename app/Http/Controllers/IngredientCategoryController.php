<?php

namespace App\Http\Controllers;

use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class IngredientCategoryController extends Controller
{
    public function view()
    {
        $icategories  = IngredientCategory::all();
        return view('ingredientCategory.categories')->with('icategories' , $icategories);
    }

    public function addIngredientCategoty()
    {
        return view('ingredientCategory.categoriesAdd');
    }

    public function postaddIngredientCategories(Request $rqst)
    {
       $icategories = new IngredientCategory;
       $icategories->name = $rqst->name;
       $icategories->image = $rqst->image;
       $icategories->description = $rqst->description;
       $icategories->save();
       return redirect('/ingredientCategories');
    }
}
