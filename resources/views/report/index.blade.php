@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-danger" style="width: 100%;margin-bottom: 5px" href="{{url('/reportAllCustomer')}}">Report From All Customer</a>
        </div>
        <div class="col-md-12">
            <a class="btn btn-success " style="width: 100%;margin-bottom: 5px" href="{{url('/reportCourseShow')}}">Report Course Register</a>
        </div>
        <div class="col-md-12">
            <a class="btn btn-primary" style="width: 100%;margin-bottom: 5px" href="{{url('/reportBookBuy')}}">Report Book</a>
        </div>
    </div>
@endsection
