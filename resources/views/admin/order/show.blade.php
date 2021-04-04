@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show order</h1>
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
                  <label for="cname">Customer Name</label>
                  <input type="text" name="cname" disabled value="{{$order->cname}}" class="form-control" id="cname" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" disabled value={{$order->phone}} class="form-control" id="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                  <label for="pname">Post Name</label>
                  <select disabled  name="pname" class="form-control">
                      <option selected>Select Post Name</option>
                     @foreach ($posts as $post)  
                     <option @if ($order->post_id==$post->id)
                         selected
                     @endif value="{{$post->id}}">{{$post->name}}</option>
                     @endforeach
                    </select>
              </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select disabled name="status" class="form-control">
                      <option disabled selected>Select Status</option>
                      <option @if ($order->status=='Pending')
                          selected
                      @endif value="Pending">Pending</option>
                      <option @if ($order->status=='Done')
                        selected
                    @endif value="Done">Done</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="instock">Number</label>
                  <input type="number" name="instock" disabled value={{$order->instock}} class="form-control" id="phone" placeholder="Enter Number">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('admin.order.index')}}" class="btn btn-danger">Close</a>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection