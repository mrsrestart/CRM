@extends('layouts.app')
@section('content')
    <form action="{{url('/reportCourseRegister')}}" method="post">
        @csrf
        <div class="col-md-12">
            <select name="courseId" id="courseId" class="form-control">
                @foreach($allCourse as $item)
                    <option value="{{ $item->id }}">{{ $item->courseName }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <input type="submit" name="submit" value="Report" class="btn btn-success">
        </div>
    </form>
@endsection
