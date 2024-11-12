<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Course;
use Illuminate\view\view;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        return view('courses.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message','courses Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $courses = Course::find($id);
        return view('courses.show')->with('courses',$courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $courses = Course::find($id);
        return view('courses.edit')->with('courses',$courses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $course = Course::find($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message','courses updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
       Course::destroy($id);
       return redirect('courses')->with('flash_message','courses deleted!');
    }
}
