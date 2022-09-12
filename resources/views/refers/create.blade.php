@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Refer</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('refers') }}"> Back</a>
        </div>
    </div>
</div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="container-fluid">

    <form action="{{route('refers.store')}}" method="POST">
        @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Refer Name:</strong>
            <select name="user_id" id="" class="form-control">
                <option selected disabled>Select Refer Name</option>
                @foreach ($users as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Refer To:</strong>
            <select name="refer_to" id="" class="form-control">
                <option selected disabled>Select Refer To</option>
                @foreach ($users as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product:</strong>
            <select name="product_id" id="" class="form-control">
                <option selected disabled>Select Product</option>
                @foreach ($products as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

</div>
</div>
@endsection
