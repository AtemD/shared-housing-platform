@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-info text-wrap">(2/6)</span> <b>{{ __('Place Listing Preferences') }}</b></h4>
                        <small class="text-muted">Here you select the type of place you are looking for.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile-setup.place-listing-preferences.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 pb-1">
                                <label for="minrent">Rent From</label>
                                <input id="minrent" type="number" placeholder="min rent" class="form-control @error('minrent') is-invalid @enderror" name="min_rent_amount" value="{{ old('min_rent_amount') }}" required autofocus>

                                @error('minrent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="maxrent">Rent To</label>
                                <input id="maxrent" type="number" placeholder="max rent" class="form-control @error('maxrent') is-invalid @enderror" name="max_rent_amount" value="{{ old('max_rent_amount') }}" required>

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
                                        <option value="{{$key}}" {{ old('value')== $key  ? 'selected' : '' }}>{{$value}}</option>
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

                        <!--div class="form-group row">
                            <div class="col-md-6">
                                <label for="min_stay_period text-small">Minimum Stay Period</label>
                                <input id="min_stay_period" type="number" placeholder="12" class="form-control @error('min_stay_period') is-invalid @enderror" name="min_stay_period" value="{{ old('min_stay_period') }}" autocomplete="min_stay_period">

                                @error('min_stay_period')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="stay_period_type">Stay Period Type</label>
                                <select class="custom-select form-control @error('min_stay_period') is-invalid @enderror" id="stay_period_type" name="stay_period_type" required>
                                    @forelse(App\References\PeriodType::stayPeriodTypeList() as $key => $value)
                                    <option value="{{$key}}" {{ old('value')== $key  ? 'selected' : '' }}>{{$value}}</option>
                                    @empty
                                    <option value="">Error...</option>
                                    @endforelse
                                </select>

                                @error('stay_period_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div-->

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="availability_date">Availability Date</label>
                                <input type="date" class="form-control @error('availability_date') is-invalid @enderror" id="availability_date" name="availability_date" value="{{ old('availability_date') }}">

                                @error('availability_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('<< Prev Step') }}
                                </button>
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