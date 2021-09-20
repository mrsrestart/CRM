@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Book</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/editBook/'.$bookData->id) }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="bookName" class="col-md-4 control-label">Book Name</label>

                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control" name="bookName" value="{{$bookData->bookName}}" placeholder="Book Name.." required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control" name="price" value="{{$bookData->price}}" placeholder="Price..." required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Book
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
