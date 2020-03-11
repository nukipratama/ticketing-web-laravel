@extends('dashboard.layouts.app')
@section('title')
{{$title}}
@endsection
@section('content')
@include('dashboard.users.partials.header',
['title' => ($recent->hasPages() ? $title.'- Page '.$recent->currentPage() : $title),'description'=>__($description)])

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
                            @foreach ($recent as $key => $item)
                            <tr class="text-center">
                                <th scope="row">
                                    {{$title === 'Recent Books' ? $item->id : $key + $recent->firstItem()}}
                                </th>
                                <td>
                                    {{$item->email}}
                                </td>
                                <td>
                                    {{$item->tickets->kategori}}
                                </td>
                                <td>
                                    @switch($item->status)
                                    @case(0)
                                    <span class="badge badge-warning">waiting payment</span>
                                    @break
                                    @case(1)
                                    <span class="badge badge-info">waiting confirmation</span>
                                    @break
                                    @case(2)
                                    <span class="badge badge-success">book success</span>
                                    @break
                                    @case(3)
                                    <span class="badge badge-default">book expired</span>
                                    @break
                                    @case(4)
                                    <span class="badge badge-default">book declined</span>
                                    @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href=""><i class="fas fa-search"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col text-right">
                            @if ($recent->currentPage()!==1)
                            <a href="{{$recent->url(1)}}" class="btn btn-sm btn-info">First</a>
                            <a href="{{$recent->previousPageUrl()}}" class="btn btn-sm btn-info">Previous</a>
                            @endif
                            @if ($recent->currentPage()!==$recent->lastPage())
                            <a href="{{$recent->nextPageUrl()}}" class="btn btn-sm btn-info">Next</a>
                            @endif
                            @if ($recent->hasMorePages())
                            <a href="{{$recent->url($recent->lastPage())}}" class="btn btn-sm btn-info">Last</a>
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

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush