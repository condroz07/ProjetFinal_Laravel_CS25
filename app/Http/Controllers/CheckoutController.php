<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Discount;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->panier->isEmpty() ){
            return redirect()->back()->with('danger', 'Votre panier est vide vous ne pouvez pas procéder au paiement');
        }else{
            $panier = Auth::user()->panier;
            $total = $panier->sum(function ($item) {
                return $item->products->prix * $item->quantite;
            });
            $code = Discount::where('code', $request->input('code'))->first();
            $order = rand(111111, 999999);
            return view('pages.front.checkout', compact('panier', 'total', 'code', 'order'));
        }
    }
    public function applyDiscount(Request $request)
    {
        $code = Discount::where('id', $request->input('discount'))->first();
        $panier = Auth::user()->panier;
        $total = $panier->sum(function ($item) {
            return $item->products->prix * $item->quantite;
        });
        if ($code == "MarouaneCoach" ){
            $cart = Panier::where('user_id', Auth::user()->id )->all();
            $cart->discount = 1;
            $cart->save();
            return redirect()->back()->with('success', 'Discount code applied successfully.');
        }else{
            return redirect()->back()->with('danger', 'Invalid discount code.');
        }
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
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
