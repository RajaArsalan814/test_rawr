@extends('layouts.master')
@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
                {{-- @can('station-create')
                <div class="col-md-4" align="right"><a class="btn btn-primary" href="{{route('stations.create')}}" >Add Station</a></div> <br><br>
                @endcan --}}
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Create</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </section>

<script>
//     function myFunction(id,status) {
//        var id = id;
//        var status = (status ? '0' : '1');
//        $.ajax({
//              type: "GET",
//              dataType: "json",
//              url: 'stations/change_status',
//              data: {'id': id,'status': status},
//              success: function(data){
//                console.log(data.success)
//              }
//          });

//    }
 </script>
@endsection
