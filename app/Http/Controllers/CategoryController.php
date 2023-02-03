<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function view()
    {
        $products = Category::all();
        return view('category.categories')->with('products',$products);
    }

    public function addCategory()
    {
        return view('category.categoryAdd');
    }

    public function postaddCategory(Request $rqst)
    {
        $product = new Category;
        $product->name = $rqst->name;
        $product->image = $rqst->image;
        $product->description = $rqst->description;
        $product->save();
        return redirect('/categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories');
    }

    public function edit(Request $rqst)
    {
        $id =  array_key_first($rqst->all());
        $category = Category::find($id);
        //dd($category);
        return view('category.categoryEdit')->with('category',$category);
    }

    public function postedit(Request $rqst)
    {
        $product = Category::find($rqst->id);
        $product->name = $rqst->name;
        $product->image = $rqst->image;
        $product->description = $rqst->description;
        $product->update();
        return redirect('/categories');
    }
}
