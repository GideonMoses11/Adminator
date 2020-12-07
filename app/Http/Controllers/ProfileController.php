<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    // public function profile(){
    //     return auth('api')->user();
    // }

    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string',
            'experience'=>'required|string',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);
// return $request->password;
        $profile = new Profile();
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->experience = $request->input('experience');
        $profile->photo = $request->input('photo');
        if($request->has('photo')){
            $file = $request->file('photo');
            $file->move(public_path(). '/profilepics/', $file->getClientOriginalName());
            $url = URL::to( '/profilepics/'. $file->getClientOriginalName());
            $profile->photo = $url;

            //method2: naming the image
            // $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
            // ($request->photo, ';')))[1])[1];

            //then use image intervention
            //\Image::make($request->photo)->save(public_path('img/profile/').$name);
            }
        $profile->save();
        return response()->json('Profile created successfully');
    }

    public function edit($id){
        $profile = Profile::find($id);
        return $profile;

    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|max:191|unique:profiles',
            'experience'=>'required|string',
            'photo'=>'nullable|string'
        ]);
// return $request->password;
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->experience = $request->input('experience');
        $profile->photo = $request->input('photo');
        if($request->has('photo')){
            $file = $request->file('photo');
            $file->move(public_path(). '/profilepics/', $file->getClientOriginalName());
            $url = URL::to( '/profilepics/'. $file->getClientOriginalName());
            $investment->photo = $url;
            }
        $profile->update();
        return response()->json('Profile updated successfully');
    }
}
