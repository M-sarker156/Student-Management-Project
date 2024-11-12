@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Page</div>
    <div class="card-body">
        <form action="{{ url('/students/' . $students->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" value="{{ $students->id }}" id="id" />
            
            <label for="name">Name</label></br>
            <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control"></br>
            
            <label for="address">Address</label></br>
            <input type="text" name="address" id="address" value="{{ $students->address }}" class="form-control"></br>
            
            <label for="mobile">Mobile</label></br>
            <input type="text" name="mobile" id="mobile" value="{{ $students->mobile }}" class="form-control"></br>
            
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop