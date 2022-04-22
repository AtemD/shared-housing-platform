@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
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
                    <h5><b>{{ __('Your Location Details') }}</b></h4>
                        <small class="text-muted">Here you can update your location details.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.user-locations.update', $user->userLocation->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" class="form-control @error('city') is-invalid @enderror" id="city" required>
                                @forelse($cities as $city)
                                <option value="{{$city->id}}" {{ (old('city') == $city->id) || ($user->userLocation->city_id == $city->id) ? 'selected' : '' }}>
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