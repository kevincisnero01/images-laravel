<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {   
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    public function show(User $user)
    {   
        return view('users.show',['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create($validatedData);
        return redirect()->route('users.index')->with('sucess','Usuario creado con exito');
    }
}
