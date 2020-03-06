@extends('template/base')
@section('content')
<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll"
   data-image-src="{{asset("template/img/IMG_9740.jpg")}}">
   <div class="overlay_dark"></div>
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-12">
            <div class="inner_cover_content">
               <h3>registration success</h3>
               <h5 class="text-white">Thanks for your participation. Invoice has been sent to {{$book->email}}</h5>
               <span class="text-white">
                  Check your email to access your invoice page.
                  <br>
                  Please upload your payment
                  invoice within 24 hours or the ticket slot will be
                  released.
               </span>
            </div>
         </div>
      </div>
   </div>
</section>
<!--page title section end-->
@endsection