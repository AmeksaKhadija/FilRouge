<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function makeAdmin(User $user)
    {
        $userid=$user->id;
        User::where('id', $userid)->update(['id_role' => 1]);

        return redirect()->back()->with('success', 'Utilisateur promu administrateur avec succès.');
    }


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



    public function showCart(Request $request)
    {
        $userId = Auth::user()->id;

        $items = DB::table('products')
                ->join('cart', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->get();

        $totalItem = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->selectRaw('products.prix * cart.quantity as total_item, products.prix, cart.quantity')
                ->get();

        $totalGlobal = $totalItem->sum('total_item');

        return view('Users.panier', compact('items','totalGlobal'));
    }

        public function addToCart(Request $request)
    {
        if (auth()->check()) {
            $productId = $request->input('product_id');

            $cartItem = new Cart();
            $cartItem->user_id = auth()->id();
            $cartItem->product_id = $productId;
            $cartItem->image_path = $request->image_path;
            $cartItem->save();


            session()->flash('success', 'Le produit a été ajouté avec succès');
            return redirect()->back();
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter des produits au panier.');
        }
    }


    public function save(Request $request)
    {
        $iduser=auth()->id();
        $product = Cart::where('product_id', $request->idProduct)->where('user_id' , $iduser)->first();

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
