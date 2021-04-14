@extends('user.layouts.app')
@section('content')
<section>
  <form action="{{route('user.ordercomplete')}}" method="POST">
    {{csrf_field()}}
    <div class="container" >
   <div class="d-flex flex-column align-items-end">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger order-error">{{$error}}</div>  
    @endforeach
   </div>
        <div class="customer-info wow fadeInDown" data-wow-duration="2s"">
          <div class="z-3">
            <label class="customer-name" for="">Name</label>
            <input type="text" name="cname" class="name-input" placeholder="Enter Name">
          </div>
          <div class="z-3"  >
            <label class="customer-phone" for="">Phone No</label>
            <input type="tel" name="phone"  class="phone-input" placeholder="Enter Phone No">
          </div>
        </div>
        @if (Session::has('order success'))
          <div class="order-mes">
            <div class="alert alert-info text-center">{{Session::get('order success')}}</div>
          </div>
        @endif
        <table style="width:100%;"class="wow fadeIn" data-wow-duration="2s">
          <thead>
            <tr class="order-title">
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            @php
                 $total_all=0;
            @endphp
         @if (session()->has('cart'))
             @foreach (session()->get('cart') as $id=>$post)
             <tr>
              <td>
                <div class="order-product">
                  <img src="{{asset('images/'.$post['image'])}}" alt="">
                  <div class="oreder-product-info">
                    <div class="name" name="pname">{{$post['name']}}</div>
                    <div class="name" ><span class="price-span">Price: </span><span name="price">{{$post['price']}}</span> ks</div>
                    <a href="{{route('user.orderremove',[$id])}}" class="remove order-remove-button">Remove</a>
                 </div>
                </div>
              </td>
              <td  class="position-relative" >
                <div class="z-3"> 
                <input class="order-quantity" disabled name="instock"  value="{{$post['quantity']}}" id="number" type="tel">
                </div>
              </td>
            @php
                $total=$post['quantity']*$post['price'];
              echo '<td class="order-price">
                  '.$total.' ks
              </td>';
              $total_all += $total;
            @endphp   
            </tr> 
             @endforeach
            </tbody>
          </table>
             <div class="total wow fadeInUp" data-wow-duration="2s">
              <div class="order-line"></div>
              <div class="cash">
                <div class="total-amount-1">Total Amount</div>
                <div class="total-amount-2">{{$total_all}} ks</div>
              </div>
            </div>
             @else
            </tbody>
          </table>
            
            <span class="wow fadeIn no-order">There is no order yet.</span> 
        
            <div class="total wow fadeInUp" data-wow-duration="2s">
              <div class="order-line"></div>
              <div class="cash">
                <div class="total-amount-1">Total Amount</div>
                <div class="total-amount-2">0 ks</div>
              </div>
            </div>
            @endif
         
    </div>
    <div class="order-button wow fadeInUp" data-wow-duration="2s">
      <button type="submit" class="order-button-click">Order</button>
    </div>
  </form>
  </section>
@endsection