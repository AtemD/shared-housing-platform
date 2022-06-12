@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Answer Choices Editor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.compatibility-questions.index')}}">Compatibility Question</a></li>
                    <li class="breadcrumb-item active">{{ $answer_choice->compatibilityQuestion->slug}}</li>
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
                        <h5><b>{{ __('Answer Choice Editor') }}</b></h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.answer-choices.update', ['answer_choice' => $answer_choice->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="title">Answer Choice</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ? old('title') : $answer_choice->title }}">

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
                                        {{ __('Update Answer Choice') }}
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