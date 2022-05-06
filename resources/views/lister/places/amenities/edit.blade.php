@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('lister.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item"><a href="{{ route('lister.places.index') }}">Places</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lister.places.show', $place->slug) }}">{{$place->slug}}</a></li>
            <li class="breadcrumb-item">Amenities</li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Amenities') }}</b></h4>
                        <small class="text-muted">Here you can update your amenities</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.place.amenities.update', $place->slug) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="amenities">Select or Add Your Amenities</label>
                            <div class="row">

                                @forelse($amenities as $amenity)
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="amenities[]" value="{{$amenity->id}}" class="form-check-input" id="add-amenity-{{$amenity->id}}" {{ (is_array(old('amenities')) && in_array($amenity->id, old('amenities'))) || ($place->amenities->contains($amenity->id)) ? ' checked' : '' }}>
                                        <label class="form-check-label" for="add-amenity-{{$amenity->id}}">
                                            {{$amenity->name}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    No amenities to show, create one here.
                                </div>
                                @endforelse

                            </div>


                            @error('amenities')
                            <span class="text-danger" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Update Amenities') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection