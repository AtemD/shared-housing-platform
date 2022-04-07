@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ (request()->routeIs('user.basic-profile.create')) ? 'active' : '' }}" href="{{ route('user.home') }}">
                            <i class="fa-solid fa-tachometer-alt mr-3"></i> Home
                        </a>
                        <a class="nav-link {{ (request()->routeIs('user.favorites.create')) ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-heart mr-3"></i> Favorites
                        </a>
                        <a class="nav-link {{ (request()->routeIs('user.messages.create')) ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-message mr-3"></i> Messages
                        </a>
                        <a class="nav-link {{ (request()->routeIs('user.request.create')) ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-circle-question mr-3"></i> Requests
                        </a>
                        <a class="nav-link {{ (request()->routeIs('user.profile.create')) ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-user mr-3"></i> Profile
                        </a>
                        <a class="nav-link {{ (request()->routeIs('user.settings.create')) ? 'active' : '' }}" href="#">
                            <i class="fa-solid fa-cogs mr-3"></i> Settings
                        </a>
                    </div>
                </div>
                <div class="col-9">
                    <!--div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection