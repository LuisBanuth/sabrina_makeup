<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCategoryRequest;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    protected $category;
    public function __construct(ProductCategory $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->paginate(10);
        return view('admin.product_category.index', compact('categories'));
    }

    public function create(){
        return view('admin.product_category.create');
    }

    public function store(ProductCategoryRequest $request){
        $data = $request->all();
        $this->category->create($data);

        flash('Categoria criada!')->success();
        return redirect()->route('admin.categories.products.index');
    }

    public function destroy($category){
        $category = $this->category->find($category);
        $category->delete();

        flash('Categoria removida com sucesso')->success();
        return redirect()->route('admin.categories.products.index');
    }
}
