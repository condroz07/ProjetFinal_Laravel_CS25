<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use App\Models\Adresse;
use App\Models\Blog;
use App\Models\Categoris;
use App\Models\categriblog;
use App\Models\Cblog;
use App\Models\Contact;
use App\Models\Couleur;
use App\Models\Cproduct;
use App\Models\Favoris;
use App\Models\Product;
use App\Models\Roles;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Product::paginate(9);
        return view('pages.back.pages.products.products', compact('products'));
    }
    public function editProducts($id)
    {
        $products = Product::find($id);
        $bestseller = Product::all()->where('quantite', '<=', '5');
        $comment = Cproduct::all();
        return view('pages.back.pages.products.editProducts', compact('products', 'bestseller','comment'));
    }
    public function newProducts()
    {
        $color = Couleur::all();
        $categoris = Categoris::all();
        return view('pages.back.pages.products.newProducts', compact('color', 'categoris'));
    }

    public function allCateg(){
        $categoris = Categoris::paginate(5);
        return view('pages.back.pages.products.categoris.allcategoris', compact('categoris'));
    }

    public function newCateg(){
        return view('pages.back.pages.products.categoris.categoris');
    }

    public function allColor(){
        $color = Couleur::paginate(5);
        return view('pages.back.pages.products.color.allColor', compact('color'));
    }

    public function newColor(){
        return view('pages.back.pages.products.color.color');
    }

    public function blog(){
        $blog = Blog::paginate(9);
        return view('pages.back.pages.blog.blog', compact('blog'));
    }

    public function createBlog(){
        $categoris = categriblog::all();
        $tag = Tag::all();
        return view('pages.back.pages.blog.create', compact('tag','categoris'));
    }

    public function editBlog($id){
        $blog = Blog::find($id);
        $comment = Cblog::paginate(2);
        $recent = Blog::orderBy('id', 'desc')->take(4)->get();
        $count = Cblog::all()->where("blogs_id", $blog->id);
        $comment2 = $count->count();
        return view('pages.back.pages.blog.edit', compact('blog', 'comment', 'recent', 'comment2'));
    }

    public function cblog(){
        $categoris = categriblog::paginate(5);
        return view('pages.back.pages.blog.categoris.categoris', compact('categoris'));
    }

    public function newCategBlog(){
        return view('pages.back.pages.blog.categoris.newCategBlog');
    }

    public function tag(){
        $tag = Tag::paginate(5);
        return view('pages.back.pages.blog.tag.tag', compact('tag'));
    }
    
    public function newTagBlog(){
        return view('pages.back.pages.blog.tag.newTagBlog');
    }

    public function user(){
        $user = User::paginate(9);
        $role = Roles::all();
        return view('pages.back.pages.user.user', compact('user', 'role'));
    }

    public function editUser(Request $request, $id){
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->back()->with('success', 'Votre modification a été effectuer avec success');
    }

    public function contact(){
        $item = Adresse::find(1);
        return view('pages.back.pages.contact.contact', compact('item'));
    }

    public function favoris(){
        $favoris = Favoris::paginate(9);
        return view('pages.back.pages.favoris.favoris', compact('favoris'));
    }
    
    public function mail(){
        $mails = Contact::paginate(9);
    }
}
