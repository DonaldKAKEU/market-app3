@extends('layouts.app')

@section('content')
    <h1>Liste des produits</h1>

    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

    <form action="{{ route('produits.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher un produit...">
            <button type="submit" class="btn btn-outline-secondary">Rechercher</button>
        </div>
    </form>

    <form action="{{ route('produits.filter') }}" method="GET" class="mb-3">
        <div class="input-group">
            <select name="category" class="form-control">
                <option value="">Toutes les catégories</option>
                <option value="Electronics">Electronics</option>
                <option value="Books">Books</option>
                <option value="Clothing">Clothing</option>
            </select>
            <button type="submit" class="btn btn-outline-secondary">Filtrer</button>
        </div>
    </form>

    <form action="{{ route('produits.sort') }}" method="GET" class="mb-3">
        <div class="input-group">
            <select name="order" class="form-control">
                <option value="asc">Ordre alphabétique croissant</option>
                <option value="desc">Ordre alphabétique décroissant</option>
            </select>
            <button type="submit" class="btn btn-outline-secondary">Trier</button>
        </div>
    </form>

   @if(count($produits) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->libelle }}</td>
                        <td>{{ $produit->prix }} €</td>
                        <td>{{ $produit->description }}</td>
                        <td>{{ $produit->taille }}</td>
                        <td>
                            <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('produits.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun produit n'a été trouvé.</p>
    @endif
@endsection
