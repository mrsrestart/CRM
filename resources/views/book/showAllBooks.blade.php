@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <div class="col-lg-6 col-md-6">
            Welcome : {{Auth::user()->name}}
        </div>
        <div class="col-lg-3 col-md-3">
            <a href="{{url('/addNewBook')}}" class="aStyleAllCustomer btn btn-primary">Add New Book</a>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">@sortablelink('Book Name')</th>
                <th scope="col">@sortablelink('Price')</th>
                <th scope="col">@sortablelink('Date Modified')</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @php
                $a = 1;
            @endphp
            @foreach($bookData as $item)
                <tr>
                    <th scope="row">{{ $a }}</th>
                    <td>{{ $item->bookName }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="{{url('/deleteBook/'.$item->id)}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{url('/editBook/'.$item->id)}}" class="btn btn-info">Edit</a></td>
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
