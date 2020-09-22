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

    public function singleProduct($slug){
        $product = \App\Product::where('slug', $slug)->First();
        return view('single.product', compact('product'));
    }
}
