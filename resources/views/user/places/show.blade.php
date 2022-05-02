@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb" class="navbar-light bg-light">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
            <li class="breadcrumb-item"><a href="{{ route('user.places.index') }}">Places</a></li>
            <li class="breadcrumb-item">{{$place->slug}}</li>
            <li class="breadcrumb-item active" aria-current="page">settings</li>
        </ol>
    </nav>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="list-group">
                <a href="{{ route('user.places.edit', $place->slug) }}" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <p class="mb-0">Details Settings</p>
                            <p class="mb-0"><i class="nav-icon fas fa-angles-right mr-2"></i></p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.place-locations.edit', $place->placeLocation->id) }}" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <p class="mb-0">Location Settings</p>
                            <p class="mb-0"><i class="nav-icon fas fa-angles-right mr-2"></i></p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('user.place.amenities.edit', $place->slug) }}" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <p class="mb-0">Amenities Settings</p>
                            <p class="mb-0"><i class="nav-icon fas fa-angles-right mr-2"></i></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection