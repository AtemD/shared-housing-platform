@extends('layouts.app')

@section('content')
<div class="container">
    <div class="shop-item-details">
        @include('user.includes.users.header')

        
        <div class="row">
            <div class="col-md-6">
                @include('user.includes.users.tab')
            </div>
            <div class="col-md-6">
                @include('user.includes.users.meta')
            </div>
        </div>

        <p id="menu"></p>

        <div class="row">
            <div class="col-md-12">
                @include('user.includes.users.section')
            </div>
        </div>

    </div>
</div>

@endsection