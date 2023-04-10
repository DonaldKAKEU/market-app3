<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($produits as $produit)
                            <div class="max-w-xs mx-auto overflow-hidden shadow-lg rounded-lg">
                                
                                <div class="py-4 px-6">
                                    <h2 class="font-bold text-xl mb-2">{{ $produit->libelle }}</h2>
                                    <p class="text-gray-700 text-base">{{ $produit->description }}</p>
                                    <div class="mt-4 flex justify-between">
                                        <div class="font-bold text-xl">{{ $produit->prix }} €</div>
                                        <div >
                                            <form action="{{ route('produits.shop') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-blue font-bold py-2 px-4 rounded">Acheter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

