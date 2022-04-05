@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs border-left-0 border-right-0 border-bottom-0 shadow-none">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-three-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link" id="new-tab" href="" role="tab" aria-controls="new" aria-selected="false">
                                <i class="fas fa-users"></i>
                                People
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="in-progress-tab" href="" role="tab" aria-controls="in-progress" aria-selected="false">
                                <i class="fas fa-house-user"></i>
                                Places
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="in-progress" role="tabpanel" aria-labelledby="in-progress-tab">
                            <br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="/uploads/places/room_3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="h6">Furnished Room in Bole Apartments</p>
                                            <p class="text-muted mb-0 pb-0">Bole, Addis Ababa</p>
                                            <p class="text-muted mt-0 pt-0"><small>Private + 1 bed + private amenities</small></p>
                                            <p class="h5">3000 ETB/month</p>
                                            <p>
                                                <span class="badge badge-info text-white">Wifi</span>
                                                <span class="badge badge-info text-white">TV</span>
                                                <span class="badge badge-info text-white">Bed</span> ...+5 more
                                            </p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <li class="item products-list product-list-in-card">
                                                        <div class="product-img">
                                                            <img src="/uploads/users/me_2.jpg" alt="Product Image" class="img-size-100 rounded-circle">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="#" class="product-title">
                                                                <small class="text-muted">Listed by</small> Alan Turing
                                                                <span class="badge badge-info float-right"><span class="fas fa-user-check"></span> Verified
                                                            </a>

                                                            <span class="product-description">
                                                                <a class="product-title"><span class="badge badge-success">80% Compatible</a>
                                                            </span>

                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="/uploads/places/room_3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="h6">Furnished Room in Bole Apartments</p>
                                            <p class="text-muted mb-0 pb-0">Bole, Addis Ababa</p>
                                            <p class="text-muted mt-0 pt-0"><small>Private + 1 bed + private amenities</small></p>
                                            <p class="h5">3000 ETB/month</p>
                                            <p>
                                                <span class="badge badge-info text-white">Wifi</span>
                                                <span class="badge badge-info text-white">TV</span>
                                                <span class="badge badge-info text-white">Bed</span> +5 more
                                            </p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <li class="item products-list product-list-in-card">
                                                        <div class="product-img">
                                                            <img src="/uploads/users/me_2.jpg" alt="Product Image" class="img-size-100 rounded-circle">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="#" class="product-title">
                                                                <small class="text-muted">Listed by</small> Mark Zuk
                                                                <span class="badge badge-info float-right"><span class="fas fa-user-check"></span> Verified
                                                            </a>

                                                            <span class="product-description">
                                                                <a class="product-title"><span class="badge badge-warning">60% Compatible</a>
                                                            </span>

                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="/uploads/places/room_3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="h6">Furnished Room in Bole Apartments</p>
                                            <p class="text-muted mb-0 pb-0">Bole, Addis Ababa</p>
                                            <p class="text-muted mt-0 pt-0"><small>Private + 1 bed + private amenities</small></p>
                                            <p class="h5">3000 ETB/month</p>
                                            <p>
                                                <span class="badge badge-info text-white">Wifi</span>
                                                <span class="badge badge-info text-white">TV</span>
                                                <span class="badge badge-info text-white">Bed</span> +5 more
                                            </p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <li class="item products-list product-list-in-card">
                                                        <div class="product-img">
                                                            <img src="/uploads/users/me_2.jpg" alt="Product Image" class="img-size-100 rounded-circle">
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="#" class="product-title">
                                                                <small class="text-muted">Listed by</small> Elon M.
                                                                <span class="badge badge-info float-right"><span class="fas fa-user-check"></span> Verified
                                                            </a>

                                                            <span class="product-description">
                                                                <a class="product-title"><span class="badge badge-danger">40% Compatible</a>
                                                            </span>

                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
</div>
@endsection