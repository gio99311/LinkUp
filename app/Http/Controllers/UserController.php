<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser($username){
        $user = User::where('name', $username)->first();
        $links = $user->links()->with('category')->get();

        return view('users.show', compact('user', 'links'));
    
    }
}
