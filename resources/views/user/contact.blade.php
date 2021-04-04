@extends('user.layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="contact-form">
            <form action="{{route('user.contactus')}}" method="POST">
                {{csrf_field()}}
                <div class="contact-head">
                 <h1 class="contact-color">Contact Us</h1>
                </div>
                <div class="contact-name z-3">
                    <label class="contact-color contact-name-label z-3""  for="">Name</label>
                    <input class="contact-color contact-name-input z-3"" name="name" type="text">
                </div>
                <div class="contact-phone z-3">
                    <label class="contact-color contact-phone-label z-3"" for="">Phone No</label> 
                    <input class="contact-color contact-phone-input z-3"" name="phone" type="tel">
                </div>
                <div class="contact-email z-3">
                    <label class="contact-color contact-email-label z-3"" for="">Email</label> 
                    <input class="contact-color contact-email-input z-3"" name="email" type="email">
                </div>
                <div class="contact-description z-3">
                    <label class="contact-color contact-description-label" for="">Message</label> 
                    <textarea class="contact-color contact-description-input" name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="contact-button-div">
                    <button type="submit" class="contact-button">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection