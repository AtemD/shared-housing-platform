@extends('layouts.welcome')

@section('title', '| Welcome')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-fluid">
    <div class="container container-fluid">
        <div class="row align-self-center">
            <div class="col-md-7 my-auto">
                <h1 class="display-4 font-weight-dark text-primary text-capitalize"><b>SHUMA</b></h1>
                <p class="lead"><b>A platform to find shared housing.</b>
                    <br><small class="text-muted">Connect with people listing or searching for shared places of living.</small>
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <p><a class="btn btn-block btn-outline-primary" href="#" role="button">List a Place &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <p><a class="btn btn-block btn-outline-primary" href="#" role="button">Search for a Place &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <!-- <p><a class="btn btn-outline-primary" href="#" role="button">Search Places &raquo;</a></p> -->
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card card-outline card-primary mt-4 shadow">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <hr>

                                    <a class="btn btn-success btn-block" href="{{ route('register') }}">
                                        {{ __('Create New Account') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
