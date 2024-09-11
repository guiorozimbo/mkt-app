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

   $stores= $this->store->paginate(5);

    return view('admin.stores.index',compact('stores'));
  }
  public function store(){
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
   //'whatsapp' => '+4008922',
  // ]);

//dump($store);

//Delete
//$store = Store::findOrFail(9);
//$store -> delete();
//dump($store);
  }
}
