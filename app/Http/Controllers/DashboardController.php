<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        // $categoryTime = Category::where('id',1)->get(['created_at']);
        // //dd($categoryTime);
        // $timestamp = (strtotime($categoryTime));
        // $date = date('d:m:y', $timestamp);
        //  $time = date('h:m:s', $timestamp);
        // dd($date); 
        return view('dashboards.dashboards' , compact('users','products','categories'));
    }
}
