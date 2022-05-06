@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-primary text-wrap">(2/5)</span> <b>{{ __('Place Preferences') }}</b></h4>
                        <small class="text-muted">Here you give details of the type of place you are looking for.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.place-preferences.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 pb-1">
                                <label for="minrent">Rent From</label>
                                <input id="minrent" type="number" placeholder="min rent" class="form-control @error('minrent') is-invalid @enderror" name="min_rent_amount" value="{{ old('min_rent_amount') ? old('min_rent_amount') : session('profile_setup.place_preferences.min_rent_amount') }}" required autofocus>

                                @error('minrent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="maxrent">Rent To</label>
                                <input id="maxrent" type="number" placeholder="max rent" class="form-control @error('maxrent') is-invalid @enderror" name="max_rent_amount" value="{{ old('max_rent_amount') ? old('min_rent_amount') : session('profile_setup.place_preferences.max_rent_amount') }}" required>

                                @error('maxrent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rent_period_type">Rent Per</label>
                                    <select class="custom-select form-control @error('min_stay_period') is-invalid @enderror" id="rent_period_type" name="rent_period_type" required>
                                        @forelse(App\References\PeriodType::rentPeriodTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('value')== $key   || (session('profile_setup.place_preferences.rent_period_type') == $key) ? 'selected' : '' }}>{{$value}}</option>
                                        @empty
                                        <option value="">Error...</option>
                                        @endforelse
                                    </select>

                                    @error('rent_period_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="availability_date">Availability Date</label>
                                <input type="date" class="form-control @error('availability_date') is-invalid @enderror" id="availability_date" name="availability_date" value="{{ old('availability_date') ? old('availability_date') : session('profile_setup.place_preferences.availability_date')}}">

                                @error('availability_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="{{ route('lister.basic-profile.create') }}" class="btn btn-warning">{{ __('<< Back') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue >>') }}
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