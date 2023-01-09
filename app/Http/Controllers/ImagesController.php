<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use App\Models\Couleur;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupérez tous les paramètres de filtre de la requête
        $category = $request->input('categoris');
        $color = $request->input('couleur');

        // Construisez une requête de base de données qui sélectionne les produits qui correspondent aux critères de filtre
        $query = Images::query();
        if ($category) {
            $query->where('categoris_id', $category);
        }
        if ($color) {
            $query->where('couleur_id', $color);
        }

        $products = $query->paginate(9);

        // $produit = Images::paginate(9);
        $categoris = Categoris::all();
        $color = Couleur::all();
        $bestseller = Images::orderBy('id', 'desc')->take(5)->get();
        return view('pages.front.product', compact( 'categoris', 'color', 'bestseller', 'products', 'request'));
    }

    public function search(Request $request)
    {
        // Récupérez la requête de recherche de l'utilisateur
        $query = $request->input('query');

        // Effectuez la recherche des produits qui correspondent à la requête de l'utilisateur
        $products = Images::where('name',"%$query%")
            ->paginate(9);

        // Renvoyez les résultats de la recherche à la vue
        return view('pages.front.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
