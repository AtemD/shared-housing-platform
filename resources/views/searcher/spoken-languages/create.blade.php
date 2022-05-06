@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white ml-0">
            <li class="breadcrumb-item"><a href="{{ route('searcher.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item"><a href="{{ route('searcher.basic-profile.index') }}">Basic Profile</a></li>
            <li class="breadcrumb-item">Spoken Languages</li>
            <li class="breadcrumb-item active" aria-current="page">create</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Create Spoken Language') }}</b></h4>
                    <small class="text-muted">Here you add a language you can speak</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('searcher.spoken-languages.store') }}">
                        @csrf
                                 
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="spoken_language">Your Spoken Language Name</label>
                                <input type="text" class="form-control @error('spoken_language') is-invalid @enderror" id="spoken_language" name="spoken_language" value="{{ old('spoken_language')}}">

                                @error('spoken_language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Create Spoken Language') }}
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