@extends('layout')
@section('content')
<div class="card">
    <div class="card-header"><h2>Teachers Page</h2></div>
    <div class="card-body">
        <form action="{{ url('/teachers') }}" method="post">
            {!! csrf_field() !!}
            <label>Name</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>
            <label>Address</label></br>
            <input type="text" name="address" id="address" class="form-control"></br>
            <label>Mobile</label></br>
            <input type="text" name="mobile" id="moblie" class="form-control"></br>
            <input type="submit" value="save" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop