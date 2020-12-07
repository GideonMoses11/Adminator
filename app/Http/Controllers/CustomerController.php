<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:api');
    // }
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
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json('customer deleted successfully');
    }

    public function edit($id){
        $customer = Customer::find($id);
        return $customer;
        // return response()->json($customer);
    }

    // public function profile(){
    //     return auth('api')->user();
    // }

    public function update(Request $request, $id){
        // dd($request->all());
        $customer = Customer::find($id);
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|string|max:191|email',
            'password'=>'required|string|min:6',
            'type'=>'required|string',
            'bio'=>'nullable|string',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048'
        ]);
// // return $request->password;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->password);
        $customer->type = $request->input('type');
        $customer->bio = $request->input('bio');
        $customer->photo = $request->input('photo');
        if($request->has('photo')){
            $file = $request->file('photo');
            $file->move(public_path(). '/profilepics/', $file->getClientOriginalName());
            $url = URL::to( '/profilepics/'. $file->getClientOriginalName());
            $customer->photo = $url;
            }
        $customer->update();
    return ['message' => 'updated the customers info']; 
    }
}
