<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->checkout->isEmpty()){
            return redirect()->back()->with('danger', 'Vous n\'avez pas encore fait de commande sur notre site');
        }else{
            $checkout = Checkout::all()->where('user_id', Auth::user()->id)->last();
            $order = Order::all()->where('user_id', Auth::user()->id)->last();
            $adresse = Adresse::all()->last();
            return view('pages.front.panier.order.order', compact('order', 'checkout', 'adresse'));
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
        $order = $request->input('order', false);
        $cart = Panier::where('user_id', Auth::user()->id)->get();

        if ($order) {

            Order::create([
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "adresse" => $request->adresse,
                "number" => $request->number,
                "city" => $request->city,
                "postale" => $request->postale,
                "order" => $request->order,
                "user_id" => $request->user_id
            ]);

            foreach ($cart as $item) {
                Checkout::create([
                    'user_id' => Auth::user()->id,
                    'products_id' => $item->products_id,
                    'quantite' => $item->quantite,
                    'order' => $request->order,
                    'order_id' => Order::latest()->first()->id
                ]);
            }


            Panier::where('user_id', Auth::user()->id)->delete();

            return redirect()->route('order');
        }else{
            return redirect()->back()->with('danger', 'Veuiller accepter les conditions avant de payer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
