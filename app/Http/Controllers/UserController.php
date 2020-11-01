<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|max:191|unique',
            'password'=>'required|string|min:6',
            'type'=>'required|string',
            'bio'=>'nullable|string',
            'photo'=>'nullable|string'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->type = $request->input('type');
        $user->bio = $request->input('bio');
        $user->photo = $request->input('photo');
        $people->save();
        return response()->json('user created');
        // return User::create([
        //     'name'=>$request['name'],
        //     'email'=>$request['email'],
        //     'type'=>$request['type'],
        //     'bio'=>$request['bio'],
        //     'photo'=>$request['photo'],
        //     'password'=>Hash::make($request['password']), 
        // ]);
    }
}
