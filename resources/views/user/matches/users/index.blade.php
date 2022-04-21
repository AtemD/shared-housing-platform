@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs border-left-0 border-right-0 border-bottom-0 shadow-none">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.matches.users.index') }}" role="tab" aria-selected="false">
                                <i class="fas fa-users"></i>
                                People
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.matches.place-listings.index') }}" role="tab" aria-selected="false">
                                <i class="fas fa-house-user"></i>
                                Places
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <br>
                    <div class="row">
                        @forelse($people as $person)
                        <div class="col-md-4">
                            <a href="{{route('user.matches.users.show', $person->slug)}}" class="stretched-link">
                            <div class="card">
                                <img src="/uploads/users/pic04.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="h5 mb-0 pb-0">{{$person->full_name}}, {{$person->basicProfile->dob}}
                                        @if($person->getAttributes()['verification_status'] === App\References\UserVerificationStatus::VERIFIED)
                                        <small class="float-right"><span class="badge badge-info"><i class="fas fa-user-check"></i> {{$person->verification_status}}</span></small>
                                        @else
                                        <small class="float-right"><span class="badge badge-warning"><i class="fas fa-triangle-exclamation"></i> {{$person->verification_status}}</span></small>
                                        @endif
                                    </p>
                                    <span class="product-description mt-0 pt-0">
                                        <a class="product-title"><span class="badge badge-success">80% Compatible</a>
                                    </span>
                                    <hr>
                                    <p class="h6 mb-0 pb-0">{{$person->basicProfile->dob}} year old {{$person->basicProfile->gender}} looking for a place.</p>
                                    <p class="text-muted mb-0 pb-0"><small>Piassa, Hawassa (my current location)</small></p>
                                    <!-- <p class="text-muted mt-0 pt-0"><small class="font-weight-light">Private + 1 Bed</small></p> -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="product-title button text-decoration-none float-left">
                                                <small class="text-muted">Budget </small>
                                                <h6 class="text-dark">{{$person->placeListingPreference->min_rent_amount}}-{{$person->placeListingPreference->max_rent_amount}} ETB/month</h6>
                                            </a>

                                            <a class="product-title text-decoration-none float-right">
                                                <small class="text-muted">Available to shift </small>
                                                <h6 class="text-dark">{{$person->placeListingPreference->availability_date}}</h6>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </a>
                        </div>
                        @empty
                        <p>No people to show</p>
                        @endforelse
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $people->appends(request()->input())->links()}}
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