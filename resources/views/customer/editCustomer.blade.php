@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/editCustomerUp/'.$customerData->id )}}" xmlns="http://www.w3.org/1999/html">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" placeholder="Full Name" value="{{$customerData->name}}" name="fullName" id="fullName" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" placeholder="0912...." value="{{$customerData->phone}}" name="phone" id="phone" class="form-control">
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        Answer
                        @if ($customerData->answer == 0)
                            <input type="checkbox" value="1" name="answer" id="answer">
                        @else
                            <input type="checkbox" checked value="1" name="answer" id="answer">
                        @endif

                    </label>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        Buy Book
                        @if ($customerData->buyBook == 0)
                            <input type="checkbox" value="1" name="buyBook" id="buyBook">
                        @else
                            <input type="checkbox" checked value="1" name="buyBook" id="buyBook">
                        @endif
                    </label>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        In Course
                        @if ($customerData->inCourse == 0)
                            <input type="checkbox" value="1" name="inCourse" id="inCourse">
                        @else
                            <input type="checkbox" checked value="1" name="inCourse" id="inCourse">
                        @endif

                    </label>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        In Consult
                        @if ($customerData->inConsult == 0)
                            <input type="checkbox" value="1" name="inConsult" id="inConsult">
                        @else
                            <input type="checkbox" checked value="1" name="inConsult" id="inConsult">
                        @endif
                    </label>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        In Doubt
                        @if ($customerData->inDoubt == 0)
                            <input type="checkbox" value="1" name="inDoubt" id="inDoubt">
                        @else
                            <input type="checkbox" value="1" checked name="inDoubt" id="inDoubt">
                        @endif
                    </label>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="phone">
                        Need Follow
                        @if ($customerData->needFollow == 0)
                            <input type="checkbox" value="1" name="needFollow" id="needFollow">
                        @else
                            <input type="checkbox" checked value="1" name="needFollow" id="needFollow">
                        @endif
                    </label>

                </div>
            </div>
        <div class="col-md-12">

            <input type="submit" name="submit" value="Add New Customer" class="btn btn-success">
        </div>
        {{csrf_field()}}
    </form>
    <div class="col-md-12">
        <h2>Information Cources</h2>
    </div>
    <form style="margin-bottom: 10px" method="post" action="{{ url('/addCustomerCourse/') }}">
        <input type="hidden" value="{{$customerData->id}}" name="customerId" id="customerId">
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <select name="courseId" id="courseId" class="form-control">
                    @foreach($course as $item)
                        <option value="{{$item->id}}">{{$item->courseName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <input type="text" class="form-control" name="debt" id="debt" placeholder="Debt...">
            </div>
        </div>
        <div class="col-md-12">
            <label for="debt"></label>
            <div class="form-group">
                <input type="text" class="form-control" name="paid" id="paid" placeholder="Paid...">
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" name="submit" value="Add New Course" class="btn btn-success">
        </div>
        {{csrf_field()}}
    </form>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Course Name</th>
                <th>Debt</th>
                <th>Paid</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($userCourse as $item)
            <tr>
                <td></td>
                <td>{{$item->course_id}}</td>
                <td>{{$item->debt}}</td>
                <td>{{$item->paid}}</td>
                <td><a class="btn btn-primary" href="{{url('/editCustomerCourse/'.$item->id)}}">ویرابش</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
