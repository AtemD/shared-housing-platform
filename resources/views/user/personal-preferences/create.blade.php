@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-primary text-wrap">(Step 3/5)</span> <b>{{ __('Personal Preferences') }}</b></h4>
                    <small class="text-muted">Here you select the habits that best describe you.</small>
                </div>
               
                <div class="card-body">
                    <form method="POST" action="{{ route('user.personal-preferences.store') }}">
                        @csrf

                        <h5>Diet Habits?</h5>
                        <div class="form-group row">
                            @forelse(App\References\DietHabit::dietHabitList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="diet_habit_{{$key}}" name="diet_habit" class="custom-control-input @error('diet_habit') is-invalid @enderror" value="{{$key}}" {{ old('diet_habit')== $key || (session('profile_setup.personal_preferences.diet_habit') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="diet_habit_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Diet Habits to show, report this issue!
                            </div>
                            @endforelse

                            @error('diet_habit')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Smoking Habits?</h5>
                        <div class="form-group row">
                            @forelse(App\References\SmokingHabit::smokingHabitList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="smoking_habit_{{$key}}" name="smoking_habit" class="custom-control-input @error('smoking_habit') is-invalid @enderror" value="{{$key}}" {{ old('smoking_habit')== $key || (session('profile_setup.personal_preferences.smoking_habit') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="smoking_habit_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Smoking Habits to show, report this issue!
                            </div>
                            @endforelse

                            @error('smoking_habit')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Alcohol Habits?</h5>
                        <div class="form-group row">
                            @forelse(App\References\AlcoholHabit::alcoholHabitList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alcohol_habit_{{$key}}" name="alcohol_habit" class="custom-control-input @error('alcohol_habit') is-invalid @enderror" value="{{$key}}" {{ old('alcohol_habit')== $key || (session('profile_setup.personal_preferences.alcohol_habit') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="alcohol_habit_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Alcohol Habits to show, report this issue!
                            </div>
                            @endforelse

                            @error('alcohol_habit')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Partying Habits?</h5>
                        <div class="form-group row">
                            @forelse(App\References\PartyingHabit::partyingHabitList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="partying_habit_{{$key}}" name="partying_habit" class="custom-control-input @error('partying_habit') is-invalid @enderror" value="{{$key}}" {{ old('partying_habit')== $key || (session('profile_setup.personal_preferences.partying_habit') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="partying_habit_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Partying Habits to show, report this issue!
                            </div>
                            @endforelse

                            @error('partying_habit')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Guest Habits?</h5>
                        <div class="form-group row">
                            @forelse(App\References\GuestHabit::guestHabitList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="guest_habit_{{$key}}" name="guest_habit" class="custom-control-input @error('guest_habit') is-invalid @enderror" value="{{$key}}" {{ old('guest_habit')== $key || (session('profile_setup.personal_preferences.guest_habit') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="guest_habit_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Guest Habits to show, report this issue!
                            </div>
                            @endforelse

                            @error('guest_habit')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Marital Status?</h5>
                        <div class="form-group row">
                            @forelse(App\References\MaritalStatus::maritalStatusList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="marital_status_{{$key}}" name="marital_status" class="custom-control-input @error('marital_status') is-invalid @enderror" value="{{$key}}" {{ old('marital_status')== $key || (session('profile_setup.personal_preferences.marital_status') == $key) ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="marital_status_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Marital Status to show, report this issue!
                            </div>
                            @endforelse

                            @error('marital_status')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <h5>Occupation Type?</h5>
                        <div class="form-group row">
                            @forelse(App\References\OccupationType::occupationTypeList() as $key => $value)
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="occupation_type_{{$key}}" name="occupation_type" class="custom-control-input @error('occupation_type') is-invalid @enderror" value="{{$key}}" {{ old('occupation_type')== $key || (session('profile_setup.personal_preferences.occupation_type') == $key)  ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-normal" for="occupation_type_{{$key}}">{{$value}}</label>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                There are no Occupation Type to show, report this issue!
                            </div>
                            @endforelse

                            @error('occupation_type')
                            <span class="text-danger pl-3" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                @can('create', App\Models\PlaceListing::class)
                                <a href="{{ route('user.place-listings.create') }}" class="btn btn-warning">{{ __('<< Back') }}</a>
                                @elsecan('create', App\Models\PlaceListingPreference::class)
                                <a href="{{ route('user.place-listing-preferences.create') }}" class="btn btn-warning">{{ __('<< Back') }}</a>
                                @endcan

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