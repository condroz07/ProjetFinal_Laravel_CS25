<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\categriblog;
use App\Models\Cblog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->input('categoris');
        $search = $request->input('query');

        $query = Blog::query();
        if ($category) {
            $query->where('categriblogs_id', $category);
        }
        $blog = $query->paginate(4);

        $blogcateg = categriblog::all();
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();
        $item = Blog::all();
        return view('pages.front.blog', compact('blog', 'blogcateg', 'request', 'recent'));
    }

    public function search(Request $request, $id)
    {
        if($request->search){
            $blog = Blog::where('name', 'LIKE', "%$request->search%")->get();
        }else {
            $blog = Blog::all();
        }

        $blogcateg = categriblog::all();
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();
        $comment = Cblog::find($id)->count();
        return view('pages.front.blog', compact('blog', 'request', 'blogcateg', 'recent'));
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog, $id)
    {
        $blog = Blog::find($id);
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();
        $comment = Cblog::paginate(2);
        return view('pages.front.showBlog', compact('blog', 'recent', 'comment'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
