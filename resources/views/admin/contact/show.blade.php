@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Post</h1>
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
              <h3 class="card-title">Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.contact.update',$contact->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" disabled name="name" value="{{$contact->name}}" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="tel" disabled name="phone" value="{{$contact->phone}}" class="form-control" id="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" disabled name="email" value="{{$contact->email}}" class="form-control" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" id="message-disable" cols="30" rows="10">{{$contact->message}}</textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{route('admin.contact.edit',$contact->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('admin.contact.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection