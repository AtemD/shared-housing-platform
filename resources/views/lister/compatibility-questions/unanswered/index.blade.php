@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('lister.home') }}">Home</a></li>
            <li class="breadcrumb-item">Account Settings</li>
            <li class="breadcrumb-item active" aria-current="page">Compatibility Questions</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs border-left-0 border-right-0 border-bottom-0 shadow-none">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-justified" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="in-progress-tab" href="{{route('lister.compatibility-questions.unanswered.index')}}" role="tab" aria-controls="in-progress" aria-selected="false">
                            <i class="fa-solid fa-circle-question"></i> Unanswered
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-tab" href="{{route('lister.compatibility-questions.answered.index')}}" role="tab" aria-controls="new" aria-selected="false">
                                <i class="fas fa-check"></i> Answered
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" role="tabpanel">
                            <br>
                            <h4>Unanswered Questions List</h4>
                            <small class="text-muted">
                                *Note 1: For each question, you provide your own answer, the answer you expect from your match
                                and the questions importance to you.
                                These answers will be used to calculate your match percentage with potential matches.
                            </small><br>
                            <small class="text-muted">
                                *Note 2: the more questions you answer, the more the accuracy of your match percentage will improve.
                            </small><br><br>
                            <div class="row">
                                @forelse($compatibility_questions as $compatibility_question)
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title text-bold">{{$compatibility_question->title}}</h5>
                                        </div>
                                        <form method="POST" action="{{ route('lister.compatibility-questions.store') }}">
                                            @csrf
                                            <input type="hidden" name="question" value="{{$compatibility_question->id}}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p class="font-weight-bold">Your Answer?</p>

                                                        @foreach($compatibility_question->answerChoices as $choice)
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="your_answer_{{$choice->id}}" name="your_answer_question_{{$compatibility_question->id}}" class="custom-control-input @error('your_answer_question_' . $compatibility_question->id) is-invalid @enderror" value="{{$choice->id}}" 
                                                            {{ old('your_answer_question_' . $compatibility_question->id) == $choice->id ? 'checked' : '' }}>
                                                            <label class="custom-control-label font-weight-normal" for="your_answer_{{$choice->id}}">{{$choice->title}}</label>
                                                        </div>
                                                        @endforeach

                                                        @error("your_answer_question_{$compatibility_question->id}")
                                                        <span class="text-danger pl-3" role="alert">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p class="font-weight-bold">Your Matches Answer?</p>
                                                        @foreach($compatibility_question->answerChoices as $choice)
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="your_matches_answer_{{$choice->id}}" name="your_matches_answer_question_{{$compatibility_question->id}}" class="custom-control-input @error('your_matches_answer_question_' . $compatibility_question->id) is-invalid @enderror" value="{{$choice->id}}" {{ old('your_matches_answer_question_' . $compatibility_question->id) == $choice->id ? 'checked' : ''}}>
                                                            <label class="custom-control-label font-weight-normal" for="your_matches_answer_{{$choice->id}}">{{$choice->title}}</label>
                                                        </div>
                                                        @endforeach

                                                        @error("your_matches_answer_question_{$compatibility_question->id}")
                                                        <span class="text-danger pl-3" role="alert">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-4">
                                                        <p class="font-weight-bold">This Questions Importance to you?</p>
                                                        @foreach($compatibility_question_importance as $importance)
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="importance_{{$importance['id']}}_{{$compatibility_question['id']}}" name="importance_question_{{$compatibility_question['id']}}" class="custom-control-input @error('importance_question_' . $compatibility_question['id']) is-invalid @enderror" value="{{$importance['id']}}" {{  old("importance_question_{$compatibility_question['id']}") == "{$importance['id']}" ? "checked" : ""}}>
                                                            <label class="custom-control-label font-weight-normal" for="importance_{{$importance['id']}}_{{$compatibility_question['id']}}">{{$importance['name']}}</label>
                                                        </div>
                                                        @endforeach

                                                        @error("importance_question_{$compatibility_question['id']}")
                                                        <span class="text-danger pl-3" role="alert">
                                                            <small><strong>{{ $message }}</strong></small>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Submit Answers</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> Success!</h5>
                                        You have answered all the questions currently available.
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {{$compatibility_questions->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
</div>
@endsection