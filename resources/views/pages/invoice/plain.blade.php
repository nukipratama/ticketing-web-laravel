@extends('template/base')
@section('content')
<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll"
   data-image-src="{{asset('template/img/IMG_9740.jpg')}}">
   <div class="overlay_dark"></div>
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-12">
            <div class="inner_cover_content">
               <h3>
                  {{$title}}
               </h3>
            </div>
         </div>
      </div>

      <div class="breadcrumbs">
         <ul>
            <li><a href="/">Home</a> | </li>
            <li><span>Invoice</span></li>
         </ul>
      </div>
   </div>
</section>
<!--page title section end-->

<div class="container-fluid p-3">
   <div class="row justify-content-center my-2">
      <div class="col-md-12 my-2">
         <h4 class="row m-0 p-0">Registration Status</h4>
         <hr>
         <p class="lead">{!!$description!!}</p>
      </div>
   </div>
</div>
@endsection