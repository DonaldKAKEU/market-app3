<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comparateur de prix') }}
        </h2>
    </x-slot>
    <div class="container">
		<h1>Rechercher un produit</h1>
		<!-- Formulaire de recherche -->
		<form method="post" class="form-inline" action="{{ route('produits.comparer-prix') }}" >
			<div class="form-group">
				@csrf
				<label for="nom-produit" class="sr-only">Nom du produit</label>
				<input type="text" class="form-control mb-2 mr-sm-2" id="nom-produit" name="nom-produit" placeholder="Nom du produit" required>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Rechercher</button>
		</form>
	</div>
	<!--	 section  d'affichage -->
	@if(isset($datas))
	<table class="table table-striped">
      <thead>
        <tr>
          <th>Nom du produit</th>
          <th>Nom du vendeur</th>
          <th>Prix</th>
          <th></th>
        </tr>
      </thead>
	  <tbody>
      @foreach($datas as $data)
        <tr>
          <td>{{ $data->libele }}</td>
          <td>{{ $data->commercant->name}}</td>
          <td>{{ $data->prix }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif


	<!-- Inclusion des scripts JS de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com
</x-app-layout>