@extends('user.layouts.app')
@section('content')
<section>
    <div class="container">
         <div class="row align-items-center main-qoute">
           <div class="col-sm align-items-sm-center wow fadeIn advertis" data-wow-duration="3s">
             <div class="row">
               <h1 class="qoute-head">
                 Everyone has own beauty and need to find out. Let's search for our
                 own beauty
               </h1>
             </div>
             <div class="row">
               <div id="go-shop"></div>
               <div>
                 <a href="{{route('user.product')}}" class="d-inline-block py-2 px-4 qoute-button z-3">
                   Go Shop <i  class="fas fa-arrow-right z-3"></i>
                 </a>
               </div>
             </div>
           </div>
           <div class="col-sm  align-items-sm-center text-center wow zoomIn advertis" data-wow-duration="3s">
             <img
               class="ml-5 advertis-img"
               width="450px"
               src="{{asset('user/img/undraw_shopping_app_flsj (1).svg')}}"
               alt=""
             />
           </div>
         </div>
         <div class="text-center" id="brand-product-title">
           <h3 class="fw-bold product-title">Korea Products</h3>
           <div class="d-flex justify-content-center">
             <div class="line"></div>
           </div>
         </div>
     
         <div class="d-flex justify-content-between brand-img mx-5">
           @foreach ($brand_products as $brand_product)  
           <div class=" box-div wow fadeInUp" data-wow-duration="2s">
            <img class="box img-1 d-inline-block" src="{{asset('images/'.$brand_product->image)}}" alt="" />
          </div>
           @endforeach
         </div>
         <div class="text-center">
           <h3 class="fw-bold product-title">Featured Products</h3>
           <div class="d-flex justify-content-center">
             <div class="line"></div>
           </div>
         </div>
         <div class="featured-product mx-5">
           @foreach ( $featuredproducts as  $featuredproduct)
           <div class="box product-box wow fadeInUp" data-wow-duration="2s">
            <a href="{{route('user.productdetail',$featuredproduct->post->id)}}">
              <img class="box-1 img-2 d-inline-block" src="{{asset('images/'.$featuredproduct->post->image)}}" alt="" />
              <div class="product-info">
                <div class="product-info-item">{{str_limit($featuredproduct->post->name,18)}}</div>
                <div class="product-info-item">{{$featuredproduct->post->price}}</div>
                <div class="product-info-item">count ({{$featuredproduct->post->instock}})</div>
              </div>
            </a>
          </div> 
           @endforeach
         </div>
         <div class="text-center">
           <h3 class="fw-bold product-title">Latest Products</h3>
           <div class="d-flex justify-content-center">
             <div class="line"></div>
           </div>
         </div>
         <div class=" featured-product mx-5">
           @foreach ($latest_products as $latest_product)
           <div class="box product-box wow fadeInUp" data-wow-duration="2s">
            <a href="{{route('user.productdetail',$latest_product->id)}}">
              <img class="box-1 img-2 d-inline-block" src="{{asset('images/'.$latest_product->image)}}" alt="" />
              <div class="product-info">
                <div class="product-info-item">{{str_limit($latest_product->name,18)}}</div>
                <div class="product-info-item">{{$latest_product->price}} Ks</div>
                <div class="product-info-item">instock ({{$latest_product->instock}})</div>
              </div>
            </a>
          </div>
           @endforeach
         </div>
       </div>
       <div style="background-color: #ce723b" class="mb-5 wow zoomIn" data-wow-duration="2s">
         <div class="container">
           <div class="d-flex best-seller align-items-center">
             <div class="best-seller-div">
               <h1 class="text-white fw-bolder best-seller-title">Best Seller</h1>
               <h2 class="text-white best-seller-name">
                 {{$bestseller[0]->post->name}}
               </h2>
               <h2 class="text-white best-seller-price">  {{$bestseller[0]->post->price}} Ks</h2>
               <a class="buy-best-seller" href="{{route('user.productdetail',$bestseller[0]->post->id)}}"
                 >Order Now <i class="fas fa-arrow-right"></i
               ></a>
             </div>
             <div>
               <a href="{{route('user.productdetail',$bestseller[0]->post->id)}}">
                 <img class="box best-seller-img" src="{{asset('images/'.$bestseller[0]->post->image)}}""
                 alt="" />
               </a>
             </div>
           </div>
         </div>
       </div>
       <div class="d-flex justify-content-center my-5 wow fadeInUp" data-wow-duration="2s">
         <a href="#"> <img  class='innisfree-logo' src="{{asset('user/img/innisfree-logo-1.png')}}" alt="" /></a>
       </div>
   </section>
@endsection