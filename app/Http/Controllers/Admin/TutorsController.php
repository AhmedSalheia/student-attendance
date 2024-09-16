<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TutorsController extends Controller
{
    /**
     * Display a listing of the tutors.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tutors = Tutor::all();
        return view('pages.admin.tutors.index', compact('tutors'));
    }

    /**
     * Show the form for creating a new tutor.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.admin.tutors.create');
    }

    /**
     * Store a newly created tutor in the database.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:tutors',
            'password' => 'required',
        ]);

        $tutor = new Tutor();
        $tutor->name = $request->input('name');
        $tutor->phone = $request->input('phone');
        $tutor->password = \Hash::make($request->input('phone'));
        $tutor->save();
        $tutor->courses()->sync($request->input('course'));

        return redirect()->route('admin.tutors.index')->with('success', 'Tutor created successfully.');
    }

    /**
     * Show the form for editing the specified tutor.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id)->load('courses');
        // dd($tutor->courses);
        return view('pages.admin.tutors.edit', compact('tutor'));
    }

    /**
     * Update the specified tutor in the database.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'courses' => 'required|array|min:1',
            'courses.*' => 'required|integer|exists:courses,id',
        ]);

        $tutor = Tutor::findOrFail($id);
        $tutor->name = $request->input('name');
        $tutor->save();

        $tutor->courses()->sync($request->input('courses'));

        return redirect()->route('admin.tutors.index')->with('success', 'Tutor updated successfully.');
    }

    /**
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Tutor::destroy($id);
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor deleted successfully.');
    }
}
