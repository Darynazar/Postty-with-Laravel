<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {  
       $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'username' => 'required',
           'password' => 'required',
       ]);

       $data = new User();
       $data->name = $request->name;
       $data->email = $request->email;
       $data->username = $request->username;
       $data->password = Hash::make($request->password);

       $data->save();

       auth()->attempt($request->only('email', 'password'));

       return redirect()->route('dashboard');

      
    }
}
