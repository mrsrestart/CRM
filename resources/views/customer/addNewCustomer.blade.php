@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('/createCustomer')}}">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" placeholder="Full Name" name="fullName" id="fullName" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" placeholder="0912...." name="phone" id="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea type="text" placeholder="Add Comment" name="comment" id="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="comment">Select Book</label>
            <select class="form-control" name="selectedBook[]" id="selectedBook[]" multiple>
                @foreach($bookData as $item)
                    <option value="{{ $item->bookName }}">{{$item->bookName }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    Answer <input type="checkbox" value="1" name="answer" id="answer">
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    Buy Book <input type="checkbox" value="1" name="buyBook" id="buyBook" >
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    In Course <input type="checkbox" value="1" name="inCourse" id="inCourse" >
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    In Consult <input type="checkbox" value="1" name="inConsult" id="inConsult" >
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    In Doubt <input type="checkbox" value="1" name="inDoubt" id="inDoubt" >
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone">
                    Need Follow <input type="checkbox" value="1" name="needFollow" id="needFollow" >
                </label>

            </div>
        </div>
        <div class="col-md-12">

            <input type="submit" name="submit" value="Add New Customer" class="btn btn-success">
        </div>
        {{csrf_field()}}
    </form>
@endsection
