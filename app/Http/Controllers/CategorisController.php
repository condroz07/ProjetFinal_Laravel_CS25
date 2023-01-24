<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use Illuminate\Http\Request;

class CategorisController extends Controller
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

    public function newCateg(Request $request){
        if (Categoris::all()->where('name', $request->name)->count() == 0) {
            $create = new Categoris();
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
     * @param  \App\Models\Categoris  $categoris
     * @return \Illuminate\Http\Response
     */
    public function show(Categoris $categoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoris  $categoris
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoris $categoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoris  $categoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoris $categoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoris  $categoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoris $categoris, $id)
    {
        $delete = Categoris::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'La couleur a été supprimer');
    }
}
