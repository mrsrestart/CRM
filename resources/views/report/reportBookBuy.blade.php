@extends('layouts.app')
@section('content')
    <form action="{{url('/reportBookBuy')}}" method="post">
        @csrf
        <div class="col-md-12">
            <select name="bookName" id="bookName" class="form-control">
                @foreach($allBook as $item)
                    <option value="{{ $item->bookName }}">{{ $item->bookName }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12">
            <input type="submit" name="submit" value="Report" class="btn btn-success">
        </div>
    </form>
@endsection
