@extends('user.layouts.app')
@section('content')
<section>
    <div class="container">
     <form action="{{route('user.orderTemp',$post->id)}}" enctype="multipart/form-data" method="GET">
      <div class="product-detail wow fadeIn" data-wow-duration="2s">
        <div>
          <img class="box product-detail-img" src="{{asset('images/'.$post->image)}}" alt="green tea special kit Ex">
        </div>
        <div class="product-detail-div">
          <h1>{{$post->name}}</h1>
          <h3>Price: {{$post->price}}ks</h3>
          <div class="product-detail-para">
           <h4>Product Details</h4>
           <p>{{strip_tags($post->description)}}</p>
            </div>
          <div class="product-detail-form">
            <label for="number" class="product-detail-label">Quantity</label>
            <input class="count" id="request" name="count" min="1" value="1" id="number" type="number">
          <div class="d-flex">
            <button type="submit" name="addList"  onclick="addToOrderList()" class="buy-button" >Add to List</button>
            <button type="submit" name="order" class="buy-button" >Order</a>
          </div>
        </div>
      </div>
     </div>
    </form>
     @if (Session::has('status'))
     <p class="alert alert-info">{{Session::get('status')}}</p>
     @endif
    <div class="related-products">
        <h4 class="fw-bold">Related Products</h4>
    </div>
    <div class="featured-product">
    @foreach ($products as $product)
    <div class="box product-box wow fadeInUp" data-wow-duration="2s">
      <a href="{{route('user.productdetail',$product->id)}}">
        <img class="box-1 img-2 d-inline-block" src="{{asset('images/'.$product->image)}}" alt="" />
        <div class="product-info">
          <div class="product-info-item">{{str_limit($product->name,18)}}</div>
          <div class="product-info-item">{{$product->price}} Ks</div>
          <div class="product-info-item">count ({{$product->instock}})</div>
        </div>
      </a>
    </div>
    @endforeach
    </div>
    </div>
  </section>
@endsection