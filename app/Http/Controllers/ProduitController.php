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

use function Pest\Laravel\get;

class ProduitController extends Controller
{
    /* afficher tout les produits*/
    public function listeProduits()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }


    public function listePanier(){
        $user_id = Auth::id();
       //dd($user_id);
        $panier = Panier::where("user_id", $user_id)->get();
      // dd($panier);
       if($panier== null){
        $produits = null;
       }
       else{
        $produits = Produit::where("panier_id", $panier->id)->get();
       }

       dd($panier);

        return view('produits.monPanier', compact('produits'));

    }





    /* afficher la liste des produits disponibles*/
    public function afficher_produits_disponible(){
        $produits = Produit::where("validite", true);
        dd($produits);
        return view ('produits.disponible', compact('produits'));
    }




    /*cette fonction permet de get les produit les produits qui ont le meme nom et renvoyer à la vue on afficheras ces produits et les prix pour les comparer*/
    public function comparerPrix( Request $nomProduit)
    {
        $datas = Produit::where('libelle', $nomProduit)->get("prix", "libele");
       // $commercant_id = Produit::where('libelle', $nomProduit)->get("commercant_id");
       // $nomCommercant = Commercant::where("id",$commercant_id )->get("name");

        //dd($datas);
        return view('produits.comparer', compact("datas"));
    }






    /**cette fonction renvois la vue qui permet de comparer les prix */
    public function view_comparer(){
        return view('produits.comparer' );
    }






    /**cette fonction est offerte au client et permet de d'ajouter un produit au panier */
    public function ajouter_panier(Request $request){ // resquest contient l'id du produit ajouté
        $produit = Produit::where("id", $request->input('produit_id'))->get();
        $user_id = Auth::id();


        $panier = Panier::where('user_id', Auth::id())->get();

        if($panier->isEmpty()){
            $panier = new Panier();
        }

        else{

        }
        $panier->produit_id = $request->input('produit_id');
        
        $panier-> $user_id;
        

        return view('produits.mon-panier', $produit);
    }
    


    /*cette fonction permet de passer une commande*/
    public function passerCommande(Request $request){ // request l'id du panier et contient toutes les info du panier
    
    $produit = Produit::where("id", $request->input('produit_id'))->get();
    if ($produit->validite == false) {
        return response()->json(['error' => 'Produit en rupture de stock'], 400);
    }

    else{
        
        $user_id = Auth::id();
        $date_livraison = Produit::where('date_livraison', $produit->date_livraison);
        $commande = new Commande();
        $commande->new($request);

    return redirect('/client.confirmation-commande');
    }
}



/**cette fonction permet de voir les detail d'un produit */
    public function show($id)
    {
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }


    /**renvois le produit à editer dans la vue edit */
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit'));
    }


  /** permet d'editer un produit admin/coommercant */  
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
        $products = Produit::orderBy('prix', $order)->get();
        return view('produits.index', compact('produits'));
    }

    /**admin/commercant */
   public function publier_produit(Request $request){

        $produit = new Produit;

                                                                     
        $user_id = User::where("id", Auth::id());
        $commercant_id = Commercant::where("user_id", $user_id);  /**je recupère le commercant associé à l'utilisateur connecté */

        /**je crée et save le produit dans la bd */
        $produit->new($request, $commercant_id);
        $produit->save(); 
    
        return redirect()->back()->with('success', 'Product added to cart successfully.');
   }

   /**cette fonction permet de renvoyer la vue qui permet de creer un produit, admin/commercant */
   public function creer_produit(){
        return view("produits.create");
   }
}