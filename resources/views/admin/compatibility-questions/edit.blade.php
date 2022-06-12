@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Compatibility Questions Editor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Compatibility Questions</li>
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
                <form role="form" method="POST" action="{{ route('admin.compatibility-questions.update', ['compatibility_question' => $compatibility_question->slug])}}">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit Compatibility Question</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="title">title</label>
                                    <textarea class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Write the compatibility question here" rows="5" name="title">{{ old('title') ? old('title') : $compatibility_question->getAttributes()['title'] }}</textarea>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Write the compatibility question here" rows="4" name="description">{{ old('description') ? old('description') : $compatibility_question->getAttributes()['description'] }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="verification_status">Verification Status</label>
                                <select name="verification_status" class="form-control @error('verification_status') is-invalid @enderror" id="verification_status" required>
                                    @forelse($verification_statuses as $key => $status)
                                    <option value="{{$key}}" {{ $key == $compatibility_question->getAttributes()['verification_status'] ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-primary">Update Compatibility Question</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card card-default card-outline card-primary mt-4 shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h5><b>{{ __('Answer Choices') }}</b></h4>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="{{ route('admin.answer-choices.create', ['question_id' => $compatibility_question->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus xs"></i> {{ __('Add New Answer Choice') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @forelse($compatibility_question->answerChoices as $choice)
                        <div class="form-group row">
                            <div class="col-6">
                                <p class="text-bold">{{ $choice->title }}</p>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#delete-choice-{{$choice->id}}">
                                    <i class="fas fa-trash"></i> {{ __('Del') }}
                                </a>

                                <div class="modal fade" id="delete-choice-{{$choice->id}}" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered delete-choice-{{$choice->id}}">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="alert alert-danger alert-dismissible">
                                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                                    <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                    Are you sure you want to delete the questions answer choice: <b>{{$choice->title}}?</b>
                                                    <br>
                                                    <small>This action is irreversible!</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                <form role="form" method="POST" action="{{ route('admin.answer-choices.destroy', ['answer_choice' => $choice->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                            <div class="col-3">
                                <a href="{{ route('admin.answer-choices.edit', ['answer_choice' => $choice->id ]) }}" class="btn btn-block btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                </a>
                            </div>
                        </div>
                        @empty
                        <p>You do not have any occupations, click on add to add new occupations</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection