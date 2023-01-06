<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class Aranoz2 extends Controller
{
    public function home(){
        $product = Images::orderBy('id', 'desc')->take(4)->get();
        $awesome = Images::all();
        $bestseller = Images::orderBy('id', 'desc')->take(5)->get();
        $solde = Images::orderBy('id', 'desc')->take(1)->get();
        $random = Images::all()->random(3);
        return view('pages.front.home', compact('product', 'awesome','bestseller', 'solde','random'));
    }

    public function blog(){
        return view('pages.front.blog');
    }

    public function contact(){
        return view('pages.front.contact');
    }

    public function panier(){
        return view('pages.front.panier');
    }

}