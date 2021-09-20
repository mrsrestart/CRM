@extends('layouts.app')
@section('content')
    <form style="margin-bottom: 10px" method="post" action="{{ url('/editCustomerCourse/'.$customerData->id) }}">
        <input type="hidden" value="{{$customerData->customer_id}}" name="customerId" id="customerId">
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($course as $item)
                        @if ($item->id ==$customerData->course_id)
                            <option selected value="{{$item->id}}">{{$item->courseName}}</option>
                        @else
                            <option  value="{{$item->id}}">{{$item->courseName}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <input type="text" class="form-control" value="{{$customerData->debt}}" name="debt" id="debt" placeholder="Debt...">
            </div>
        </div>
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <input type="text" class="form-control" value="{{$customerData->paid}}" name="paid" id="paid" placeholder="Paid...">
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" name="submit" value="Edit New Course" class="btn btn-success">
        </div>
        {{csrf_field()}}
    </form>

@endsection
