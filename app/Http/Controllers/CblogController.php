<?php

namespace App\Http\Controllers;

use App\Models\Cblog;
use Illuminate\Http\Request;

class CblogController extends Controller
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
        $comment =  new Cblog;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->blogs_id = $request->blogs_id;
        $comment->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cblog  $cblog
     * @return \Illuminate\Http\Response
     */
    public function show(Cblog $cblog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cblog  $cblog
     * @return \Illuminate\Http\Response
     */
    public function edit(Cblog $cblog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cblog  $cblog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cblog $cblog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cblog  $cblog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cblog $cblog)
    {
        //
    }
}
