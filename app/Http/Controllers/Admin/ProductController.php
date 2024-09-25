<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(private Product $product)
  {

  }
  public function index()
  {
    $products = $this->product->paginate(10);
    return view('admin.products.index',compact('products'));
  }
  public function create()
  {
    return view('admin.products.create');
  }
  public function store(ProductFormRequest $request){

   $this->product->create($request->all());

   return redirect()->route(route: 'admin.stores.index')->with(key: 'sucesso',value: 'Loja criada com sucesso!');

  }
  public function edit(string $product)
  {
    $product= $this->product->findOrFail($product);

    return view('admin.products.edit', compact('products'));
  }
  public function update(string $product, ProductFormRequest $request){
    $product= $this->product->findOrFail($product);
    $product->update($request->all());
     return redirect()->back();
  }

  public function destroy(string $store){

    $store= $this->product::findOrFail($store);
    $store->delete();

    return redirect()->back();
  }
   }
