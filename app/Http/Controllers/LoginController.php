<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credential = $request->only('email', 'password');
            // dd($request->all());
            // dd($credential);
            if (Auth::attempt($credential)) {
                // return 'done';
                return redirect()->route('homepage');
            } else {
                return redirect()->back()->withErrors('Invalid Credentials !!!');
            }
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage')->with('success', 'Logged Out !!!');
    }
}
