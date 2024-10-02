<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
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
  public function create(Store $store, Category $category)
  {
    $categories = $category->all(['id','name']);
    $stores = $store->all(['id','name']);

    return view('admin.products.create', compact('stores','categories'));
  }
  public function store(ProductFormRequest $request, Store $store){
 $store = $store->findOrFail(($request->store));

$store->products()->create($request->except('store'));
    //$data = $request->all();
    //$data['store_id'] = $data['store'];

   //$product = $this->product->create($data);
    //$product->store->associate($store->findOrFail( $request->store));
    //$product->save();
   return redirect()->route( 'admin.products.index');

  }
  public function edit(string $product, Store $store)
  {
    $stores = $store->all(['id','name']);
    $product= $this->product->findOrFail($product);

    return view('admin.products.edit', compact('product','stores'));
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
