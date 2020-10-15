<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showloginform()
    {
        return view('Auth.adminlogin');
    }
    protected function credentials(Request $request)
    {
        return $request->only('username', 'password');
    }
    public function login(Request $request)
    {
       //validate the data
       
       $request->validate([
           'username' => ['required','string'],
           'password' => ['required','min:6'],

       ]);
       //dd($request->username);
       if(Auth::guard('admin')->attempt(
        $this->credentials($request)
       ))
       {
           return redirect()->intended(route('admin.dashboard'));
       }
       return redirect()->back()->withInput($request->only('username'));
    }
    public function logout()
    {
     Auth::guard('admin')->logout();
     return redirect(route('admin.login'));
    }

    
}
