<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comparateur de prix') }}
        </h2>
    </x-slot>
    <form action="{{ route('produits.comparer') }}" method="GET">
         @csrf
            <label for="nomProduit">Nom du produit :</label>
            <input type="text" name="nomProduit" id="nomProduit>
            <button type="submit" class="btn btn-primary">comparer</button>
    </form>

</x-app-layout>