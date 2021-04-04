<nav class="navi">
    <ul class="navigi-ul d-flex align-items-center">
      <li class="animate__animated animate__rotateInDownLeft animate__slower" >
        <a  href="{{route('user.index')}}"
          ><img src="{{asset('user/img/MTS logo.svg')}}" width="150px" alt=""
        /></a>
      </li>
      <ul class="navigi-ul d-flex justify-content-end w-100 navigi-ul-d">
        <li class="navigi-link-li navigi-link-li-1"><a class="wow fadeIn navigi-link" data-wow-duration="3s" href="{{route('user.index')}}">Home</a></li>
        <li class="navigi-link-li">
          <a
            class="wow fadeIn navigi-link navigi-link-2 product-link"
            data-wow-duration="3s"
            data-toggle="collapse"
            href="{{route('user.product')}}"
            >Products</a
          >
        </li>
        <li class="navigi-link-li">
          <a class="wow fadeIn navigi-link navigi-link-4" data-wow-duration="3s" href="{{route('user.order')}}">Order
         <?php
            if(session()->has('cart')){
              $cart=session()->get('cart');
              echo ' <span class="badge" style="background-color:#CE723B;">'.count($cart).'</span>';
            }
            ?>
          </a>
        </li>
        <li class="navigi-link-li">
          <a class="wow fadeIn navigi-link navigi-link-4" data-wow-duration="3s" href="{{route('user.about')}}">About us</a>
        </li>
        <li class="navigi-link-li">
          <a class="wow fadeIn navigi-link navigi-link-5" data-wow-duration="3s" href="{{route('user.contact')}}">Contact us</a>
        </li>
        
      </ul>
      <li>
        <div id="menu" class="menu" onclick="menuIcon()">
          <div class="menu-line menu-line1"></div>
          <div class="menu-line menu-line2"></div>
          <div class="menu-line menu-line3"></div>
        </div>
      </li>
    </ul>
  </nav>