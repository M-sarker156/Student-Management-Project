<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\view\view;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $courses = Course::pluck('name','id');
        return view('batches.create',compact('courses'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message','Teacher Addedd!');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id):view
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches',$batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):view
    {
        $batch = Batch::find($id);
        return view('batches.edit')->with('batches',$batch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $batch = Batch::find($id);
        $input = $request->all();
        $batch->update($input);
        return redirect('batches')->with('flash_message','Batch updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Batch::destroy($id);
       return redirect('batches')->with('flash_message','Teacher deleted!');
    }
}
