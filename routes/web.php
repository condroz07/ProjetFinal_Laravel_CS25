
<?php

use App\Http\Controllers\Aranoz2;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategorisController;
use App\Http\Controllers\CategriblogController;
use App\Http\Controllers\CblogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\CproductController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SoldesController;
use App\Http\Controllers\TagController;
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

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/search', [ProductController::class, 'search']);

Route::get('/showProduct/{id}', [ProductController::class, 'show']);

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

Route::post('panier/changerQuantite/{id}', [PanierController::class, 'changerQuantite'])->name('panier.changerQuantite')->middleware('isGuest');

// Checkout

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('isGuest');

// code

Route::post('/checkout/code', [CheckoutController::class, 'applyDiscount'])->middleware('isGuest');

// order

Route::get('/order', [OrderController::class, 'index'])->name('order')->middleware('isGuest');
Route::post('/order', [OrderController::class, 'store'])->name('order-post')->middleware('isGuest');

//                      Back office

// dashboard

Route::get('/dashboard', [Aranoz2::class, 'dashboard'])->name('dashboard')->middleware('isGuest', 'isDash');

//                                    Products

Route::get('/allColor', [dashboardController::class, 'allColor'])->middleware('isGuest', 'isAdmin');
Route::get('/colorProducts', [dashboardController::class, 'newColor'])->middleware('isGuest', 'isAdmin');
Route::post('/newColor', [CouleurController::class, 'newColor'])->middleware('isGuest', 'isAdmin');
Route::delete('/deleteColor/{id}', [CouleurController::class, 'destroy'])->middleware('isGuest', 'isAdmin');

Route::get('/allCateg', [dashboardController::class, 'allCateg'])->middleware('isGuest', 'isAdmin');
Route::get('/categProducts', [dashboardController::class, 'newCateg'])->middleware('isGuest', 'isAdmin');
Route::post('/newCateg', [CategorisController::class, 'newCateg'])->middleware('isGuest', 'isAdmin');
Route::delete('/deleteCateg/{id}', [CategorisController::class, 'destroy'])->middleware('isGuest', 'isAdmin');


Route::get('/allProducts', [dashboardController::class, 'products'])->middleware('isGuest', 'isWebmaster');
Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy'])->middleware('isGuest', 'isAdmin');
Route::get('/newProducts', [dashboardController::class, "newProducts"])->middleware('isGuest', 'isWebmaster');
Route::post('/createProduct', [ProductController::class, 'newProduct'])->middleware('isGuest', 'isWebmaster');
Route::get('/editProducts/{id}', [dashboardController::class, 'editProducts'])->name('product.edit')->middleware('isGuest', 'isWebmaster');
Route::post('/updateProducts/{id}', [ProductController::class, 'update'])->name('product.edit')->middleware('isGuest', 'isWebmaster');

//                                        Blog

Route::get('/allBlog', [dashboardController::class, 'blog'])->middleware('isGuest', 'isMember')->name('allBlog');

Route::middleware(['auth', 'BlogPostAccess'])->group(function () {
    Route::get('/editBlog/{id}', [dashboardController::class, 'editBlog'])->name('blog.edit');
    Route::get('/createBlog', [dashboardController::class, 'createBlog'])->name('blog.create');
    Route::post('/createNewBlog', [BlogController::class, 'store'])->name('blog.create');
    Route::delete('/deleteBlog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
    Route::post('/updateBlog/{id}', [BlogController::class, 'update'])->name('blog.edit');
    Route::post('/validateBlog/{id}', [dashboardController::class ,'validateBlog'])->name('blog.validate');
});

// categoris blog

Route::get('/categBlog', [dashboardController::class, 'cblog'])->name('categBlog.index')->middleware('isGuest', 'isAdmin');
Route::get('/newCategBlog', [dashboardController::class, 'newCategBlog'])->middleware('isGuest', 'isAdmin');
Route::delete('/deleteCategBlog/{id}', [CategriblogController::class, 'destroy'])->middleware('isGuest', 'isAdmin');
Route::post('/newCategBlog', [CategriblogController::class, 'store'])->middleware('isGuest', 'isAdmin');

// Tag Blog

Route::get('/tagBlog', [dashboardController::class, 'tag'])->name('tag.index')->middleware('isGuest', 'isAdmin');
Route::get('/newTagBlog', [dashboardController::class, 'newTagBlog'])->middleware('isGuest', 'isAdmin');
Route::delete('/deleteTagBlog/{id}', [TagController::class, 'destroy'])->middleware('isGuest', 'isAdmin');
Route::post('/newTagBlog', [TagController::class, 'store'])->middleware('isGuest', 'isAdmin');

// User
Route::get('/user', [dashboardController::class, 'user'])->middleware('isGuest', 'isAdmin');

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::post('/editUser/{id}', [dashboardController::class, 'editUser'])->name('users.edit');
    Route::delete('/user/delete/{id}', [dashboardController::class, 'delUser'])->name('users.delete');
});

// Order

Route::get('/allOrder', [dashboardController::class, 'order'])->middleware('isGuest', 'isAdmin');
Route::post('/allOrder/{id}', [dashboardController::class, 'validateOrder'])->middleware('isGuest', 'isAdmin');
Route::delete('/deleteOrder/{id}', [dashboardController::class, 'deleteOrder'])->middleware('isGuest', 'isAdmin');

// contact
Route::get('/backContact/1', [dashboardController::class, 'contact'])->middleware('isGuest', 'isAdmin');
Route::post('/editContact/{id}', [ContactController::class, 'update'])->middleware('isGuest', 'isAdmin');

// favoris

Route::get('/favoris', [dashboardController::class, 'favoris'])->middleware('isGuest', 'isAdmin');

// MailBox

Route::get('/mailBox', [ContactController::class, 'mail'])->middleware('isGuest', 'isAdmin');
Route::delete('/mailBox/delete/{id}', [ContactController::class, 'destroy'])->middleware('isGuest', 'isAdmin');
Route::post('/mailBox/archiver/{id}', [ContactController::class, 'archiveMail'])->middleware('isGuest', 'isAdmin');
Route::get('/mailBox/{id}', [ContactController::class, 'showMail'])->name('show-mail')->middleware('isGuest', 'isAdmin');
Route::post('/mailBox/lu/{id}', [ContactController::class, 'vuMail'])->middleware('isGuest', 'isAdmin');
Route::get('/response/{id}', [ResponseController::class, 'index'])->middleware('isGuest', 'isAdmin');
Route::post('/sendResponse', [ResponseController::class, 'sendMail'])->middleware('isGuest', 'isAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
