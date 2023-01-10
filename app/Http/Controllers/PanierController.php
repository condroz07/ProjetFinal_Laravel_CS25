<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{

    public function index()
    {
        $panier = Auth::user()->panier;
        $total = $panier->sum(function ($item) {
            return $item->products->prix * $item->quantite;
        });
        return view('pages.front.panier', compact('panier', 'total'));
    }

    public function addProduct(Request $request, Product $product)
    {
        $user = Auth::user();

        $product = Product::find($request->products_id);

        $item = $user->panier->where('products_id', $product->id)->first();

        if($item) {
            $item->quantite += $request->quantite;
            $item->save();
        }else {
            $products = Product::find($request->products_id);
            $panier = new Panier;
            $panier->products_id = $request->products_id;
            $panier->quantite = $request->quantite;
            $panier->user_id = Auth::user()->id;
            $panier->save();
        }
        return back()->with('success', 'Le produit a été ajouté à votre panier !');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Panier::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Votre produit a été supprimer !');
    }
}
