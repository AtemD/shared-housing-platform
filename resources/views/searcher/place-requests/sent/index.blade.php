@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('searcher.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sent Requests</li>
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
                            <a class="nav-link" id="received" href="{{route('searcher.place-requests.received.index')}}" role="tab" aria-controls="received" aria-selected="false">
                                <i class="fas fa-inbox"></i> Received
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="sent" href="{{route('searcher.place-requests.sent.index')}}" role="tab" aria-controls="sent" aria-selected="false">
                                <i class="fa-solid fa-paper-plane"></i> Sent
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <br>
                            <h5 class="text-muted">These are requests that you sent to other users</h5>
                            <br><br>
                            <div class="row">
                                @forelse($sent_place_requests as $request)
                                <div class="col-12 col-sm-6 col-md-6 d-flex flex-column">
                                    
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                        You have not sent any users a place request yet.
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{$sent_place_requests->links()}}
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