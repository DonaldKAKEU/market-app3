<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Commercant;
use App\Models\Panier;
use App\Models\Product;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ProduitController extends Controller
{
    /* afficher tout les produits*/
    public function listeProduits()
    {
        $produits = Produit::all();
        //dd($produits);
        return view('produits.index', compact('produits'));
    }

    /* afficher la liste des produits disponibles*/
    public function afficher_produits_disponible(){
        $produits = Produit::where("validite", true);
        return view ('produits.disponible', compact('produits'));
    }

    public function comparerPrix($nomProduit)
    {
        $produits = Produit::where('libelle', $nomProduit)->get();
        return view('produits.comparer', ['produits' => $produits]);
    }

    public function view_comparer(Request $request){
        $nomProduit = $request->input('nomProduit');
        $produits = Produit::where('libelle', $nomProduit)->get();
        return view('produits.comparer', ['produits' => $produits] );
    }

    public function ajouterPanier(Request $request){ // resquest contient l'id du produit ajouté
        $produit = Produit::where("id", $request->input('produit_id'))->get();
        $user_id = Auth::id();


        $panier = Panier::where('user_id', Auth::id())->get();

        if($panier == null){
            $panier = new Panier();
        }

        else{

        }
        $user_id = Auth::id();
        $panier-> $request->input('produit_id');
        $panier-> $user_id;

        return view('produits.mon-panier', $produit);
    }
    
    public function passerCommande(Request $request){ // request l'id du panier et contient toutes les info du panier
    
    $produit = Produit::where("id", $request->input('produit_id'))->get();
    if ($produit->validite == false) {
        return response()->json(['error' => 'Produit en rupture de stock'], 400);
    }


else
    {
    $commande = new Commande();
    $user_id = Auth::id();
    $commande->user_id = $user_id;
    $commande->produit_id = $request->input('produit_id');
    $date_livraison = Produit::where('date_livraison', $produit->date_livraison);
    $prix = Produit::where('prix', $produit->prix);
        
    $commande->date_livraison = $date_livraison;
    $commande->prix_total = $prix;
    $commande->quantite = $request->input('quantite');
    $commande->livreur_id = $request->input('livreur_id');
    $commande->save();
    
    return redirect('/client.confirmation-commande');
    }
}

/*public function commanderProduit(Request $request)
{

    // Récupération des données de la commande
    $user_id = $request->input('user_id');
    $produit_id = $request->input('produit_id');
    $quantite = $request->input('quantite');
    $adresse_livraison = $request->input('adresse_livraison');

    // Recherche du produit
    $produit = Produit::findOrFail($produit_id);

    // Vérification de la disponibilité du produit
    if ($produit->stock < $quantite) {
        return response()->json(['error' => 'Produit en rupture de stock'], 400);
    }

    // Recherche du client
    $client = Client::findOrFail($client_id);

    // Vérification du solde du client
    if ($client->solde < $produit->prix * $quantite) {
        return response()->json(['error' => 'Solde insuffisant'], 400);
    }

    // Création de la commande
    $commande = new Commande();
    $commande->client_id = $client_id;
    $commande->produit_id = $produit_id;
    $commande->quantite = $quantite;
    $commande->prix_total = $produit->prix * $quantite;
    $commande->mode_livraison = $mode_livraison;
    $commande->adresse_livraison = $adresse_livraison;
    $commande->statut = 'en attente';
    $commande->save();

    // Mise à jour du stock du produit
    $produit->stock -= $quantite;
    $produit->save();

    // Attribution d'un livreur à la commande
    $livreur = Livreur::trouverLivreurDisponible();
    $commande->livreur_id = $livreur->id;
    $commande->save();

    // Retour de la réponse JSON avec les détails de la commande
    return response()->json
}
*/
    

    /*public function shop(Request $request){
        $produit_id = Produit::find($request->input("produit_id"));
        
        $commande = new Commande();
        $commande->statut_commande = false;
        $commande->statut_livraison = false;
        $commande->produits_id = $request->input("produit_id");
        $produit = Produit::where("id", $produit_id);
        $user = $produit->user;
        $userid = $user->id;
        $commande->user_id = $userid;
        $commande->save();
        
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
*/
    public function show($id)
    {
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }

    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);
        $produit->libelle = $request->input('libelle');
        $produit->prix = $request->input('prix');
        $produit->description = $request->input('description');
        $produit->validite = true;
        $produit->date_livraison = $request->input('date_livraison');
        $produit->appartenance = $request->input('appartenance');
        $produit->save();
        return redirect()->route('produits.index');
    }

    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return redirect()->route('produits.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $produits = Produit::where('libelle', 'LIKE', "%$query%")->get();
        return view('produits.index', compact('produits'));
    }

    public function filter(Request $request)
    {
        $category = $request->input('cathegorie');
        $products = Produit::where('cathegorie', '=', $category)->get();
        return view('produits.index', compact('produits'));
    }

    public function sort(Request $request)
    {
        $order = $request->input('order');
        $products = Produit::orderBy('libelle', $order)->get();
        return view('produits.index', compact('produits'));
    }

   public function publier_produit(Request $request){

    $produit = new Produit;
    $produit->libelle = $request->input('libelle');
    $produit->prix = $request->input('prix');
    $produit->description = $request->input('description');
    $produit->validite = true;
    $produit->date_livraison = $request->input('date_livraison');
    $produit->appartenance = $request->input('appartenance');
    $user_id = User::where("id", Auth::id());
    $commercant_id = Commercant::where("user_id", $user_id);
    $produit->commercant_id = $commercant_id;
    $produit->save(); 
    
    return redirect()->back()->with('success', 'Product added to cart successfully.');
   }

   public function creer_produit(){
    return view("produits.create");
   }
}