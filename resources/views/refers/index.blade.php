@extends('layouts.master')
@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Refers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Refers</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
  </div>
  <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4" align="right"><a class="btn btn-primary" href="{{route('refers.create')}}" >Refer User</a></div> <br><br>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">S: no#</th>
                    <th scope="col">Refer Person</th>
                    <th scope="col">Refer To</th>
                    <th scope="col">Product</th>
                    <th scope="col">Product Purchased</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($refers as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$item->from_refer->name}}</td>
                        <td>{{$item->refer_to->name}}</td>
                        <td>{{$item->product->name}}</td>
                        <td><a href="{{ url('product_purchased/'.$item->id) }}" >Product Purchased</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </section>
@endsection
