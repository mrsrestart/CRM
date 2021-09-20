@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ Auth::user()->name }}
                        </div>
                    @endif
                    {{Auth::user()->name." "}}
                    You are logged in!
                        <div class="form-group">
                            <a class="btn btn-info" href="{{url('/showAllCustomer')}}">Show ALl Customers</a>
                            <a class="btn btn-warning" href="{{url('/showAllBook')}}">Show All Books</a>
                            <a class="btn btn-default" href="{{url('/showAllCourse')}}">Show ALl Course</a>
                            <a class="btn btn-success" href="{{url('/search')}}">Search</a>
                            <a class="btn btn-primary" href="{{url('/report')}}">Report</a>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
