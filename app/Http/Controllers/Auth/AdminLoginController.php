<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        // Attempt to log user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //If successful redirect to intended page
            return redirect()->intended(route('tests.index'));
        }

        //if unsuccessful redirect to login with form data
        return redirect()->back()->withInput($request->only('email','remember'));
        
    }

}
