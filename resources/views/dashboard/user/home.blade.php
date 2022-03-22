@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <a href="{{ route('user.account-setup.basic-profile.create') }}" class="alert-link">
                    Click here to complete your profile
                </a>
            </div>
        </div>
    </div>
</div>
@endsection