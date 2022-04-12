@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item active" aria-current="page">Place Listings</li>
        </ol>
    </nav>
</div>

<div class="container mb-2">
    <div class="row justify-content-end">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="{{route('user.place-listing-setup.place-listings.create')}}" class="btn btn-outline-primary">Add New Place</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @forelse($user->placeListings as $place_listing)
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/uploads/places/room_3.jpg" class="card-img" alt="..." height="177">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$place_listing->slug}}</h5>
                            <p class="card-text">{!! mb_substr($place_listing->description, 0,190) !!}...</p>

                            <div class="d-flex justify-content-between">
                                <p class="card-text"><small class="text-muted">created {{$place_listing->created_at->diffForHumans()}}</small></p>
                                <a href="#" class="btn btn-primary stretched-link">Edit Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                You have not registered any living places yet, click the add new place button.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection