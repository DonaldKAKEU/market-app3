<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comparateur de prix') }}
        </h2>
    </x-slot>

    <div class="container">
		<h1>Rechercher un produit</h1>
		<!-- Formulaire de recherche -->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-inline">
			<div class="form-group">
				<label for="nom-produit" class="sr-only">Nom du produit</label>
				<input type="text" class="form-control mb-2 mr-sm-2" id="nom-produit" name="nom-produit" placeholder="Nom du produit" required>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Rechercher</button>
		</form>
		
		<?php
			// Traitement de la recherche
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Récupération des produits correspondants au nom saisi dans le formulaire
				$produits = [
					["nom" => "Produit 1", "prix" => 10.99, "vendeur" => "Vendeur 1"],
					["nom" => "Produit 2", "prix" => 5.99, "vendeur" => "Vendeur 2"],
					["nom" => "Produit 1", "prix" => 12.99, "vendeur" => "Vendeur 3"],
					["nom" => "Produit 3", "prix" => 8.99, "vendeur" => "Vendeur 4"],
					["nom" => "Produit 4", "prix" => 7.99, "vendeur" => "Vendeur 5"]
				];
				$nomProduit = htmlspecialchars($_POST["nom-produit"]);
				$produitsTrouves = array_filter($produits, function ($produit) use ($nomProduit) {
					return $produit["nom"] === $nomProduit;
				});
				
				// Affichage des résultats
				if (!empty($produitsTrouves)) {
					echo "<h2>Résultats de recherche pour : ".$nomProduit."</h2>";
					echo "<table class='table'>";
					echo "<thead><tr><th>Nom du produit</th><th>Prix</th><th>Vendeur</th></tr></thead>";
					echo "<tbody>";
					foreach ($produitsTrouves as $produit) {
						echo "<tr><td>".$produit["nom"]."</td><td>".$produit["prix"]." €</td><td>".$produit["vendeur"]."</td></tr>";
					}
					echo "</tbody></table>";
				} else {
					echo "<p>Aucun résultat trouvé pour : ".$nomProduit."</p>";
				}
			}
		?>
	</div>
	<!-- Inclusion des scripts JS de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com
</x-app-layout>