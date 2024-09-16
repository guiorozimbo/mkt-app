<?php

namespace App\Http\Controllers\Admin;
use App\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function __construct(private Store $store)
  {

  }
  public function index()
  {

   $stores= $this->store->paginate(15);

    return view('admin.stores.index',compact('stores'));
  }
  public function create()
  {
    return view('admin.stores.create');
  }
  public function store(Request $request){

   $this->store->create($request->all());

   return redirect()->route(route: 'admin.stores.index')->with(key: 'sucesso',value: 'Loja criada com sucesso!');
    // // Criar: Active Record
   // $store = new Store();
   // $store->name = 'loja exemplo';
   // $store->about = 'Contexto da loja';
    //$store->phone = '+4008922';
   // $store->whatsapp = '+4008922';
   // $store->description = 'descriçao da loja';

   // $store =  Store::findOrFail(7);
   // $store->name = 'loja exemplo 2';

  //dump($store);
  //$store->save();

  //============================
  //Mass assigment...
  //============================
 // $store = Store::create([
  //  'name' => 'loja exemplo 3',
   // 'about' => 'Contexto da loja',
   // 'phone' => '+4008922',
  //  'whatsapp' => '+4008922',
   // 'description' => 'descriçao da loja',
  //]);
        //$store = Store::findOrFail(9);
        //$store->update([
        //'name' => 'loja exemplo 3',
        //'about' => 'Contexto da loja 3',
        //'phone' => '+4008922',
        //'whatsapp::findOrFail(9);
      //$store -> delete();
//dump($store);
  }
  public function edit(string $store)
  {
    $store= $this->store->findOrFail($store);

    return view('admin.stores.edit', compact('store'));
  }
  public function update(string $store, Request $request){
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
