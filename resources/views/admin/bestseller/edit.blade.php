@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Best Seller</h1>
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
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>  
    @endforeach
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
            </div>
        
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.bestseller.update',$bestseller->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="card-body">
                <div class="form-group">
                    <label for="pname">Post Name</label>
                    <select name="pname" class="form-control">
                        <option disabled selected>Select Post Name</option>
                       @foreach ($posts as $post)  
                       <option @if ($bestseller->post_id==$post->id)
                        selected
                    @endif value="{{$post->id}}">{{$post->name}}</option>
                       @endforeach
                      </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"  name="save" class="btn btn-primary">Save</button>
                <button type="submit"  name="saveclose" class="btn btn-info">Save & Close</button>
                <a href="{{route('admin.bestseller.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection