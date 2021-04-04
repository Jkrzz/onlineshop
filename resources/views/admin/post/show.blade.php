@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Post</h1>
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
            <form role="form" action="{{route('admin.post.update',$post->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="card-body">
                <div class="form-group">
                    <label for="cname">Category Name</label>
                    <select disabled name="cname" class="form-control">
                        <option disabled selected>Select Category Name</option>
                       @foreach ($categories as $category)  
                       <option @if ($post->category_id=$category->id)
                           selected
                       @endif disabled  value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                      
                      </select>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" disabled value="{{$post->name}}" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description-disable" cols="30" rows="10">{{$post->description}}</textarea>
                </div> 
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" disabled name="price"  value="{{$post->price}}" class="form-control" id="price" placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" disabled name="image" class="form-control" id="image">
                    <img src="{{asset('images/'.$post->image)}}" width="200px" alt="">
                </div>
                <div class="form-group">
                    <label for="instock">Instock</label>
                    <input type="number" disabled  value="{{$post->instock}}" name="instock" class="form-control" id="instock" placeholder="Enter Instock">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('admin.post.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection