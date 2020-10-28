<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(auth()->user()) return redirect()->back();
        return view('login.index');
    }
    public function LoginProcess(LoginRequest $request)
    {
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect()->intended('/');
       }else{
        return redirect('login')->withErrors(['Invalid username and password']);
       }
    }
    public function Logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
