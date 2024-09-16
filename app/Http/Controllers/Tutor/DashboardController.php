<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_coureses = Auth::user()->courses()->withCount('students', 'lectures')->get();
        return view('pages.tutor.dashboard', compact('user_coureses'));
    }
}
