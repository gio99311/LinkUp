<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['showUser']),
        ];
    }
    public function showUser($username){
        
        return view('users.show');
    
    }

    public function publicUser($username)
    {
        $user = User::where('name', $username)->first();
        $links = $user->links()->with('category')->get();

        return view('users.publicUser', compact('user', 'links'));
    }

}
