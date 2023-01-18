<?php

namespace App\Http\Controllers;

use App\Models\Cproduct;
use App\Models\Product;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Product::all();
        return view('pages.back.pages.products.products', compact('products'));
    }
    public function editProducts($id)
    {
        $products = Product::find($id);
        $bestseller = Product::all()->where('quantite', '<=', '5');
        $comment = Cproduct::all();
        return view('pages.back.pages.products.editProducts', compact('products', 'bestseller','comment'));
    }

}
