<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;
use Sentinel;
class SessionController extends Controller
{
    
    public function login()
    {
        if($user=Sentinel::check())
        {
            return redirect('/home');
        }
        else
        {
            return view('Login');
        }
    }
    public function login_store(SessionRequest $request)
    {
        if($user=Sentinel::authenticate($request->all()))
        {
            return redirect()->intended('/home');//setelah login mau kemana
        }
        else
        {
            return view('Login');
        }
    }
    public function logout()
    {
        Sentinel::logout();
        return redirect('/log-in');
    }
}
