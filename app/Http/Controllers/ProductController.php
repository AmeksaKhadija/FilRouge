<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{


    // l'affichage des produits
        public function list_products()
    {
        $produits = DB::table('products')
            ->join('categories', 'products.id_categorie', '=', 'categories.id')
            ->select('products.id', 'products.image_path', 'products.name', 'products.description', 'products.prix', 'categories.name as categories_name', 'products.tags')
            ->get();

        $categories = Category::all();

        return view('product.product', ['produits' => $produits, 'categories' => $categories]);
    }
    // l'ajout des produits
        public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $produit = new Product();
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->quantity = $request->quantity;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName;
        $produit->save();

        return redirect('/products');
    }

    // edit et update des produits
    public function edit_product($id){
        $product = Product::find($id);
        $categories= Category::all();
        return view('product.editproduct',compact('categories', 'product'));
    }

    public function update_product(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $produit = Product::find($request->id);
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->quantity = $request->quantity;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName;
        $produit->save();

        return redirect('/products');
    }

    // supprission des produits
        public function delete_product($id)
    {
        $produit = Product::find($id);
        $produit->delete();
        return redirect('/products');

    }

    // affichage de tous les produits
        public function allproducts()
    {

        $products = Product::all();
        View::composer(['index', 'layout'], function ($view) {
        $view;
    });
        $categories=Category::all();
         return view('index',compact('products','categories'));
    }



    // detail d'un produit
        public function show($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }


    // search

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', "%{$searchTerm}%")->get();
        $categories=Category::all();
        return view('search', compact('products','categories'));
    }

    public function filter(Request $request)
    {
        $selectedCategory = $request->input('categories');

        if ($selectedCategory) {
            $products = Product::where('id_categorie', $selectedCategory)->get();
        } else {
            $products = Product::all();
        }

        return view('filter', compact('products'));
    }

    }

