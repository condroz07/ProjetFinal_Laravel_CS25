
<?php

use App\Http\Controllers\Aranoz2;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CblogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CproductController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\newsletter;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoldesController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [Aranoz2::class, 'home'])->name('home');

// Favoris

Route::post('/favoris', [FavorisController::class, 'create'])->name('add.favoris')->middleware('isGuest');

// Newsletter

Route::post('/newsletter', [NewsletterController::class, 'sub'])->name('sub');

//Solde

Route::post('/solde', [SoldesController::class, 'sub'])->name('solde');

// Comment

// product
Route::post('/showProduct/comment', [CproductController::class, 'store'])->name('comment.product');

// blog

Route::post('/showBlog/comment', [CblogController::class, 'store'])->name('comment.blog');

//product 

Route::get('/product', [ProductController::class,'index'])->name('product-index');
Route::get('/product/search', [ProductController::class,'search']);

Route::get('/showProduct/{id}', [ProductController::class , 'show']);

// Blog

Route::get('/blog', [BlogController::class, 'index'])->name('blog-index');
Route::get('/blog/search', [BlogController::class, 'search']);

// blog Show

Route::get('/showBlog/{id}', [BlogController::class, 'show']);

// Contact

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/send', [ContactController::class, 'create'])->name('newContact');

// Panier 

Route::get('/panier', [PanierController::class, 'index'])->name('panier')->middleware('isGuest');
Route::post('/panier/ajouter', [PanierController::class, 'addProduct'])->name('panier.ajouter')->middleware('isGuest');

// Panier Delete

Route::delete('/panier/{id}', [PanierController::class, 'destroy'])->name('panier.vider')->middleware('isGuest');

//panier Changer la quantiter

Route::post('panier/changerQuantite/{id}',[PanierController::class, 'changerQuantite'])->name('panier.changerQuantite')->middleware('isGuest');

// Checkout

Route::get('/checkout', [CheckoutController::class, 'index']);

// code

Route::post('/checkout/code', [CheckoutController::class, 'applyDiscount']);

// order

Route::get('/order', [OrderController::class, 'index'])->middleware('isGuest');

//                      Back office

// dashboard

Route::get('/dashboard', [Aranoz2::class, 'dashboard'])->name('dashboard')->middleware('isDash');

// Products

Route::get('/allProducts', [dashboardController::class, 'products'])->middleware('isAdmin');
// editProduct
Route::get('/editProducts/{id}', [dashboardController::class, 'editProducts'])->middleware('isAdmin');
Route::post('/updateProducts/{id}', [ProductController::class, 'update'])->middleware('isAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';