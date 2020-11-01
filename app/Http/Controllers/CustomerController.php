<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return $customers;
        // return response()->json('customers loaded');
    }
    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|max:191|unique:customers',
            'password'=>'required|string|min:6',
            'type'=>'required|string',
            'bio'=>'nullable|string',
            'photo'=>'nullable|string'
        ]);
// return $request->password;
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->password);
        $customer->type = $request->input('type');
        $customer->bio = $request->input('bio');
        $customer->photo = $request->input('photo');
        $customer->save();
        return response()->json('customer created');
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
