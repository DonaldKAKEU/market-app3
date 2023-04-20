<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votre Panier') }}
        </h2>
    </x-slot>
    <div class="container">

        <table class="table table-striped">
            <thead>
            <tr>
            <th>Nom du produit</th>
            <th>Description</th>
            <th>Nom du vendeur</th>
            <th>Prix</th>
            <th></th>
            </tr>
        </thead>
        @foreach ($produits as $produit)
        <tbody>
            <tr>
            <td>{{ $produit->libelle }}</td>
            <td>{{ $produit->description }}</td>
            <td>{{$produit->commercant->name}}</td>
            <td>{{ $produit->prix }} $</td>
            </tr>
        </tbody>
        @endforeach
        </table>
    </div>
    <div class="container" >
            <form action="{{ route('produit.ajouter-panier') }}" method="GET">
                @csrf
                <td><button type="submit" class="btn btn-primary"><a href="produits/commandeValider">Passer la commande</button></a></td>
            </form>  
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>

