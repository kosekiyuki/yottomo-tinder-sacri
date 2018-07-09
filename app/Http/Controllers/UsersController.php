<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(30);
        
        return view('users.index', [
            'users' => $users,
        ]);   
    }
    
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    // like
    public function likings($id)
    {
        $user = User::find($id);
        $likings = $user->likings()->paginate(30);

        $data = [
            'user' => $user,
            'users' => $likings,
        ];

        $data += $this->counts($user);

        return view('users.likings', $data);
        
    }
}
