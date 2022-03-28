@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5>(1/6) <b>{{ __('Interests Setup') }}</b></h4>
                        <small class="text-muted">Here you select your interests</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile-setup.interests.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="interests">Select or Add Your Interests</label>
                            <div class="row">

                                <!-- <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="interests[]" value="50" class="form-check-input" id="add-interest-50">
                                        <label class="form-check-label" for="add-interest-50">
                                            Eating
                                        </label>
                                    </div>
                                </div> -->

                                @forelse($interests as $interest)
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="interests[]" value="{{$interest->id}}" class="form-check-input" id="add-interest-{{$interest->id}}">
                                        <label class="form-check-label" for="add-interest-{{$interest->id}}">
                                            {{$interest->name}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    No interests to show, create one here.
                                </div>
                                @endforelse
                                
                            </div>

                            
                            @error('interests')
                            <span class="text-danger" role="alert">
                                <strong>*{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next >>') }}
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