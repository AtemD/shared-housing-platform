@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Answer Choices</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.compatibility-questions.index')}}">Compatibility Question</a></li>
                    <li class="breadcrumb-item active">{{ $compatibility_question->slug}}</li>
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
                <div class="card card-default card-outline card-primary mt-4 shadow">
                    <div class="card-header">
                        <h5><b>{{ __('Create Answer Choice') }}</b></h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.answer-choices.store') }}">
                            @csrf
                            <input type="hidden" name="compatibility_question_id" value="{{ $compatibility_question->id }}">

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="title">Answer Choice</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ __('Add New Answer Choice') }}
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