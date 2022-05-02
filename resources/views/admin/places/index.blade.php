@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Places List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Places</li>
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
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <form role="form" method="GET" action="{{route('admin.places.index')}}">
                                    <div class="card-tools float-left">
                                        <div class="input-group input-group-md">
                                            <input type="text" name="global_place_search" class="form-control float-right" placeholder="Search name">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- <div class="card-tools">
                                    <button href="#add-place" class="btn btn-primary" data-toggle="modal" data-target="#add-place">
                                        <i class="fas fa-store-alt"></i>
                                        <i class="fas fa-plus xs"></i>
                                        Add Places
                                    </button>
                                </div> -->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="GET" action="{{route('admin.places.index')}}">
                                    {{-- @method('PUT')
                                        @csrf --}}
                                    <div class="form-row mb-1">
                                        <div class="col-md-1">
                                            <label for="page_size">Page Size</label>
                                            <select name="page_size" class="form-control @error('page_size') is-invalid @enderror" id="page_size">
                                                <option value="10" {{collect(request()->input('page_size'))->contains('10') ? 'selected' : ''}}>10</option>
                                                <option value="25" {{collect(request()->input('page_size'))->contains('25') ? 'selected' : ''}}>25</option>
                                                <option value="50" {{collect(request()->input('page_size'))->contains('50') ? 'selected' : ''}}>50</option>
                                                <option value="100" {{collect(request()->input('page_size'))->contains('100') ? 'selected' : ''}}>100</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="city">Cities</label>
                                            <select name="city" class="form-control @error('city') is-invalid @enderror" id="city">
                                                <option value="">Choose...</option>
                                                @forelse($cities as $city)
                                                <option value="{{$city->id}}" {{collect(request()->input('city'))->contains($city->id) ? 'selected' : ''}}>
                                                    {{ $city->name }}
                                                </option>
                                                @empty
                                                <div class="alert alert-warning" role="alert">
                                                    No cities created yet!
                                                </div>
                                                @endforelse
                                            </select>

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label for="place_type">Place Type</label>
                                            <select name="place_type" class="form-control @error('place_type') is-invalid @enderror" id="place_type">
                                                <option value="">Choose...</option>
                                                @forelse(\App\References\PlaceType::placeTypeList() as $key => $name)
                                                <option value="{{$key}}" {{collect(request()->input('place_type'))->contains($key) ? 'selected' : ''}}>
                                                    {{ $name }}
                                                </option>
                                                @empty
                                                <div class="alert alert-warning" role="alert">
                                                    No place types created yet!
                                                </div>
                                                @endforelse
                                            </select>

                                            @error('place_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>From Date:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="from_date" value="{{request()->input('from_date')}}" class="form-control" id="from_date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>To Date:</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="to_date" value="{{request()->input('to_date')}}" class="form-control" id="to_date">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>


                                        <div class="col-md-2 d-flex justify-content-end mt-4">
                                            <div class="form-group">
                                                <a class="btn btn-outline-secondary mt-2" href="{{route('admin.places.index')}}">Reset Filters</a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block mt-2">Search</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($places as $place)
                                <tr>
                                    <td>{{$place->id}}</td>
                                    <td>{{$place->slug}}</td>
                                    <td>
                                        {{$place->user->phone}}<br>
                                        {{$place->user->email}}
                                    </td>
                                    <td>{{$place->place_type}}</td>
                                    <td>
                                        <small class="text-muted">created:</small> {{$place->created_at->diffForHumans()}}<br>
                                        <small class="text-muted">updated:</small> {{$place->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="project-actions">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.places.edit', $place->slug) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-place-{{$place->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </td>
                                </tr>

                                @empty
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> No place Results To Show!</h5>
                                            Try adjust your search filters.
                                        </div>
                                    </div>
                                </div>
                                @endempty

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{$places->appends(request()->input())->links()}}
                        </ul>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content -->
</section>
@endsection