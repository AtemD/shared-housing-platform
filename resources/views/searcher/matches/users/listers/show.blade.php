@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('searcher.matches.places.index') }}" class="text-decoration-none">Place Matches</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$user->slug}}</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="user-item-details">
        <div class="row">
            <div class="col-md-6">
                @include('searcher.includes.users.listers.tab')
            </div>
            <div class="col-md-6">
                @include('searcher.includes.users.listers.meta')
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                @include('searcher.includes.users.listers.section')
            </div>
        </div>

    </div>
</div>

@endsection