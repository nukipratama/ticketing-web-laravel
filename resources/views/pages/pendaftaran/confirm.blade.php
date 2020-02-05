@extends('base/base')
@section('content')
<div class="container">
  @foreach ($peserta as $item)
  <div class="col-md-4">
    {{var_dump($item)}}
  </div>
  @endforeach
</div>

@endsection