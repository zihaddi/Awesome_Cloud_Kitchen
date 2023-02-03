<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::paginate(2);
        foreach($products as $product)
        {
            $vendor = User::where('id' , $product->vid)->first();
            $category = Category::where('id' , $product->caid)->first();
            $product['vendor_name'] = $vendor['name'];
            $product['category_name'] =  $category['name'];
           // dd($product);
        }
        return view('product.products')->with('products',$products);
    }

    public function productDetails($id)
    {
        $product = Product::where('id' , $id)->first();
        return response()->json($product);
    }

    public function add()
    {
        $vendors = User::where('role' , 3)->get();
       
        $category = Category::all();
        return view('product.productAdd', compact('vendors', 'category'));
    }

    public function postadd(Request $rqst)
    {
        // dd($rqst->all());
        $product = new Product;
        $product->name = $rqst->name;
        $product->image = $rqst->image;
        $product->description = $rqst->description;
        $product->quantity = $rqst->quantity;
        $product->unit_price = $rqst->unit_price;
        $product->caid = $rqst->caid;
        $product->vid = $rqst->vid;
        $product->save();
        return redirect('/products');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }

    public function edit(Request $rqst)
    {
        $id =  array_key_first($rqst->all());
        $product = Product::find($id);
        $category = Category::find($product->caid);
        $vendor = User::find($product->vid);
        return view('product.productEdit' , compact('vendor', 'category'))->with('product',$product);
    }

    public function postedit(Request $rqst)
    {
        
        $product = Product::find($rqst->id);
        $product->name = $rqst->name;
        $product->image = $rqst->image;
        $product->unit_price = $rqst->unit_price;
        $product->quantity = $rqst->quantity;
        $product->description = $rqst->description;
        $product->update();
        return redirect('/products');
    }

    public function addCategory()
    {
        return view('product.categoryAdd');
    }

    public function postaddCategory(Request $rqst)
    {
        $product = new Category;
        $product->name = $rqst->name;
        $product->image = $rqst->image;
        $product->description = $rqst->description;
        $product->save();
        return redirect('/products');
    }
}
