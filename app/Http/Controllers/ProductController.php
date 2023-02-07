<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Mergepi;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::paginate(5);
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

    // public function productDetails($id)
    // {
    //     $product = Product::where('id' , $id)->first();
    //     return response()->json($product);
    // }

    public function add()
    {
        $vendors = User::where('role' , 3)->get();
        $category = Category::all();
        $ingredient = Ingredient::all();
        $talue = array();
        $talue['name'] = null;
        $talue['caid'] = null;
        $talue['description'] = null;
        $talue['image'] = null;
        $talue['quantity'] = null;
        $talue['iquantity'] = null;
        $talue['unit_price'] = null;
        $talue['ingredients'] = null;
        $talue['vid'] = null;
        $talue['buyingPrice'] = null;
        $talue['sellingPrice'] = null;
        $cname = null;
        $vname = null;
        
        $caid = null;
        $vid = null;
        return view('product.productAdd', compact('vendors', 'category','talue','cname','vname','caid', 'vid','ingredient'));
    }

   
    public function postadd(Request $rqst)
    {
        //session()->forget('ingredientInfo');
         //dd(session()->get('ingredientInfo'));
        // $product = new Product;
        // $product->name = $rqst->name;
        // $product->image = $rqst->image;
        // $product->description = $rqst->description;
        // $product->quantity = $rqst->quantity;
        // $product->unit_price = $rqst->unit_price;
        // $product->caid = $rqst->caid;
        // $product->vid = $rqst->vid;
        // $product->save();
        // return redirect('/products');
         $value = session()->get('ingredientInfo');
        if($value)
        {
            $name = $rqst->name;
            $image = $rqst->image;
            $description = $rqst->description;
            $quantity = $rqst->quantity;
           
            $caid = $rqst->caid;
            $cname = Category::where('id',$caid)->first('name')->name;
            $vid = $rqst->vid;
            $vname = User::where('id',$vid)->first('name')->name;
            array_push(($value['ingredients']) ,  ['id'=> $rqst->id , 'iquantity' => $rqst->iquantity]);
            $arra = array();
            $total_price = 0 ;
            foreach($value['ingredients']  as $pro)
            {
            $pro["name"] = Ingredient::where('id' , $pro['id'])->first('name')->name;
            $pro["image"] = Ingredient::where('id' , $pro['id'])->first('image')->image; 
            $pro["total"] = (Ingredient::where('id' , $pro['id'])->first('price')->price) * $pro['iquantity'];  
            $total_price = $total_price + $pro["total"];
            array_push($arra , $pro);           
            }

            session()->put('ingredientInfo' , [
                'name'=> $name , 
                'caid' => $caid ,
                'description'=>$description,
                'buyingPrice'=>$total_price,
                'sellingPrice'=>$total_price+($total_price*.1),
                'image'=>$image, 
                'quantity' => $quantity ,
        
                'vid' => $vid , 
                'ingredients' => $arra
               ]);
        }
        else
        {
            $name = $rqst->name;
            $image = $rqst->image;
            $description = $rqst->description;
            $quantity = $rqst->quantity;
           
            $caid = $rqst->caid;
            $vid = $rqst->vid;
            $cname = Category::where('id',$caid)->first('name')->name;
            $vname = User::where('id',$vid)->first('name')->name;
            $ingredients = 
        [
          ['id'=> $rqst->id , 
          'iquantity' => $rqst->iquantity,
          'name' => Ingredient::where('id' , $rqst->id)->first('name')->name,
          'image' => Ingredient::where('id' , $rqst->id)->first('image')->image, 
          'total' => (Ingredient::where('id' , $rqst->id)->first('price')->price) * $rqst->iquantity]
        ];

        session()->put('ingredientInfo' , [
            'name'=> $name , 
                'caid' => $caid ,
                'description'=>$description,
                'image'=>$image, 
                'buyingPrice'=> $ingredients[0]['total'],
                'sellingPrice'=>($ingredients[0]['total']+($ingredients[0]['total']*.1)),
                'quantity' => $quantity ,
    
                'vid' => $vid , 
                'ingredients' => $ingredients
           ]);
        }
        
        $talue = session()->get('ingredientInfo');
        $vendors = User::where('role' , 3)->get();       
        $category = Category::all();
        $ingredient = Ingredient::all();
        return view('product.productAdd', compact('vendors', 'category','talue','cname','vname','name','caid','vid','ingredient'));


    }

    public function clearCart()
    {
        session()->forget('ingredientInfo');
      return redirect('/productAdd');
    }

    public function productCheckout(Request $rqst)
    {
       $product = new Product;
       $product->name = $rqst->name;
       $product->caid = $rqst->caid;
       $product->vid = $rqst->vid;
       $product->description = $rqst->description;
       $product->buyingPrice = $rqst->buyingPrice;
       $product->sellingPrice = $rqst->sellingPrice;
       $product->image = $rqst->image;
       $product->quantity = $rqst->quantity;
       $product->save();
       
       $ingredients = $rqst->ingredients;
       foreach($ingredients as $ingredient)
       {
        $mergepis = new Mergepi;
        $mergepis->pid = $product->id;
        $mergepis->inid = $ingredient['id'];
        $mergepis->quantity = $ingredient['iquantity'];
        $mergepis->price = $ingredient['total'];
        $mergepis->save();
       }
       session()->forget('ingredientInfo');
         return redirect('/products');
      
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $mergepis = Mergepi::where('pid' , $id)->get();
        foreach($mergepis as $mergepi)
        {
            $mergepi->delete();
        }
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

    public function productDetails(Request $rqst)
    {
       $id =  array_key_first($rqst->all());
       $product = Product::where('id' , $id)->first();
       //dd($product);
       $ingredients =  Mergepi::where('pid' , $id)->get();
       //dd($ingredients);
       $total_price = 0;
       foreach($ingredients as $ingredient)
       {
        $ingredient['name'] = Ingredient::where('id' , $ingredient['inid'])->first('name')->name;
        $ingredient['image'] = Ingredient::where('id' , $ingredient['inid'])->first('image')->image;
        $total_price =  $total_price+ $ingredient['price'];
       }
       //dd($ingredients);
       return view('product.productDetails', compact('ingredients', 'total_price'))->with('product' , $product);
    }
}
