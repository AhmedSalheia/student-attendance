<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('pages.admin.login');
    }

    // Process the login form submission
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return to_route('admin.dashboard')->withSucess('تمت العملية بنجاح');
        } else {
            Alert::error('Login Failed', 'Invalid credentials')->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    // Logout the admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return to_route('admin.logout');
    }
}
