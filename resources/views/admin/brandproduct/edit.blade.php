@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.brandproduct.update',$brandproduct->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{$brandproduct->name}}" name="name" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control mb-4" id="image">
                    <img src="{{asset('images/'.$brandproduct->image)}}" width="200px" alt="">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"  name="save" class="btn btn-primary">Save</button>
                <button type="submit"  name="saveclose" class="btn btn-info">Save & Close</button>
                <a href="{{route('admin.brandproduct.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection