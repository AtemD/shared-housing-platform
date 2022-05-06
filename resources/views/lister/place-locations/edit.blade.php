@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('lister.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item"><a href="{{ route('lister.places.index') }}">Place s</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lister.places.show', $place_location->place->slug) }}">{{$place_location->place->slug}}</a></li>
            <li class="breadcrumb-item">Locations</li>
            <li class="breadcrumb-item active" aria-current="page">edit</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Place Location') }}</b></h4>
                        <small class="text-muted">Here you can update the location details.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.place-locations.update', $place_location->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" class="form-control @error('city') is-invalid @enderror" id="city" required>
                                @forelse($cities as $city)
                                <option value="{{$city->id}}" {{ (old('city') == $city->id) || ($place_location->city_id == $city->id) ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    No cities cities to show, contact admin for help!
                                </div>
                                @endforelse
                            </select>

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="street">Street Name</label>
                            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') ? old('street') : $place_location->street }}" id="street" required>

                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="specific_information">Specific Location Information</label>
                            <textarea type="text" rows="3" name="specific_information" id="specific_information" class="form-control @error('specific_information') is-invalid @enderror" required>{{old('specific_information') ? old('specific_information') : $place_location->specific_information }}
                            </textarea>

                            @error('specific_information')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea type="text" rows="2" name="address" id="address" class="form-control @error('address') is-invalid @enderror" required>{{old('address') ? old('address') : $place_location->address}}</textarea>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') ? old('latitude') : $place_location->lat}}" id="latitude" required>

                                @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') ? old('longitude') : $place_location->lng}}" id="longitude" required>

                                @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Update Location Details') }}
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