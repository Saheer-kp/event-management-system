<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //return $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            dd('loged');
        }
        dd('failed');
        
    }
}
