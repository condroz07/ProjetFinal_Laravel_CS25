<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fav = new Favoris();
        $fav->products_id = $request->products_id;
        $fav->user_id = Auth::user()->id;
        $fav->save();

        return redirect()->back()->with('success', 'Vous avez ajouter cette éléments à vos favoris !');
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
     * @param  \App\Models\Favoris  $favoris
     * @return \Illuminate\Http\Response
     */
    public function show(Favoris $favoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favoris  $favoris
     * @return \Illuminate\Http\Response
     */
    public function edit(Favoris $favoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favoris  $favoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favoris $favoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favoris  $favoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favoris $favoris)
    {
        //
    }
}
