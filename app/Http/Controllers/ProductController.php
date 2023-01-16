<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use App\Models\Couleur;
use App\Models\Cproduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->input('categoris');
        $color = $request->input('couleur');
        $search = $request->input('query');

        $query = Product::query();
        if ($category) {
            $query->where('categoris_id', $category);
        }
        if ($color) {
            $query->where('couleur_id', $color);
        }
        if(request('search')){
            $search = Product::where('name', 'like', '%' . request('search') . '%')->get();
        }else {
            $search = Product::all();
        }
        $products = $query->paginate(9);

        $categoris = Categoris::all();
        $color = Couleur::all();
        $bestseller = Product::all()->where('quantite', '<=', '5');
        return view('pages.front.product', compact( 'categoris', 'color', 'bestseller', 'products', 'request'));
    }

    public function search(Request $request)
    {
        if($request->search){
            $products = Product::where('name', 'LIKE', "%$request->search%")->get();
        }else {
            $products = Product::all();
        }

        $categoris = Categoris::all();
        $color = Couleur::all();
        $bestseller = Product::all()->where('quantite', '<=', '5');
        return view('pages.front.product', compact('categoris', 'color', 'bestseller','products', 'request'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $products = Product::find($id);
        $bestseller = Product::all()->where('quantite', '<=', '5');
        $comment = Cproduct::all();
        return view('pages.front.showProduct', compact('products', 'bestseller', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
