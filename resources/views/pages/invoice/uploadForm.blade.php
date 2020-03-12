@extends('template/base')
@section('custom-css')
<link rel="stylesheet" href="{{asset('template/css/deadline.css')}}">
@endsection
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
                  Invoice - {{$book->bid}}
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
      <div class="col-md-6 my-2">
         <h4 class="row m-0 p-0">Invoice Details</h4>
         <hr>
         <div class="row m-0 p-0 justify-content-center">
            <div class="col-md-12 text-center">
               <h5 class="text-dark">Total Invoice</h5>
               <p class="lead font-weight-bold text-dark">
                  IDR {{number_format(($book->tickets->harga*$book->jumlah)+$book->id,0,',','.')}}
               </p>
               <small>Please transfer to -BANK ACCOUNT- and upload payment proof before
                  <b>{{$book->countdownLabel}}</b></small>
            </div>
            <div class="col-md-12 deadline m-2"></div>
         </div>
      </div>
      <div class="col-md-6 my-2">
         <h4 class="row m-0 p-0">Invoice Confirmation</h4>
         <hr>
         <form action="{{$book->uploadURL}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{$book->bid}}">
            <div class="form-row m-0 p-0">
               <div class="form-group col-md-12 ">
                  <div class="text-center">
                     <h5 class="text-dark">Some description here | Some description here </h5>
                  </div>
                  <label for="payment">Upload Payment Proof</label>
                  <input type="file" name="PaymentProof" class="form-control @if($errors->any())
                  {{ $errors->has('PaymentProof') || $errors->has('PaymentProof')  ? 'is-invalid'  : ''}} @endif">
                  @if($errors->has('PaymentProof') || $errors->has('PaymentProof'))
                  <div class="invalid-feedback">
                     {{$errors->first('PaymentProof')}}
                  </div>
                  @endif
                  <button type="submit" class="btn btn-primary w-100"><i class="fas fa-receipt"></i> Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="row justify-content-center my-2">
      <div class="col-md-12 my-2">
         <h4 class="row m-0 p-0">Participant List</h4>
         <hr>
         <div class="container-fluid">
            <div class="row">
               @foreach ($book->participants as $item)
               <div class="col-md-3 mb-2">
                  <div class="card">
                     <img class="card-img-top" src="{{asset($item->img)}}" alt="Card image cap">
                     <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->email}}</p>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom-js')
<script>
   var deadline = '{{$book->countdown}}'
   $(".deadline").countdown(deadline, function (event) {
            $(this).html(
               event.strftime('<div class="m-1">%H<span>Hours</span></div> <div class="m-1">%M<span>Minutes</span></div> <div class="m-1">%S<span>Seconds</span></div>')
            );
      });
</script>
@endsection