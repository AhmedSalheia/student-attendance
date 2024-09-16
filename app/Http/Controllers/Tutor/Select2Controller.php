<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
