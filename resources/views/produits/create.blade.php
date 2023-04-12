
    <div class="container">
        <h1>Creer un Produit</h1>

        <form method="GET" action="{{ route('produits.create') }}">
            @csrf



            <div class="form-group">
                <label for="libelle">libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="prix">prix</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            
            <div class="form-group">
                <label for="validite"></label>
                <input type="text" class="form-control" id="validite" name="validite" required>
            </div>
            
            <div class="form-group">
                <label for="cathegorie">cathegorie</label>
                <input type="number" class="form-control" id="cathegorie" name="cathegorie" required>
            </div>

           

            <div class="form-group">
                <label for="date_livraison">date de livraison</label>
                <input type="date" class="form-control" id="date_livraison" name="date_livraison" required>
            </div>
            
            <div class="form-group">
                <label for="appartenance">appartenance</label>
                <input type="text" class="form-control" id="appartenance" name="appartenance" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </form>
    </div>