@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><span class="badge badge-primary text-wrap">(Step 3/3)</span> <b>{{ __('Amenities') }}</b></h4>
                    <small class="text-muted">Here you select the amenities that the place contains</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.place-setup.place-amenities.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="amenities">Select or Add Your Amenities</label>
                            <div class="row">

                                @forelse($amenities as $amenity)
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="amenities[]" value="{{$amenity->id}}" class="form-check-input" id="add-amenity-{{$amenity->id}}">
                                        <label class="form-check-label" for="add-amenity-{{$amenity->id}}">
                                            {{$amenity->name}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    No amenities to show, create one here.
                                </div>
                                @endforelse
                                
                            </div>

                            
                            @error('amenities')
                            <span class="text-danger" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="{{ route('user.place-setup.place-locations.create') }}" class="btn btn-warning">{{ __('<< Back') }}</a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit >>') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection