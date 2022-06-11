@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Compatibility Questions List</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <form role="form" method="GET" action="{{ route('admin.compatibility-questions.index') }}">
                                    <div class="card-tools float-left">
                                        <div class="input-group input-group-md">
                                            <input type="text" name="global_user_search" class="form-control float-right" placeholder="Search name or email">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-tools">
                                    <a href="{{ route('admin.compatibility-question-setup.question.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus xs"></i>
                                        Add Question
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" method="GET" action="{{ route('admin.compatibility-questions.index') }}">

                                    <div class="form-row">
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
                                                <a class="btn btn-outline-secondary mt-2" href="{{ route('admin.compatibility-questions.index') }}">Reset Filters</a>
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
                                    <th>Title</th>
                                    <th>Choices</th>
                                    <th>Verification Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($compatibility_questions as $question)
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td  class="text-wrap">{{$question->title}}</td>
                                    <td>
                                        <ul>
                                            @forelse($question->answerChoices as $choice)
                                            <li>{{ $choice->title }}</li>
                                            @empty
                                            <p>No answer choices for this question!</p>
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td><span class="badge badge-secondary">{{$question->verification_status}}</span></td>
                                    <td><small class="text-muted">created:<br></small> {{$question->created_at->diffForHumans()}}</td>

                                    <td class="project-actions">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.compatibility-questions.edit', $question->slug) }}" role="button">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-question-{{$question->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>

                                        <!-- A model window to delete a single permission -->
                                        <div class="modal fade" id="delete-question-{{$question->id}}" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form role="form" method="POST" action="{{ route('admin.compatibility-questions.destroy', ['compatibility_question' => $question->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="alert alert-danger alert-dismissible text-wrap">
                                                                <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                                <small class="text-danger">This action is irreversible!</small><br>

                                                                <p>Are you sure you want to delete the question <br><strong>{{$question->title}}</strong>?</p>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Yes Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </td>
                                </tr>

                                @empty
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> No Compatibility Question Results to Show!</h5>
                                            Adjust your filters to get desired results.
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
                            {{$compatibility_questions->appends(request()->input())->links()}}
                        </ul>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection