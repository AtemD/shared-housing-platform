@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Received Requests</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs border-left-0 border-right-0 border-bottom-0 shadow-none">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="received" href="{{route('user.place-requests.received.index')}}" role="tab" aria-controls="received" aria-selected="false">
                                <i class="fas fa-inbox"></i> Received
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sent" href="{{route('user.place-requests.sent.index')}}" role="tab" aria-controls="sent" aria-selected="false">
                                <i class="fa-solid fa-paper-plane"></i> Sent
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <br>
                            <h5 class="text-muted">These are requests sent to you by other users</h5>
                            <br><br>
                            <div class="row">
                                @forelse($received_place_requests as $request)
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
                                                    <p class="text-muted"><a href="{{ route('user.matches.users.show', $request->slug) }}">{{$request->full_name}}</a> sent you a request for your place <a href="{{ route('user.matches.places.show', $request->pivot->place_id) }}">place-{{$request->pivot->place_id}}</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right d-flex justify-content-end">
                                                <form method="POST" action="{{ route('user.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="declined" value="{{\App\References\PlaceRequestStatus::DECLINED}}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        Declined
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('user.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="accepted" value="{{\App\References\PlaceRequestStatus::ACCEPTED}}">
                                                    <button type="submit" class="btn btn-sm btn-primary ml-2">
                                                        Accept
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                        No users has sent you any requests for your place(s) yet.
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {{$received_place_requests->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
</div>
@endsection