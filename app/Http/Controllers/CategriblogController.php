<?php

namespace App\Http\Controllers;

use App\Models\categriblog;
use Illuminate\Http\Request;

class CategriblogController extends Controller
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
        $new = new categriblog();
        $new->name = $request->name;
        $new->save();
        return redirect()->route('categBlog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categriblog  $categriblog
     * @return \Illuminate\Http\Response
     */
    public function show(categriblog $categriblog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categriblog  $categriblog
     * @return \Illuminate\Http\Response
     */
    public function edit(categriblog $categriblog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categriblog  $categriblog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categriblog $categriblog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categriblog  $categriblog
     * @return \Illuminate\Http\Response
     */
    public function destroy(categriblog $categriblog, $id)
    {
        $delete = categriblog::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'La couleur a été supprimer');
    }
}
