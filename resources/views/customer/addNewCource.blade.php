@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/createCourse')}}">
        <div class="form-group">
            <label for="fullName">Name</label>
            <input type="text" placeholder="Course Name" name="csName" id="csName" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea type="text" placeholder="Add Comment" name="comment" id="comment" class="form-control"></textarea>
        </div>

        <div class="col-md-12">

            <input type="submit" name="submit" value="Add New Customer" class="btn btn-success">
        </div>
        {{csrf_field()}}
    </form>
@endsection
