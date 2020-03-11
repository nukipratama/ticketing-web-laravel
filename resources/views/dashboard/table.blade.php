@extends('dashboard.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
@include('dashboard.users.partials.header',
['title' => ($data->hasPages() ? $title.'- Page '.$data->currentPage() : $title),'description'=>__($description)])

<div class="container-fluid mt--7 mb-5">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Book Email</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr class="text-center">
                                <th scope="row">
                                    {{$title === 'Recent Books' ? $item->id : $key + $data->firstItem()}}
                                </th>
                                <td>
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{$item->tickets->kategori}}
                                </td>
                                <td>
                                    @switch($item->status)
                                    @case('booked')
                                    @if (\Carbon\Carbon::create($item->expired)->isPast())
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
                                </td>
                                <td>
                                    <a href="{{route('details.index',['id'=>$item->id])}}"><i class="fas fa-search"></i>
                                        Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col text-right">
                            @if ($data->currentPage()!==1)
                            <a href="{{$data->url(1)}}" class="btn btn-sm btn-info">First</a>
                            <a href="{{$data->previousPageUrl()}}" class="btn btn-sm btn-info">Previous</a>
                            @endif
                            @if ($data->currentPage()!==$data->lastPage())
                            <a href="{{$data->nextPageUrl()}}" class="btn btn-sm btn-info">Next</a>
                            @endif
                            @if ($data->hasMorePages())
                            <a href="{{$data->url($data->lastPage())}}" class="btn btn-sm btn-info">Last</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- </div> --}}
@endsection