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
            'users' => User::latest()->paginate(10)
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
        }else{
            $filename = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $filename
        ]);

        return redirect()->route('users.index')->with('status','Usuario creado con exito');
    }

    public function edit(User $user)
    {
        return view('users.edit',[ 'user' => $user]);
    }
    public function update(Request $request,User $user)
    {
        if($request->hasFile('image')) {
            //Get current image from database
            $photo = $user->photo; 

            //Save the new image to the directory
            $filename = $request->image->store('/','avatars');

            //Delete the current image to the directory
            if(Storage::disk('avatars')->exists($photo)) {
                Storage::disk('avatars')->delete($photo);
            }

            //Update new image in the database
            $user->photo = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.edit',$user->id)->with('status','Usuario actualizado con exito');
    }

    public function destroy(User $user)
    {
        if($user->photo){
            //Get current image from database
            $photo = $user->photo; 
            //Delete the current image to the directory
            if(Storage::disk('avatars')->exists($photo)) {
                Storage::disk('avatars')->delete($photo);
            }
        }

        $user->delete();

        return redirect()->route('users.index')->with('status','Usuario eliminado con exito');
    }
}
