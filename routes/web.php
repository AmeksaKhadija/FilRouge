<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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



// authentification
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registerpost', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login']);

// crud des produits
Route::get('/products', [ProductController::class, 'list_products'])->name('products');
Route::get('/editproduct/{id}', [ProductController::class, 'edit_product'])->name('editproduct/{id}');
Route::post('/updateproducts', [ProductController::class, 'update_product'])->name('updateproducts');
Route::post('/addproducts', [ProductController::class, 'addProduct'])->name('addproducts');
Route::get('/deleteproduct/{id}', [ProductController::class, 'delete_product'])->name('deleteproduct/{id}');

// crud des categories
Route::get('/categories', [CategoryController::class, 'list_categories'])->name('categories');
Route::post('/addcategory', [CategoryController::class, 'create_category'])->name('addcategory');
Route::post('/updateCategory', [CategoryController::class, 'update_category'])->name('updateCategory');
Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete_category'])->name('deletecategory/{id}');
Route::get('/editcategory/{id}', [CategoryController::class, 'edit_category'])->name('editcategory/{id}');

// affichage des utilisateurs et rendrent ils des admins
Route::get('/users', [UserController::class, 'show_users'])->name('users');
Route::post('/users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');

// index __ allproduct
Route::get('/allproducts', [ProductController::class, 'allproducts']);
// details d'un produit
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// others
Route::get('/resetwithemail/{token}', [AuthController::class, 'reset'])->name('resetwithemail');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
Route::get('/search', [ProductController::class, 'search']);
Route::get('/filter', [ProductController::class, 'filter']);









