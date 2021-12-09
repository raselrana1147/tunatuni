@extends("layouts.admin")
@section("title","DPG Admin | Dashboard")
@section("breadcrumb","Dashboard")
@section("content")
    <div class="row">
        <div class="col-lg-4">
            <div class="card mini-stat bg-pattern">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-broadcast bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Orders</h6>
                    <h5 class="mb-3">1,687</h5>
                    <p class="text-muted mb-0"><span class="text-success mr-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-pattern">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-box bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Revenue</h6>
                    <h5 class="mb-3">$ 48,265</h5>
                    <p class="text-muted mb-0"><span class="text-danger mr-2"> -26% <i class="mdi mdi-arrow-down"></i> </span> From previous period</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-pattern">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-tags bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Average Price</h6>
                    <h5 class="mb-3">$ 14.6</h5>
                    <p class="text-muted mb-0"><span class="text-danger mr-2"> -26% <i class="mdi mdi-arrow-down"></i> </span> From previous period</p>
                </div>
            </div>
        </div>
    </div>
@endsection