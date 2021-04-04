@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
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
     <div class="row">
      <div class="col-md-12 mb-4"> 
        <a href="{{route('admin.category.create')}}" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
      </div>
     </div>
     <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th>Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               @foreach ($categories as $key => $category)
               <tr>
                <td>{{$key+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                  <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                  <a href="{{route('admin.category.show',$category->id)}}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                </td>
                <td>
                 <form action="{{route('admin.category.destroy',$category->id)}}" method="post">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button type="submit" class="btn btn-outline-danger" onclick="if(!confirm('Are you sure to delete this category?')){
                    event.preventDefault();
                  }"><i class="fas fa-trash"></i></button>
                </form>
                </td>
              </tr>
               @endforeach
               
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection