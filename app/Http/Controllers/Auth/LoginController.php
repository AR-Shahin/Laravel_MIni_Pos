<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use function back;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use function redirect;

class LoginController extends Controller
{
    public function index(){
        if(auth()->user()) return redirect()->back();
        return view('login.index');
    }
    public function LoginProcess(LoginRequest $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if ($admin->status == 3) {
            $this->setErrorMessageFront("Your account has blocked. Please contact with administrator!!");
            return redirect()->back();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('/');
            } else {
                return redirect('login')->withErrors(['Invalid username and password']);
            }
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
