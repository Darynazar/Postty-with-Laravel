<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    } 
    
    public function store()
    {
     auth()->logout();

     return redirect()->route('home');
    }
}
