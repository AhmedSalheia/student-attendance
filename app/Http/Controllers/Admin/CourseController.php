<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('pages.admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('pages.admin.courses.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'teacher_name' => 'required',
            'book_name' => 'required',
            'subject' => 'required',
            'room_number' => 'required',
        ]);

        // Create a new Course instance
        $course = Course::create($validatedData);

        // Redirect to the course index page with a success message
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('pages.admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'teacher_name' => 'required',
            'book_name' => 'required',
            'subject' => 'required',
            'room_number' => 'required',
        ]);

        $course->update($validatedData);
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
