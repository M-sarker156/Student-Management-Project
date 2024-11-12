@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('/enrollments/' . $enrollments->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" value="{{ $enrollments->id }}" id="id" />
            
            <label for="enroll_no">Enroll No</label></br>
            <input type="text" name="enroll_no" id="enroll_no" value="{{ $enrollments->enroll_no }}" class="form-control"></br>
            
            <label for="batch_id">Batch</label></br>
            <input type="text" name="batch_id" id="batch_id" value="{{ $enrollments->batch_id }}" class="form-control"></br>
            
            <label for="student_id">Student</label></br>
            <input type="text" name="student_id" id="student_id" value="{{ $enrollments->student_id }}" class="form-control"></br>
            
            <label for="join_date">Join Date</label></br>
            <input type="text" name="join_date" id="join_date" value="{{ $enrollments->join_date }}" class="form-control"></br>

            <label for="fee">Fee</label></br>
            <input type="text" name="fee" id="fee" value="{{ $enrollments->fee }}" class="form-control"></br>

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop
