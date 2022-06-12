@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Countries</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item">Locations</li>
                    <li class="breadcrumb-item active">Countries</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools float-left">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($countries as $country)
                                <tr>
                                    <td>{{$country}}</td>
                                </tr>

                                @empty
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-warning"></i> No country Registered Yet!</h5>
                                            register at least one country.
                                        </div>
                                    </div>
                                </div>
                                @endempty

                                <div class="modal fade" id="add-country" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog add-country">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add New country</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <form role="form" method="POST" action="{{ route('admin.countries.store') }}">
                                                @csrf

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="abbreviation">Abbr.</label>
                                                        <input type="text" class="form-control" id="abbreviation" placeholder="abbreviation" name="abbreviation" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="currency_name">Currency Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="currency abbreviation" name="currency_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="currency_abbreviation">Currency Abbr.</label>
                                                        <input type="text" class="form-control" id="name" placeholder="currency name" name="currency_abbreviation" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="new-country-switch" name="status">
                                                            <label class="custom-control-label" for="new-country-switch">Status (Enable/Disable)</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content -->
</section>
@endsection