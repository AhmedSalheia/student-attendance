<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutor;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    public function getCourses(Request $request)
    {
        $searchTerm = $request->input('q');

        $courses = Course::query()
            ->where('subject', 'LIKE', "%{$searchTerm}%")
            ->get(['id', 'subject']);

        return response()->json($courses);
    }

}
