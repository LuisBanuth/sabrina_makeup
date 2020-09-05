<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index()
    {  
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = $this->product->create($data);
        $photos = [];

        if($data['filepond']){
            foreach($data['filepond'] as $photo){
                Storage::disk('public')->move('tmp/' . $photo, 'categoryphotos/' . $photo);
                $photo = [ 'path' => 'categoryphotos/' . $photo];
                $product->photos()->create($photo);
            }
        }
        //$product->photos()->createMany($photos);


        flash('Produto criado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
    }

    public function edit($product)
    {
        $product = $this->product->findOrFail($product);
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->product->find($product);
        $product->update($data);

        flash('Produto alterado!');
        return redirect()->route('admin.products.index');
    }

    public function destroy($product)
    {
        $product = $this->product->find($product);
        $product->delete();

        flash('Produto deletado');
        return redirect()->route('admin.products.index');
    }
}
