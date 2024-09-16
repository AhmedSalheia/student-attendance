<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('pages.tutor.login');
    }

    // Process the login form submission
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::guard('tutor')->attempt($credentials)) {
            return to_route('tutor.dashboard')->withSucess('تمت العملية بنجاح');
        } else {
            Alert::error('Login Failed', 'Invalid credentials')->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    // Logout the admin
    public function logout()
    {
        Auth::guard('tutor')->logout();
        return redirect('/login');
    }
}
