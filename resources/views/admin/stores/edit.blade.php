<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Loja') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <form action="{{route('admin.stores.update',['store'=>$store->id] )}}" method="POST">

@csrf
        <div class="w-full mb-6">
            <label for="name">Nome Loja</label>
            <input name="name" value="{{$store->name}}" id="name" class="w-full border border-gray-700 rounded bg-gray-900">
        </div>

        <div class="w-full mb-6">
            <label for="description">Descrição</label>
            <input name="description" value="{{$store->description}}" id="description"  class="w-full border border-gray-700 rounded bg-gray-900">
        </div>

        <div class="w-full mb-6">
            <label for="about">Sobre a Loja</label>
            <textarea name="about"id="about" rows="4" class="w-full border border-gray-700 rounded bg-gray-900">{{$store->about}}</textarea>
        </div>

        <div class="w-full mb-6">
            <label for="phone">Telefone (Fixo)</label>
            <input name="phone" value="{{$store->phone}}"  id="phone"  type="text" class="w-full border border-gray-700 rounded bg-gray-900">

        </div>

        <div class="w-full mb-6">
            <label for="whatsapp">Whatsapp / Celular</label>
            <input name="whatsapp" value="{{$store->whatsapp}}" id="whatsapp" type="text" class="w-full border border-gray-700 rounded bg-gray-900">
        </div>

        <button class="px-4 py-2 border border-green-900 bg-green-700 hover:bg-green-900 rounded transition duration-300 ease-in-out">Salvar</button>
</div>
    </form>
    </div>
    </div>
    </div>
</x-app-layout>
