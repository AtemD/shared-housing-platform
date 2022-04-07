@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb" class="navbar-light bg-light">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
        </ol>
    </nav>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="list-group">
                <a href="{{ route('user.basic-profile.edit') }}" class="list-group-item list-group-item-action">
                    Basic Profile Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Place Listing Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Place Listing Preferences Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Personal Preferences Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Compatibility Preferences Settings
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Interests Settings
                </a>
                <a href="{{ route('user.compatibility-questions.index') }}" class="list-group-item list-group-item-action">
                    Compatibility Questions Settings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection