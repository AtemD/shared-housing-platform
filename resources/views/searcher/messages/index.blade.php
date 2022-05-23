@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('searcher.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Messages</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Messages">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                        <div class="float-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @forelse($messages as $message)
                                <tr>
                                    <td class="mailbox-name"><a href="#">Alexander Pierce</a></td>
                                    <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">5 mins ago</td>
                                </tr>
                                @empty
                                <tr>You have no new messages</tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <div class="mailbox-controls">
                        <div class="float-right">
                            <div class="btn-group">
                                <ul class="pagination pagination-sm m-0">
                                {{ $messages->appends(request()->input())->links()}}
                            </ul>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection