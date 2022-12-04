<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'image|max:2000'
        ]);


        if($request->hasFile('image')) {
            $filename = $request->image->store('/','avatars');
            //"V3hbrQrg31bO1b7MwXGGrRktdQpq9GOUXbWsCr7y.jpg"
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $filename
        ]);

        return redirect()->route('users.index')->with('sucess','Usuario creado con exito');
    }
}
