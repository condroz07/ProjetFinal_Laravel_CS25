<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\categriblog;
use App\Models\Cblog;
use App\Models\Tag;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $tags = $request->input('tag');

        $query = Blog::query();
        if ($category) {
            $query->where('categriblogs_id', $category);
        }
        if ($tags) {
            $query->where('tags_id', $tags);
        }
        $blog = $query->paginate(4);

        $blogcateg = categriblog::all();
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();
        $item = Blog::all();
        $tag = Tag::all();
        return view('pages.front.blog.blog', compact('blog', 'blogcateg', 'request', 'recent', 'tag'));
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
        return view('pages.front.blog.blog', compact('blog', 'request', 'blogcateg', 'recent'));
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
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->src = $request->file('src')->hashName();
        Storage::put('/public', $request->file('src'));
        $blog->text = $request->text;
        $blog->text2 = $request->text2;
        $blog->text3 = $request->text3;
        $blog->categriblogs_id = $request->categriblogs_id;
        $blog->tags_id = $request->tags_id;
        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect()->back()->with('success','Blog create');
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
        $count = Cblog::all()->where("blogs_id", $blog->id);
        $comment2 = $count->count();
        return view('pages.front.blog.showBlog', compact('blog', 'recent', 'comment','comment2'));
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
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->text = $request->text;
        $blog->text2 = $request->text2;
        $blog->text3 = $request->text3;
        $blog->save();
        return redirect()->back()->with('success','Vos modification on été enregistrer avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id)
    {
        $delete = Blog::find($id);
        $delete->delete();
        
        return redirect()->back()->with('success', 'Le produit a été supprimer');
    }
}
