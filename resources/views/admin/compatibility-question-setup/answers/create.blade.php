@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Answers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.compatibility-questions.index')}}">Compatibility Questions</a></li>
                    <li class="breadcrumb-item active">Create Question Answers</li>
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
                        <h5><span class="badge badge-primary text-wrap">(Step 2/2)</span> <b>{{ __('Answers') }}</b></h4>
                    </div>

                    <div class="card-body">


                        <div class="form-group row">
                            @if(session()->has('compatibility_question_setup.question.title'))
                            <div class="col-12">
                                <label for="title">Question</label><br>
                                {{session('compatibility_question_setup.question.title')}}
                            </div>
                            @endif

                            @if(session()->has('compatibility_question_setup.answer'))
                            <div class="col-12">
                                <label for="choice">Choices Added</label>
                            </div>
                            @foreach(session('compatibility_question_setup.answer') as $key => $choice)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" disabled>
                                                <label class="custom-control-label font-weight-normal">{{$choice['title']}}</label>
                                            </div>

                                            <form role="form" method="POST" action="{{ route('admin.compatibility-question-setup.answer.destroy', ['answer_choice_id' => $key]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="answer_choice" value="{{ $key }}">
                                                <button type="submit" class="btn btn-outline-danger btn-sm mb-1">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <form method="POST" action="{{ route('admin.compatibility-question-setup.answer.store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="title">Answer Choices</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Write answer choice here" rows="1" name="title">{{ old('title') ? old('title') : session('compatibility_question_setup.title') }}</textarea>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-outline-primary" name="add_another_choice" value="add_another_choice">
                                        <i class="fas fa-plus xs"></i>
                                        {{ __('Add Another Choice') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('admin.compatibility-question-setup.answer.store') }}">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="{{ route('admin.compatibility-question-setup.question.create') }}" class="btn btn-warning">
                                        {{ __('<< Back') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">
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
</section>
@endsection