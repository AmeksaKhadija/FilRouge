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

            $cartItem = new Cart();
            $cartItem->user_id = auth()->id();
            $cartItem->product_id = $productId;
            $cartItem->image_path= $request->image_path;

            $cartItem->save();

        session()->flash('success', 'le produit à été ajouter avec success');
        return redirect()->back();
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter des produits au panier.');
        }
    }


}
