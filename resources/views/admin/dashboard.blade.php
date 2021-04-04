@extends('admin.layouts.app')
@section('content')
      <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                $new_order=DB::table('orders')->where('status','=','pending')->count();
                echo $new_order;
                ?>
              </h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.order.neworder')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>
                <?php
                $query=DB::table('visitor_counts')->count(DB::raw('DISTINCT ip'));
                echo $query;
                ?>
              </h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <p class="small-box-footer" style="color:#C6303E;">name</p>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php
                $customers_total=DB::table('orders')->count(DB::raw('DISTINCT phone')); 
                echo $customers_total;
                ?>
              </h3>
              <p>Total Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{route('admin.order.customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?php
                 $to_order=DB::table('orders')->count();
                echo $to_order;
                ?>
              </h3>

              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('admin.order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="card bg-gradient-success">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour">
                <ul class="list-unstyled">
                  <li class="show"><div class="datepicker"><div class="datepicker-days" style="">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th class="prev" onclick="previousMonth()" data-action="previous">
                          <span class="fa fa-chevron-left" title="Previous Month"></span>
                        </th>
                        <th class="picker-switch" id="year_month" colspan="5" title="Select Month"></th>
                        <th class="next" data-action="next" onclick="nextMonth()">
                          <span class="fa fa-chevron-right"  title="Next Month"></span>
                        </th>
                        </tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th>
                        <th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                  </table>
                    </div>
                  </div>
                </li>
                <li class="picker-switch accordion-toggle"></li>
              </ul>
            </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection