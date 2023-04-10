
    <div class="container">
        <h1>Creer un Produit</h1>

        <form method="GET" action="{{ route('produits.store') }}">
            @csrf
            <div class="form-group">
                <label for="numero_produit">numero du produit</label>
                <input type="text" class="form-control" id="numero_produit" name="numero_produit" required>
            </div>
            
            
            
            <div class="form-group">
                <label for="libelle">libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>

            <div class="form-group">
                <label for="prix">prix</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="taille">taille</label>
                <input type="number" class="form-control" id="taille" name="taille" required>
            </div>
            
            <div class="form-group">
                <label for="poid">poid</label>
                <input type="number" class="form-control" id="poid" name="poid" required>
            </div>

            <div class="form-group">
                <label for="quantité">Quantité</label>
                <input type="number" class="form-control" id="quantité" name="quantité" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </form>
    </div>