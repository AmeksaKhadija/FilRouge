<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// index __ allproduct
Route::get('/allproducts', [ProductController::class, 'allproducts']);
// details d'un produit
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// search et filtrage
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/filter', [ProductController::class, 'filter'])->name('filter');

// authentification
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//  panier d'un utilisateur
Route::post('/add-to-cart', [UserController::class, 'addToCart'])->name('addToCart')->middleware('auth.check');
Route::get('/MonPanier',[UserController::class,'showCart'])->name('mon_panier')->middleware('auth.check');
Route::delete('/retirerProduct/{id}', [UserController::class, 'retirerProdut']);
Route::put('/panierer',[UserController::class,'save'])->name('save.qte');


//les taches de l'admin

// crud des produits
Route::get('/products', [ProductController::class, 'list_products'])->name('products')->middleware('auth.check');
Route::get('/editproduct/{id}', [ProductController::class, 'edit_product'])->name('editproduct/{id}')->middleware('auth.check');
Route::post('/updateproducts', [ProductController::class, 'update_product'])->name('updateproducts')->middleware('auth.check');
Route::post('/addproducts', [ProductController::class, 'addProduct'])->name('addproducts')->middleware('auth.check');
Route::get('/deleteproduct/{id}', [ProductController::class, 'delete_product'])->name('deleteproduct/{id}')->middleware('auth.check');
// crud des categories
Route::get('/categories', [CategoryController::class, 'list_categories'])->name('categories')->middleware('auth.check');
Route::post('/addcategory', [CategoryController::class, 'create_category'])->name('addcategory')->middleware('auth.check');
Route::post('/updateCategory', [CategoryController::class, 'update_category'])->name('updateCategory')->middleware('auth.check');
Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete_category'])->name('deletecategory/{id}')->middleware('auth.check');
Route::get('/editcategory/{id}', [CategoryController::class, 'edit_category'])->name('editcategory/{id}')->middleware('auth.check');
// affichage des utilisateurs et rendrent ils des admins
Route::get('/users', [UserController::class, 'show_users'])->name('users')->middleware('auth.check');
Route::post('/users/{user}/make-admin', [UserController::class,'makeAdmin'])->name('users.make-admin')->middleware('auth.check');
//affichage des statistiques
Route::get('/statistic', [ProductController::class, 'countProducts'])->name('statistic')->middleware('auth.check');






//molllie payment

Route::post('mollie', [CommandeController::class, 'mollie'])->name('mollie');
Route::get('success', [CommandeController::class, 'success'])->name('success');
Route::get('cancel', [CommandeController::class, 'cancel'])->name('cancel');

