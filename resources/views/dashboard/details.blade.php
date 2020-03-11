@extends('dashboard.layouts.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css"
   integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
@endpush
@section('title')
{{$title}}
@endsection
@section('content')
@include('dashboard.users.partials.header', ['title' => $title])
<div class="container-fluid mt--7">
   <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
         <div class="card card-profile shadow">
            <div class="card-body pt-0 pt-md-4">
               <div class="text-center">
                  <h3 class="mt-3">
                     {{ $data->email }}
                  </h3>
                  <div class="h5 font-weight-300">
                     <i class="ni location_pin mr-2"></i>{{ __($data->bid) }}
                  </div>
                  <div class="h5">
                     @switch($data->status)
                     @case('booked')
                     @if (\Carbon\Carbon::create($data->expired)->isPast())
                     <span class="badge badge-default">book expired</span>
                     @else
                     <span class="badge badge-warning">waiting payment</span>
                     @endif
                     @break
                     @case('uploaded')
                     <span class="badge badge-info">waiting confirmation</span>
                     @break
                     @case('accepted')
                     <span class="badge badge-success">book success</span>
                     @break
                     @case('expired')
                     @break
                     @case('declined')
                     <span class="badge badge-default">book declined</span>
                     @break
                     @endswitch
                  </div>
                  <div class="h5">
                     {{ $data->jumlah }}
                     {{ $data->jumlah>1 ? ' Tickets' : ' Ticket'}}
                  </div>
                  <div class="h5">
                     {{ $data->tickets->jenis.' - '.$data->tickets->kategori }}
                  </div>
                  <div class="h5">
                     IDR {{number_format(($data->tickets->harga*$data->jumlah)+$data->id,0,',','.')}}
                  </div>
                  <div class="h5">
                     @if ($data->invoice !== null)
                     <a href="{{asset($data->invoice)}}" data-lightbox="invoice" class="btn btn-primary">Invoice</a>
                     @endif
                     <form action="{{route('details.book.accept',['id'=>$data->bid])}}" method="post">
                        @method('put') @csrf
                        <button type="submit" class="btn btn-success my-1">Accept</button>
                     </form>
                     <form action="{{route('details.book.decline',['id'=>$data->bid])}}" method="post">
                        @method('put') @csrf
                        <button type="submit" class="btn btn-danger my-1">Decline</button>
                     </form>
                  </div>
                  <hr class="my-4" />
                  <div>
                     created at
                     <h5>{{$date['created']}}</h5>
                  </div>
                  <div>
                     updated at
                     <h5>{{$date['updated']}}</h5>
                  </div>
                  <div>
                     expired at
                     <h5>{{$date['expired']}}</h5>
                  </div>
                  @if($data->expired
                  < now()) <hr class="my-4" />
                  <form action="{{route('details.expired.update',['id'=>$data->bid,'add'=>0])}}" method="post">
                     @method('put') @csrf
                     <button type="submit" class="btn btn-primary my-1">+12 Hours</button>
                  </form>
                  <form action="{{route('details.expired.update',['id'=>$data->bid,'add'=>1])}}" method="post">
                     @method('put') @csrf
                     <button type="submit" class="btn btn-primary my-1">+24 Hours</button>
                  </form>
                  <form action="{{route('details.expired.update',['id'=>$data->bid,'add'=>2])}}" method="post">
                     @method('put') @csrf
                     <button type="submit" class="btn btn-primary my-1">+48 Hours</button>
                  </form>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-8 order-xl-1">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <h3 class="col-12 mb-0">{{ __('Edit Book Data') }}</h3>
               </div>
            </div>
            <div class="card-body">
               <form method="post" action="{{ route('details.email.update',['id'=>$data->bid]) }}" autocomplete="off">
                  @csrf
                  @method('put')
                  <h6 class="heading-small text-muted mb-4">{{ __('Book Information') }}</h6>
                  @if (session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('status') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif

                  <div class="pl-lg-4">
                     <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                        <input type="email" name="email" id="input-email"
                           class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('Email') }}" value="{{ old('email', $data->email) }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                     </div>

                     <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

         <div class="card bg-secondary shadow mt-5">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <h3 class="col-12 mb-0">{{ __('Participant List') }}</h3>
               </div>
            </div>
         </div>
         <div class="card shadow">
            <div class="table-responsive">
               <!-- Projects table -->
               <table class="table align-items-center table-flush">
                  <thead class="thead-light text-center">
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">UID</th>
                        <th scope="col">Address</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Emergency</th>
                        <th scope="col">Community</th>
                        <th scope="col">Tee Size</th>
                        <th scope="col">Medical</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data->participants as $item)
                     <tr class="text-center">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->uid}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->tel}}</td>
                        <td>{{$item->emergency}}</td>
                        <td>{{$item->community}}</td>
                        <td>{{$item->size}}</td>
                        <td>{{$item->medical}}</td>

                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   @include('dashboard.layouts.footers.auth')
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"
   integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>
@endpush