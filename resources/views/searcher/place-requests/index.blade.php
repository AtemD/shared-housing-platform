@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('searcher.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Place Requests</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        @forelse($user->ReceivedPlaceRequests as $request)
        <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
            <div class="card bg-light">
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-3 text-center">
                            <img src="/uploads/users/person_avatar.png" alt="" class="img-circle img-fluid" height="80" width="80">
                        </div>
                        <div class="col-9">
                            <!-- <h2 class="lead"><b>Nicole Pearson</b></h2>
                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
                            <p class="text-muted"><a href="#">Nicole Pearson</a> sent you a request for the place <a href="#">place 123</a></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" class="btn btn-sm btn-secondary">
                            Decline
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            Accept
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                You have not sent any requests for a place to anyone yet.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection