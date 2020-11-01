<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller
{   
    public function index(){
        $people = People::all();
        return response()->json('people loaded');
    }
    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'type'=>'required|string',
            'bio'=>'nullable|string',
            'photo'=>'nullable|string'
        ]);
// return $request->password;
        $people = new People();
        $people->name = $request->input('name');
        $people->email = $request->input('email');
        $people->password = Hash::make($request->password);
        $people->type = $request->input('type');
        $people->bio = $request->input('bio');
        $people->photo = $request->input('photo');
        $people->save();
        return response()->json('user created');
        // return People::create([
        //     'name'=>$request['name'],
        //     'email'=>$request['email'],
        //     'type'=>$request['type'],
        //     'bio'=>$request['bio'],
        //     'photo'=>$request['photo'],
        //     'password'=>Hash::make($request['password']), 
        // ]);
    }
}
