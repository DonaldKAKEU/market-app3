<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{

    public function index()
    {
        $produits = Produit::all();
        //dd($products);
        if ($produits->isEmpty()) {
            return view('produits.index');
        }
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $produit = new Produit();
        $produit->numero_produit = $request->input('numero_produit');
        $produit->libelle = $request->input('libelle');
        $produit->prix = $request->input('prix');
        $produit->description = $request->input('description');
        $produit->save();
        return redirect()->route('produits.index');
    }

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
        $produit->name = $request->input('name');
        $produit->price = $request->input('price');
        $produit->description = $request->input('description');
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
        $category = $request->input('category');
        $products = Produit::where('category', '=', $category)->get();
        return view('produits.index', compact('produits'));
    }

    public function sort(Request $request)
    {
        $order = $request->input('order');
        $products = Produit::orderBy('name', $order)->get();
        return view('produits.index', compact('produits'));
    }

   public function create2(Request $request, Request $id){

    $product = new Produit;
    $product->numero_produit = $request->numero_produit;
    $product->name = $request->libelle;
    $product->description = $request->description;
    $product->price = $request ->prix;
    $product->taille= $request ->taille;
    $product->poid = $request ->poid;
    $product->user_id = $id ->user_id;
    $product->save();   
   }

   public function deleteById(){
    
   }
}