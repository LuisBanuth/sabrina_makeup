<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $highlights = \App\Product::where('frontpage', 1)->orderBy('position','DESC')->get();

        $products = \App\Product::orderBy('frontpage')->orderBy('position','DESC')->take(6)->get();
        return view('index', compact('highlights', 'products'));
    }

    public function products(){
        $products = \App\Product::orderBy('position', 'DESC')->paginate(12);
        return view('products.index', compact('products'));
    } 

    public function productSingle($slug){
        $product = \App\Product::where('slug', $slug)->First();
        return view('products.single', compact('product'));
    }

    public function productFilterCategory($category){
        $products = \App\Product::select('products.*')->join('product_product_category', 'product_product_category.product_id', '=', 'products.id')
                                    ->join('product_categories', 'product_categories.id', '=', 'product_product_category.product_category_id')
                                    ->where('product_categories.id', $category)->orderBy('position', 'DESC')->paginate(12);

        $category = \App\ProductCategory::select('name')->find($category);
        return view('products.index', compact('products', 'category'));
    }

}
