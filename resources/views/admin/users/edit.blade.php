@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users Account Editor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">{{ $user->slug}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form role="form" method="POST" action="{{ route('admin.users.update', ['user' => $user->slug])}}">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit User Account Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="update_account_status" value="1">
                            </div>
                            <div class="form-group">
                                <label for="account_status">User Account Status</label>
                                <select name="account_status" class="form-control @error('account_status') is-invalid @enderror" id="account_status" required>
                                    @forelse($account_statuses as $key => $status)
                                    <option value="{{$key}}" {{ $key == $user->getAttributes()['account_status'] ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                    @empty
                                    <div class="alert alert-warning" role="alert">
                                        No Account Statuses Created Yet!
                                    </div>
                                    @endforelse
                                </select>

                                @error('account_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Users Account Status</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form role="form" method="POST" action="{{ route('admin.users.update', ['user' => $user->slug])}}">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit User Verification Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="update_verification_status" value="1">
                            </div>
                            <div class="form-group">
                                <label for="verification_status">User Verification Status</label>
                                <select name="verification_status" class="form-control @error('verification_status') is-invalid @enderror" id="verification_status" required>
                                    @forelse($verification_statuses as $key => $status)
                                    <option value="{{$key}}" {{ $key == $user->getAttributes()['verification_status'] ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                    @empty
                                    <div class="alert alert-warning" role="alert">
                                        No Verification Statuses Created Yet!
                                    </div>
                                    @endforelse
                                </select>

                                @error('verification_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Users Verification Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection