<?php

namespace App\Http\Controllers;

use App\Models\Cproduct;
use Illuminate\Http\Request;

class CproductController extends Controller
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
        $comment =  new Cproduct();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->products_id = $request->products_id;
        $comment->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cproduct  $cproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Cproduct $cproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cproduct  $cproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Cproduct $cproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cproduct  $cproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cproduct $cproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cproduct  $cproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cproduct $cproduct)
    {
        //
    }
}
