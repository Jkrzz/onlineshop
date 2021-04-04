@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Category</h1>
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
              <h3 class="card-title">Show</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Category Name</label>
                  <input type="text" name="name" disabled value="{{$category->name}}" class="form-control" id="name" placeholder="Enter Name">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('admin.category.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection