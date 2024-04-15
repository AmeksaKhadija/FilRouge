<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
