
<?php

use App\Http\Controllers\Aranoz2;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//product 

Route::get('/product', [ProductController::class,'index'])->name('product-index');
Route::get('/product/search', [ProductController::class,'search']);

Route::get('/showProduct/{id}', [ProductController::class , 'show']);

// Blog

Route::get('/blog', [Aranoz2::class, 'blog']);

// Contact

Route::get('/contact', [Aranoz2::class, 'contact']);

// Panier 

Route::get('/panier', [PanierController::class, 'index'])->name('panier')->middleware('isGuest');
Route::post('/panier/ajouter', [PanierController::class, 'addProduct'])->name('panier.ajouter')->middleware('isGuest');

Route::delete('/panier/{id}', [PanierController::class, 'destroy'])->name('panier.vider');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
