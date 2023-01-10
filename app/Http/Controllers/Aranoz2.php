<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Aranoz2 extends Controller
{
    public function home(){
        $product = Product::orderBy('id', 'desc')->take(4)->get();
        $awesome = Product::all();
        $bestseller = Product::orderBy('id', 'desc')->take(5)->get();
        $solde = Product::orderBy('id', 'desc')->take(1)->get();
        $random = Product::all()->random(3);
        return view('pages.front.home', compact('product', 'awesome','bestseller', 'solde','random'));
    }

    public function blog(){
        return view('pages.front.blog');
    }

    public function contact(){
        return view('pages.front.contact');
    }

}