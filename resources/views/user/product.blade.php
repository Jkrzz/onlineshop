@extends('user.layouts.app')
@section('content')
<section>
    <div class="container order-min-height">
      <div>
        <h3 class="product-head fw-bold wow fadeIn" data-wow-duration="3s">Products</h3>
      </div>
      <div class="d-flex justify-content-end mx-5">
<form action="{{route('user.productGetSorting')}}" style="z-index:5;" method="POST" id="sortForm" >
  {{csrf_field()}}
  <select class="form-select  form-select-sm m-2 mb-4 sort-by-menu z-3 wow fadeIn" name="sortBy" id="sortSelect" data-wow-duration="3s">
    <option class="sort-by-menu-option" value="date">Sort by Date</option>
    <option class="sort-by-menu-option" @if ($post_num=='name')
        selected
    @endif value="name">Sort by Name</option>
    <option class="sort-by-menu-option" @if ($post_num=='price')
    selected
    @endif value="price">Sort by Price</option>
    <option class="sort-by-menu-option" @if ($post_num=='category_id')
    selected
  @endif value="type">Sort by Type</option>
  </select>
</form>
      </div>
      <div class="featured-product mx-5">
      
        @foreach ($products as $product)
        <div class="box product-box wow fadeInUp" data-wow-duration="2s">
         <a href="{{route('user.productdetail',$product->id)}}">
           <img class="box-1 img-2 d-inline-block" src="{{asset('images/'.$product->image)}}" alt="" />
           <div class="product-info">
             <div class="product-info-item">{{str_limit($product->name,18)}}</div>
             <div class="product-info-item">{{$product->price}} Ks</div>
             <div class="product-info-item">instock ({{$product->instock}})</div>
           </div>
         </a>
       </div>
        @endforeach
      </div>
     
      </div>
      <div class="d-flex room wow fadeIn" data-wow-duration="3s">
        <div class="clearfix">
          @include('user.pagination.pagination',['paginator'=>$products])
        </div>
      </div>
    </div>
  </section>
@endsection