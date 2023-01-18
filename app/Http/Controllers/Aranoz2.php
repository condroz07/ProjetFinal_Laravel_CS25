<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Aranoz2 extends Controller
{
    public function home(){
        $product = Product::orderBy('id', 'desc')->take(4)->get();
        $awesome = Product::all();
        $bestseller = Product::all()->where('quantite', '<=', '5');
        $solde = Product::orderBy('id', 'desc')->take(1)->get();
        $random = Product::all()->random(3);
        return view('pages.front.home', compact('product', 'awesome','bestseller', 'solde','random'));
    }

    public function dashboard(){
        return view('pages.back.home.dashboard');
    }

}