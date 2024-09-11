<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="font-bold text-left px-4 py-2">#</th>
                                <th class="font-bold text-left px-4 py-2">Loja</th>
                                <th class="font-bold text-left px-4 py-2">Criado em</th>
                                <th class="font-bold text-left px-4 py-2">Ações</th>
                                <th class="font-bold text-left px-4 py-2"></th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($stores as $store )
                        <tr>
                            <td class="font-normal px-4 py-2">{{$store->id}}</td>
                            <td class="font-normal px-4 py-2">{{$store->name}}</td>
                            <td class="font-normal px-4 py-2">{{$store->created_at->diffForhumans()}}</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><h3>Nenhum Item cadrastado...</h3></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-10">{{$stores->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
