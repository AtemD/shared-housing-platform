@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs border-left-0 border-right-0 border-bottom-0 shadow-none">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.matches.people')}}" role="tab" aria-selected="false">
                                <i class="fas fa-users"></i>
                                People
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('user.matches.places')}}" role="tab" aria-selected="false">
                                <i class="fas fa-house-user"></i>
                                Places
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <br>
                    <div class="row">
                        @forelse($places as $place)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="/uploads/places/pic04.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="h6">{{$place->place_type}} &bull; {{$place->furnishing_type}}</p>
                                    <p class="text-muted mb-0 pb-0">{{$place->placeListingLocation->locality->name}}, {{$place->placeListingLocation->city->name}}</p>
                                    <!-- <p class="text-muted mt-0 pt-0"><small>Private + 1 bed + private amenities</small></p> -->
                                    <p class="h5 mt-0">{{$place->rent_amount}} ETB/month</p>

                                    @forelse($place->amenities->take(3) as $amenity)
                                    <small><span class="badge badge-info text-white">{{$amenity->name}}</span></small>
                                    @empty
                                    <p class="mt-0 mb-0">No amenities</p>
                                    @endforelse
                                    &hellip;
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <li class="item products-list product-list-in-card">
                                                <div class="product-img">
                                                    <img src="/uploads/users/person_avatar.png" alt="Product Image" class="img-size-100 rounded-circle">
                                                </div>
                                                <div class="product-info">
                                                    <a href="#" class="product-title">
                                                        <small class="text-muted">Listed by</small> {{$place->user->first_name}}

                                                        @if($place->user->getAttributes()['verification_status'] === App\References\UserVerificationStatus::VERIFIED)
                                                        <span class="badge badge-info float-right"><span class="fas fa-user-check"></span> {{$place->user->verification_status}}
                                                        @else
                                                        <span class="badge badge-danger float-right"><span class="fas fa-triangle-exclamation"></span> {{$place->user->verification_status}}
                                                        @endif
                                                    </a>

                                                    <span class="product-description">
                                                        <a class="product-title"><span class="badge badge-secondary">{{mt_rand(30, 99)}}% Compatible</a>
                                                    </span>

                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No places to show</p>
                        @endforelse
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $places->appends(request()->input())->links()}}
                            </ul>
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