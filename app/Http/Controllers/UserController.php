<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Cart;
// use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
        public function show_users()
    {
        $roles=Role::all();
        $users = User::leftJoin('roles', 'roles.id', '=', 'users.id_role')
        ->select('users.*', 'roles.name as role_name')
        ->whereNotNull('roles.id')
        ->orWhereNull('users.id_role')
        ->simplePaginate(3);
        return view('Users.index', compact('users','roles'));
    }

        public function makeAdmin(User $user)
    {
        $user->update(['role' => 'admin']);

        return redirect()->back()->with('success', 'Utilisateur promu administrateur avec succès.');
    }


        public function showCart()
    {
        // $user = Auth::user()->name;
        $products = Cart::where('user_id', auth()->id())->get();
        return view('Users.panier', compact('products'));
    }

        public function addToCart(Request $request)
    {
        if (auth()->check()) {
            $productId = $request->input('product_id');

            $prix = DB::table('products')
                ->join('cart', 'cart.product_id', '=', 'products.id')
                ->where('products.id', $productId)
                ->value('products.prix');

            $cartItem = new Cart();
            $cartItem->user_id = auth()->id();
            $cartItem->product_id = $productId;
            $cartItem->image_path = $request->image_path;
            // $cartItem->prix = $request->prix;
            $cartItem->save();


            session()->flash('success', 'Le produit a été ajouté avec succès');
            return redirect()->back()->with('prix', $prix);
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter des produits au panier.');
        }
    }


    public function save(Request $request)
    {
        $product = Cart::where('product_id', $request->idProduct)->first();
        $product->quantity= $request->qte;
        $product->save();
        return  redirect()->back();
    }

    public function retirerProdut($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();

            return redirect('/MonPanier');
        } else {
            return redirect('/MonPanier');
        }
    }


}
