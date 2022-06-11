@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Compatibility Question</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.compatibility-questions.index')}}">Compatibility Questions</a></li>
                    <li class="breadcrumb-item active">Create Question</li>
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
                <div class="card card-default card-outline card-primary mt-4 shadow">
                    <div class="card-header">
                        <h5><span class="badge badge-primary text-wrap">(Step 1/2)</span> <b>{{ __('Compatibility Question Setup') }}</b></h4>
                            <!-- <small class="text-muted">Here you specify your basic profile information.</small> -->
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.compatibility-question-setup.question.store') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="title">Question</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Write the question here" rows="5" name="title">{{ old('title') ? old('title') : session('compatibility_question_setup.question.title') }}</textarea>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="description">Question Short Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Write the questions short description here" rows="3" name="description">{{ old('description') ? old('description') : session('compatibility_question_setup.question.description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                            <div class="col-12">
                            <label for="verification_status">Verification Status</label>
                                <select class="custom-select form-control @error('verification_status') is-invalid @enderror" id="verification_status" name="verification_status">
                                    <option value="">verification_status...</option>
                                    @forelse(App\References\verificationStatus::verificationStatusList() as $key => $verification_status)
                                        <option value="{{$key}}" {{ old('verification_status')== $key || (session('compatibility_question_setup.question.verification_status') == $key )? 'selected' : '' }}>{{$verification_status}}</option>
                                    @empty 
                                        <option value="">Error, No Verification Status</option>
                                    @endforelse
                                </select>

                                @error('verification_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Continue >>') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection