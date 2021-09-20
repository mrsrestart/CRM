@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div class="col-lg-6 col-md-6">
            Welcome : {{Auth::user()->name}}
        </div>
        <div class="col-lg-3 col-md-3">
            <a href="{{url('/addNewCustomer')}}" class="aStyleAllCustomer btn btn-primary">Add New Customer</a>
        </div>
        <div class="col-lg-3 col-md-3">
            @if (isset($_GET['search']))
                <a href="{{url('/showAllCustomer')}}" class="btn btn-success">Show All Customer</a>
            @endif
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <form method="get">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Search By Number 0912..." name="search" id="saerch">
                    </div>

                    <div class="col-md-12">
                        <select class="form-control" name="courseId" id="courseId">
                            @foreach($course as $item)
                            <option value="{{$item->id}}">
                                {{$item->courseName}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="submit" class="btn btn-default" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@sortablelink('Name')</th>
                    <th scope="col">@sortablelink('phone')</th>
                    <th scope="col">Books</th>
                    <th scope="col">@sortablelink('Answer')</th>
                    <th scope="col">@sortablelink('inCourse')</th>
                    <th scope="col">@sortablelink('inConsult')</th>
                    <th scope="col">@sortablelink('inDoubt')</th>
                    <th scope="col">@sortablelink('debt')</th>
                    <th scope="col">@sortablelink('paid')</th>
                    <th scope="col">@sortablelink('needFollow')</th>
                    <th scope="col">@sortablelink('comment')</th>
                    <th scope="col">@sortablelink('Date Modified')</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @php
                $a = 1;
            @endphp

            @foreach($allCustomer as $item)
                <tr>
                    <th scope="row">{{ $a }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        @if($item->selectedBook != "")
                            @php $selectedBooks = unserialize($item->selectedBook) @endphp
                            @foreach($selectedBooks as $itemBooks)
                                <p class="alert alert-info">{{ $itemBooks }}</p>
                            @endforeach
                        @else
                            <p>No Book</p>
                        @endif
                    </td>
                    <td>{{ $item->answer }}</td>
                    <td>{{ $item->inCourse }}</td>
                    <td>{{ $item->inConsult }}</td>
                    <td>{{ $item->inDoubt }}</td>
                    <td>{{ $item->debt }}</td>
                    <td>{{ $item->paid }}</td>
                    <td>{{ $item->needFollow }}</td>
                    <td title="{{ $item->comment }}">@if($item->comment !="") Hold @else No Comment @endif</td>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="{{url('/deleteCustomer/'.$item->customersId)}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{url('/editCustomer/'.$item->customersId)}}" class="btn btn-info">Edit</a></td>
                </tr>
                @php
                    $a = $a + 1;
                @endphp
            @endforeach
            </tbody>
        </table>

    @else
        <script>window.location = "/login";</script>
    @endif

@endsection
