@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('user.matches.users.index') }}" class="text-decoration-none">People Matches</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$user->slug}}</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="user-item-details">
        <div class="row">
            <div class="col-md-6">
                @include('user.includes.users.tab')
            </div>
            <div class="col-md-6">
                @include('user.includes.users.meta')
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                @include('user.includes.users.section')
            </div>
        </div>

    </div>
</div>

@endsection