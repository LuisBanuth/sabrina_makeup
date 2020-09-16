<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

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
        $categories = \App\ProductCategory::orderBy('name')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);
        $product = $this->product->create($data);
        $product->categories()->sync($categories);

        $photos = [];

        if($data['filepond'][0] !== null){
            foreach($data['filepond'] as $photo){
                $photo = $this->moveUploadedPhoto($photo, 'categoryphotos', 'tmp', 'public');
                $photo = [ 'path' => $photo];
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
        $categories = \App\ProductCategory::orderBy('name')->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $product = $this->product->find($product);
        $categories = $request->get('categories', null);
        $product->update($data);

        $photos = [];
        if($data['filepond'][0] !== null){
            foreach($data['filepond'] as $photo){
                $photo = $this->moveUploadedPhoto($photo, 'categoryphotos', 'tmp', 'public');
                $photo = [ 'path' => $photo];
                $product->photos()->create($photo);
            }
        }

        if(!is_null($categories))
            $product->categories()->sync($categories);


        flash('Produto alterado!');
        return redirect()->route('admin.products.index');
    }

    public function destroy($product)
    {
        $product = $this->product->find($product);
        $photos = \App\PhotoProduct::where('product_id', $product->id)->get();
        if($photos){
            foreach($photos as $photo){
                $photo->delete();
            }
        }
            
        $product->delete();

        flash('Produto deletado');
        return redirect()->route('admin.products.index');
    }

    public function deletePhoto(Request $request){
        $photo = $request->get('photo');
        $photo = \App\PhotoProduct::find($photo);
        $photo->delete();
        return  true;
    }
}
