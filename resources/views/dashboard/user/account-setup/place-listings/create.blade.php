@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-info text-wrap">(3/6)</span> <b>{{ __('Place Listings') }}</b></h4>
                        <small class="text-muted">Here you specify the details of the place you are listing.</small>
                </div>
                <!-- 
    *user_id, description, *rent_amount, *rent_period, *rent_currency, *min_stay_period, profile_image, *living_place_type,
    bills_included, *move_in_date/availability_date, *furnishing_type, *slug, *created_at, *updated_at
 -->
                <div class="card-body">
                    <form method="POST" action="{{ route('user.account-setup.place-listings.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 pb-1">
                                <label for="rent_amount">Rent Amount (ETB)</label>
                                <input id="rent_amount" type="number" placeholder="rent amount" class="form-control @error('rent_amount') is-invalid @enderror" name="rent_amount" value="{{ old('rent_amount') }}" autofocus>

                                @error('rent_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rent_period">Rent Per</label>
                                    <select class="custom-select form-control @error('rent_period') is-invalid @enderror" id="rent_period" name="rent_period">
                                        <option value="">Select...</option>
                                        @forelse(App\References\PeriodType::rentPeriodTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('rent_period')== $key  ? 'selected' : '' }}>{{$value}}</option>
                                        @empty
                                        <option value="">Error...</option>
                                        @endforelse
                                    </select>

                                    @error('rent_period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="mb-0">Bills</label><br>
                                    <small class="text-muted">(Are water and electricity included in rent amount above?)</small><br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bills_included_1" name="bills_included" class="custom-control-input form-control @error('bills_included') is-invalid @enderror" value="1" {{ old('bills_included')==1 ? 'checked': '' }}>
                                        <label class="custom-control-label font-weight-normal" for="bills_included_1">Bills Included</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bills_included_2" name="bills_included" class="custom-control-input form-control @error('bills_included') is-invalid @enderror" value="0" {{ old('bills_included')==0 ? 'checked': '' }}>
                                        <label class="custom-control-label font-weight-normal" for="bills_included_2">Bills Not Included</label>
                                        <br>
                                        @error('bills_included')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="living_place_type">Living Place Type</label>
                                    <select class="custom-select form-control @error('living_place_type') is-invalid @enderror" id="living_place_type" name="living_place_type">
                                        <option value="">Select...</option>
                                        @forelse(App\References\LivingPlaceType::livingPlaceTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('living_place_type')== $key  ? 'selected' : '' }}>{{$value}}</option>
                                        @empty
                                        <option value="">Error...</option>
                                        @endforelse
                                    </select>

                                    @error('living_place_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="furnishing_type">Furnishing Type</label>
                                    <select class="custom-select form-control @error('furnishing_type') is-invalid @enderror" id="furnishing_type" name="furnishing_type">
                                        <option value="">Select...</option>
                                        @forelse(App\References\FurnishingType::furnishingTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('furnishing_type')== $key  ? 'selected' : '' }}>{{$value}}</option>
                                        @empty
                                        <option value="">Error...</option>
                                        @endforelse
                                    </select>

                                    @error('furnishing_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="min_stay_period text-small">Min Stay Period</label><br>
                                <small class="text-muted">(Indicate the minimum stay period you expect)</small>
                                <input id="min_stay_period" type="number" placeholder="1" class="form-control @error('min_stay_period') is-invalid @enderror" name="min_stay_period" value="{{ old('min_stay_period') }}" autocomplete="min_stay_period">

                                @error('min_stay_period')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="min_stay_period_type">Min Stay Period Type</label><br>
                                <small class="text-muted">(Specify the minimum stay period type)</small>
                                <select class="custom-select form-control @error('min_stay_period') is-invalid @enderror" id="min_stay_period_type" name="min_stay_period_type">
                                    <option value="">Select...</option>
                                    @forelse(App\References\PeriodType::stayPeriodTypeList() as $key => $value)
                                    <option value="{{$key}}" {{ old('min_stay_period_type')== $key  ? 'selected' : '' }}>{{$value}}</option>
                                    @empty
                                    <option value="">Error...</option>
                                    @endforelse
                                </select>

                                @error('min_stay_period_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="availability_date">Availability Date</label>
                                <input type="date" class="form-control @error('availability_date') is-invalid @enderror" id="availability_date" name="availability_date" value="{{ old('availability_date') }}">

                                @error('availability_date')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label class="mb-0">Place Profile Image</label><br>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('place_profile_image') is-invalid @enderror" id="place_profile_image" name="place_profile_image">
                                    <label class="custom-file-label" for="place_profile_image">Choose file...</label>

                                    @error('place_profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('<< Back') }}
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