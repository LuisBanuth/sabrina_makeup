<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $highlights = \App\Product::where('frontpage', 1)->orderBy('position','DESC')->get();

        $products = \App\Product::orderBy('frontpage')->orderBy('position','DESC')->take(8)->get();
        return view('index', compact('highlights', 'products'));
    }

    public function products(){
        $products = \App\Product::orderBy('position')->paginate(12);
        return view('products.index', compact('products'));
    } 

    public function productSingle($slug){
        $product = \App\Product::where('slug', $slug)->First();
        return view('products.single', compact('product'));
    }

}
