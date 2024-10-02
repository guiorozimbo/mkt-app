<?php

namespace App\Http\Controllers\Admin;
use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function __construct(private Store $store)
  {

  }
  public function index()
  {
    $stores = $this->store->paginate(10);
    return view('admin.stores.index',compact('stores'));
  }
  public function create()
  {
    return view('admin.stores.create');
  }
  public function store(StoreFormRequest $request){
$user = auth()->user();
$user->store()->create($request->all());
   

   return redirect()->route(route: 'admin.stores.index')->with(key: 'sucesso',value: 'Loja criada com sucesso!');

  }
  public function edit(string $store)
  {
    $store= $this->store->findOrFail($store);

    return view('admin.stores.edit', compact('store'));
  }
  public function update(string $store, StoreFormRequest $request){
    $store= $this->store->findOrFail($store);
    $store->update($request->all());
     return redirect()->back();
  }

  public function destroy(string $store){

    $store= Store::findOrFail($store);
    $store->delete();

    return redirect()->back();
  }
}
