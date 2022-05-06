@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('lister.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item active" aria-current="page">Interests</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default card-outline card-primary mt-4 shadow">
                <div class="card-header">
                    <h5><b>{{ __('Interests') }}</b></h4>
                        <small class="text-muted">Select from a list of interests or add a new one.</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lister.interests.update', $interests->first()) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="interests">Select or Add Your Interests</label>
                            <div class="row">

                                @forelse($interests as $interest)
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="interests[]" value="{{$interest->id}}" class="form-check-input" id="add-interest-{{$interest->id}}" 
                                        
                                        {{ (is_array(old('interests')) && in_array($interest->id, old('interests'))) || ($user->interests->contains($interest->id)) ? ' checked' : '' }}
                                        
                                        >
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
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Update') }}
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