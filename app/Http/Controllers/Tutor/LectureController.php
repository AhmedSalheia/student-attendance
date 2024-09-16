<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LectureController extends Controller
{
    public function index(Course $course = null)
    {
        if ($course) {
            if (!Gate::authorize('control-course', $course)) {
                abort(403);
            }
            $course = $course->load(['lectures' => function ($query) {
                $query->withCount('students');
            }]);
            $lectures = $course->lectures;
        } else {
            $lectures = Lecture::whereIn('course_id', \DB::table('teach')->select('teach.course_id')
                ->where('teach.tutor_id', Auth::id())->get()->pluck('course_id'))
                ->with('course')->withCount('students')->get();
        }

        return view('pages.tutor.lecture.index', compact('lectures', 'course'));
    }

    public function create($id = false)
    {
        $courses = Auth::user()->courses()->when($id, function ($query, $id) {
            $query->where('id', $id);
        })->get();
        return view('pages.tutor.lecture.create', compact('courses', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200|string',
            'description' => 'required|string',
            'course' => 'required|exists:courses,id',
            'room_number' => 'required|string|max:200',
        ]);

        if (!Gate::authorize('control-course', $request->course)) {
            abort(403);
        }

        $lecture = Lecture::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course'),
            'room_number' => $request->input('room_number'),
        ]);

        return redirect()->route('tutor.lecture.show', $lecture)->with('success', 'Course created successfully.');
    }

    public function edit(Lecture $lecture)
    {
        if (! Gate::allows('control-lecture', $lecture)) {
            abort(403);
        }
        return view('pages.tutor.lecture.edit', compact('lecture'));
    }

    public function update(Request $request, Lecture $lecture)
    {
        if (! Gate::allows('control-lecture', $lecture)) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|max:200|string',
            'description' => 'required|string',
            'course' => 'required|exists:courses,id',
            'room_number' => 'required|string|max:200',
        ]);

        $lecture->update($validatedData);
        return redirect()->route('tutor.lecture.index')->withSuccess('Lecture updated Successfully!');
    }

    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('tutor.lecture.index')->withSuccess('Lecture deleted Successfully!');
    }


    public function show(Lecture $lecture)
    {
        if (! Gate::allows('control-lecture', $lecture)) {
            abort(403);
        }
        $lecture = $lecture->load([
            'course' => function ($query) {
                $query->with('students')->withCount('students');
            },
            'students'
        ])->loadCount('students');

        $attende_student = $lecture->students;
        $absence_students = $lecture->course->students->reject(function ($student) use ($attende_student) {
            return $attende_student->contains('id', $student['id']);
        });
        return view('pages.tutor.lecture.show', compact('lecture', 'absence_students'));
    }

    function attende_student(Request $request, $id)
    {
        $lecture = Lecture::findOrFail($id);
        $request->validate([
            'student_attende' => 'required|exists:students,id',
        ]);
        $lecture->students()->syncWithoutDetaching([$request->student_attende]);
        return redirect()->back();
        // ->withSuccess('Task Created Successfully!');
    }

    function absence_student(Request $request, $id)
    {
        $lecture = Lecture::findOrFail($id);
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);
        $lecture->students()->detach([$request->student_id]);
        return redirect()->back();
    }

    function upload_file(Request $request, $id)
    {
        $lecture = Lecture::findOrFail($id);
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);
        $lecture->students()->detach([$request->student_id]);
        return redirect()->back();
    }
}
