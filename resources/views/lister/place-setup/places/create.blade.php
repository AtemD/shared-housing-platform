@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-primary text-wrap">(Step 1/3)</span> <b>{{ __('Add New Place') }}</b></h4>
                        <small class="text-muted">Here you specify the details of the place you are Listing.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.place-setup.places.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-7 pb-1">
                                <label for="rent_amount">Rent Amount (ETB)</label>

                                <div class="row d-flex justify-content-between">
                                    <div class="col-8 pr-0">
                                        <input id="rent_amount" type="number" placeholder="rent amount" class="form-control @error('rent_amount') is-invalid @enderror" name="rent_amount" value="{{ old('rent_amount') ? old('rent_amount') : session('place_setup.places.rent_amount') }}" autofocus>
                                    </div>
                                    <div class="col-4 pl-0">
                                        <select class="custom-select form-control @error('currency') is-invalid @enderror" id="currency" name="currency">
                                            @forelse(App\References\Currency::currencyList() as $key => $value)
                                            <option value="{{$key}}" {{ old('currency')== $key || (session('place_setup.places.currency') == $key) ? 'selected' : '' }}>{{$value}}</option>
                                            @empty
                                            <option value="">Error...</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                @error('rent_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="rent_period">Rent Per</label>
                                    <select class="custom-select form-control @error('rent_period') is-invalid @enderror" id="rent_period" name="rent_period">
                                        <option value="">Select...</option>
                                        @forelse(App\References\PeriodType::rentPeriodTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('rent_period')== $key || (session('place_setup.places.rent_period') == $key)  ? 'selected' : '' }}>{{$value}}</option>
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
                                        <input type="radio" id="bills_included_1" name="bills_included" class="custom-control-input form-control @error('bills_included') is-invalid @enderror" value="yes" {{ old('bills_included')=='yes' || session('place_setup.places.bills_included') == 'yes' ? 'checked': '' }}>
                                        <label class="custom-control-label font-weight-normal" for="bills_included_1">Bills Included</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bills_included_2" name="bills_included" class="custom-control-input form-control @error('bills_included') is-invalid @enderror" value="no" {{ old('bills_included')=='no' ? 'checked': '' }}>
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
                                    <label for="place_type">Place Type</label>
                                    <select class="custom-select form-control @error('place_type') is-invalid @enderror" id="place_type" name="place_type">
                                        <option value="">Select...</option>
                                        @forelse(App\References\PlaceType::placeTypeList() as $key => $value)
                                        <option value="{{$key}}" {{ old('place_type')== $key || (session('place_setup.places.place_type') == $key) ? 'selected' : '' }}>{{$value}}</option>
                                        @empty
                                        <option value="">Error...</option>
                                        @endforelse
                                    </select>

                                    @error('place_type')
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
                                        <option value="{{$key}}" {{ old('furnishing_type')== $key || (session('place_setup.places.furnishing_type') == $key)  ? 'selected' : '' }}>{{$value}}</option>
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
                                <input id="min_stay_period" type="number" placeholder="1" class="form-control @error('min_stay_period') is-invalid @enderror" name="min_stay_period" value="{{ old('min_stay_period') ? old('min_stay_period') : session('place_setup.places.min_stay_period') }}" autocomplete="min_stay_period">

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
                                    <option value="{{$key}}" {{ old('min_stay_period_type')== $key  || (session('place_setup.places.min_stay_period_type') == $key)  ? 'selected' : '' }}>{{$value}}</option>
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
                                <input type="date" class="form-control @error('availability_date') is-invalid @enderror" id="availability_date" name="availability_date" value="{{ old('availability_date') ? old('availability_date') :  session('place_setup.places.availability_date')}}">

                                @error('availability_date')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="validationTextarea">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="validationTextarea" placeholder="Briefly write about yourself" rows="3" name="description">{{ old('description') ? old('description') : session('place_setup.places.description')}}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="featured_image">Select a Featured Image</label>
                                    <input type="file" class="form-control-file @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">

                                    @error('featured_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-end">
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