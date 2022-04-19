@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item active" aria-current="page">Basic Profile</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Basic Profile') }}</b></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.basic-profile.update', ['basic_profile' => $user->basicProfile->id]) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="gender">Gender</label>
                                <select class="custom-select form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="">Gender...</option>
                                    @forelse(App\References\Gender::genderList() as $key => $gender)
                                    <option value="{{$key}}" {{ old('gender')== $key || ($user->basicProfile->gender == $key ) ? 'selected' : '' }}>{{$gender}}</option>
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
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') ? old('dob') : $user->basicProfile->dob }}">

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
                                <textarea class="form-control @error('bio') is-invalid @enderror" id="validationTextarea" placeholder="Briefly write about yourself" rows="3" name="bio">{{ old('bio') ? old('bio') : $user->basicProfile->bio }}</textarea>

                                @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h5><b>{{ __('Occupation') }}</b></h4>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#add-occupation">
                                <i class="fas fa-plus xs"></i> {{ __('Add New') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @forelse($user->basicProfile->occupations as $occupation)
                    <div class="form-group row">
                        <div class="col-6">
                            <p class="text-bold">{{ $occupation->name }}</p>
                        </div>
                        <div class="col-3">
                            <a href="#" class="btn btn-block btn-primary btn-sm">
                                <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                            </a>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#delete-occupation-{{$occupation->id}}">
                                <i class="fas fa-trash"></i> {{ __('Del') }}
                            </a>

                            <div class="modal fade" id="delete-occupation-{{$occupation->id}}" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered delete-occupation-{{$occupation->id}}">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="alert alert-danger alert-dismissible">
                                                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                                <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                Are you sure you want to delete your occupation <b>{{$occupation->name}}?</b>
                                                <br>
                                                <small>This action is irreversible!</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>
                    </div>
                    @empty
                    <p>You do not have any occupations, click on add to add new occupations</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection