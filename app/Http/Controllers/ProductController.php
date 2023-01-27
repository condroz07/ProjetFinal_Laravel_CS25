<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use App\Models\Couleur;
use App\Models\Cproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if (request('search')) {
            $search = Product::where('name', 'like', '%' . request('search') . '%')->get();
        } else {
            $search = Product::all();
        }
        $products = $query->paginate(9);

        $categoris = Categoris::all();
        $color = Couleur::all();
        $bestseller = Product::all()->where('quantite', '<=', '5');
        return view('pages.front.products.product', compact('categoris', 'color', 'bestseller', 'products', 'request'));
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $products = Product::where('name', 'LIKE', "%$request->search%")->get();
        } else {
            $products = Product::all();
        }

        $categoris = Categoris::all();
        $color = Couleur::all();
        $bestseller = Product::all()->where('quantite', '<=', '5');
        return view('pages.front.products.product', compact('categoris', 'color', 'bestseller', 'products', 'request'));
    }
    public function newProduct(Request $request)
    {
        $create = new Product();
        $create->name = $request->name;
        $create->quantite = $request->quantite;
        $create->categoris_id = $request->categoris_id;
        $create->couleur_id = $request->couleur_id;
        $create->prix = $request->prix;
        $create->src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        $create->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        if ($products->quantite === 0) {
            return redirect()->back()->with('danger', 'Se produit est hors stock');
        } else {
            $bestseller = Product::all()->where('quantite', '<=', '5');
            $comment = Cproduct::all();
            return view('pages.front.products.showProduct', compact('products', 'bestseller', 'comment'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Product::find($id);
        $update->quantite = $request->quantite;
        $update->save();
        return redirect()->back()->with('success', 'Vos modification on été enregistrer avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $delete = Product::find($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Le produit a été supprimer');
    }
}
