<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $highlights = \App\Product::where('frontpage', 1)->get();
        $products = \App\Product::paginate(10);
        return view('index', compact('highlights', 'products'));
    }
}
