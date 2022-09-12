@extends('layouts.master')


@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <br>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <thead class="thead-dark">

        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
