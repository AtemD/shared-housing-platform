@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5>(1/6) <b>{{ __('Basic Profile Setup') }}</b></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile-setup.basic-profile.store') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12">
                            <label for="gender">Select Gender</label>
                                <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="">Gender...</option>
                                    @forelse(App\References\Gender::genderList() as $key => $gender)
                                        <option value="{{$key}}" {{ old('gender')== $key  ? 'selected' : '' }}>{{$gender}}</option>
                                    @empty 
                                        <option value="">Error...</option>
                                    @endforelse
                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">

                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="validationTextarea">Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" id="validationTextarea" placeholder="Briefly write about yourself" rows="3" name="bio">{{ old('bio') }}</textarea>

                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next >>') }}
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