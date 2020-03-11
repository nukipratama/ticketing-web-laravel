@extends('dashboard.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
@include('dashboard.layouts.headers.cards')

<div class="container-fluid mt--8 mb-5">

    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Recent Books</h3><small class="mb-0">Latest Booking Status</small>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('dashboard.recent')}}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Book Email</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="text-center">
                                <th scope="row">
                                    {{$item->id}}
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
                                    @if (\Carbon\Carbon::create($book->expired)->isPast())
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

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Total Income</h3>
                            <small class="mb-0">Total Income + Unique Price</small>
                            <br>
                            <strong class="mb-0">IDR {{number_format($income, 0, ',', '.')}}</strong>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Jenis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Total</th>
                                <th scope="col">Income</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($total as $item)
                            <tr>
                                <th scope="row">
                                    {{$item->jenis}}
                                </th>
                                <td>
                                    {{$item->kategori}}
                                </td>
                                <td>
                                    {{$item->participant}}
                                </td>
                                <td>
                                    <strong>IDR {{number_format($item->income, 0, ',', '.')}}</strong>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush