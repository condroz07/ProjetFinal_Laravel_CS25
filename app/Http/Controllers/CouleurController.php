<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
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

    public function newColor(Request $request)
    {
        if (Couleur::all()->where('name', $request->name)->count() == 0) {
            $create = new Couleur();
            $create->name = $request->name;
            $create->save();
            return redirect()->back()->with('success', 'Nouvelle couleur crée');
        }else{
            return redirect()->back()->with('danger', 'Cette couleur existe déjà');
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
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function show(Couleur $couleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function edit(Couleur $couleur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couleur $couleur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Couleur  $couleur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couleur $couleur, $id)
    {
        $delete = Couleur::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'La couleur a été supprimer');
    }
}
