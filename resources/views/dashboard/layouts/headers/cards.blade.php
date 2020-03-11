<div class="header bg-gradient-primary pb-8 pt-3 pt-md-8">

    <div class="container-fluid">

        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Participant</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        {{DB::table('books')->where('status', 'accepted')->sum('jumlah')}}
                                    </span>
                                    <h5 class="card-title text-uppercase text-muted mb-0">more info..</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{route('dashboard.confirmation')}}">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Waiting Confirmed</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            {{DB::table('books')->where('status', 'uploaded')->count()}}
                                        </span>
                                        <h5 class="card-title text-uppercase text-muted mb-0">more info..</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-clipboard-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{route('dashboard.unpaid')}}">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Waiting Payment</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            {{DB::table('books')->where('status', 'booked')->count()}}
                                        </span>
                                        <br>
                                        <h5 class="card-title text-uppercase text-muted mb-0">more info..</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fab fa-cc-visa"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <a href="{{route('dashboard.failed')}}">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Expired / Declined</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            {{DB::table('books')->where('expired','<', now())->orWhere('status', 'declined')->count()}}
                                        </span>
                                        <h5 class="card-title text-uppercase text-muted mb-0">more info..</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gray text-white rounded-circle shadow">
                                            <i class="fas fa-user-times"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>