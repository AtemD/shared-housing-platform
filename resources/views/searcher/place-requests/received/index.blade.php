@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('searcher.home') }}">Home</a></li>
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
                            <a class="nav-link active" id="received" href="{{route('searcher.place-requests.received.index')}}" role="tab" aria-controls="received" aria-selected="false">
                                <i class="fas fa-inbox"></i> Received
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sent" href="{{route('searcher.place-requests.sent.index')}}" role="tab" aria-controls="sent" aria-selected="false">
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
                                <div class="col-12 col-sm-6 col-md-6 d-flex flex-column">
                                    <div class="card bg-light">
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-3 text-center">
                                                    <img src="/uploads/users/person_avatar.png" alt="" class="img-circle img-fluid" height="80" width="80">
                                                </div>
                                                <div class="col-9">
                                                    <p class="text-muted">
                                                        <a href="{{ route('searcher.matches.users.show', $request->slug) }}">{{$request->full_name}}</a>
                                                        sent you request for the place <a href="{{ route('searcher.matches.places.show', $places->find($request->pivot->place_id)->slug) }}">
                                                            {{$places->find($request->pivot->place_id)->slug}}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @if($request->pivot->status == \App\References\PlaceRequestStatus::PENDING)
                                            <div class="text-right d-flex justify-content-end">
                                                <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="declined" value="{{\App\References\PlaceRequestStatus::DECLINED}}">
                                                    <button type="submit" class="btn btn-sm btn-secondary">
                                                        Decline
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="accepted" value="{{\App\References\PlaceRequestStatus::ACCEPTED}}">
                                                    <button type="submit" class="btn btn-sm btn-primary ml-2">
                                                        Accept
                                                    </button>
                                                </form>
                                            </div>
                                            @elseif($request->pivot->status == \App\References\PlaceRequestStatus::ACCEPTED)
                                            <div class="text-right d-flex justify-content-between">
                                                <!-- <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}"> -->
                                                <!-- @method('PUT')
                                                    @csrf -->
                                                <input type="hidden" name="cancelled" value="{{\App\References\PlaceRequestStatus::ACCEPTED}}">
                                                <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="cancelled" value="{{\App\References\PlaceRequestStatus::PENDING}}">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-2">
                                                        Cancel
                                                    </button>
                                                </form>

                                                <button type="button" class="btn btn-sm btn-success" disabled>
                                                    You Accepted
                                                </button>
                                                <!-- </form> -->
                                            </div>
                                            @else
                                            <div class="text-right d-flex justify-content-between">
                                                <!-- <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf -->
                                                <form method="POST" action="{{ route('searcher.place-requests.update', $request->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="cancelled" value="{{\App\References\PlaceRequestStatus::PENDING}}">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-2">
                                                        Cancel
                                                    </button>
                                                </form>

                                                <input type="hidden" name="declined" value="{{\App\References\PlaceRequestStatus::DECLINED}}">
                                                <button type="button" class="btn btn-sm btn-warning" disabled>
                                                    You Declined
                                                </button>
                                                <!-- </form> -->
                                            </div>
                                            @endif
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