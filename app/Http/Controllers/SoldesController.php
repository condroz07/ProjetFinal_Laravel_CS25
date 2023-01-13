<?php

namespace App\Http\Controllers;

use App\Mail\SoldeMail;
use App\Models\Soldes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SoldesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function sub(Request $request)
    {
        if (Soldes::all()->where('email', $request->email)->count() == 0) {
            $store = new Soldes();
            $store->email = $request->email;
            $store->products_id = $request->products_id;
            $store->save();
            Mail::to($request->email)->send(new SoldeMail);
            return back()->with('success', 'Merci nous vous avons envoyer un mail !');
        }else {
            return back()->with('danger', 'Vous avez déjà reçus un mail !');
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
     * @param  \App\Models\Soldes  $soldes
     * @return \Illuminate\Http\Response
     */
    public function show(Soldes $soldes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soldes  $soldes
     * @return \Illuminate\Http\Response
     */
    public function edit(Soldes $soldes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soldes  $soldes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soldes $soldes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soldes  $soldes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soldes $soldes)
    {
        //
    }
}
