@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <form action="{{route('question.store')}}" method="post" class="form">
                @csrf
                <div class="mb-4">
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Have any
                            questions?</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Ask here and get solutions..." name="question"></textarea>
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <button type="submit" class="btn btn-primary">Ask Now</button>
                    </div>
                </div>
            </form>

            <div class="list-group">
                <h4>All Questions</h4>
                @foreach ($questions as $question)
                <a href="{{route('question.show',$question->id)}}" class="list-group-item list-group-item-action"
                    aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 text-info">{{$question->question}}
                        </h5>
                        <small>
                            {{-- @if($question->asked_by == @Auth::user()->id)
                            <a href="{{route('question.edit',$question->id)}}">
                                <i class="fa fa-pencil text-muted"></i>
                            </a>
                            @endif --}}
                            <span>
                                @if ($question->status == 1)
                                <i class="text-muted"> edited</i>
                                @endif

                                @if($question->id ==1)
                                <i class="badge bg-secondary">1st Question</i>
                                @endif
                            </span>
                        </small>
                    </div>

                    <hr>
                    <div class="row">
                        <i class="fa fa-user col-md-4"> {{$question->user->name}} </i>
                        <i class="fa fa-comment col-md-4 text-muted"> {{$comment}} comments</i>
                        <i class="fa fa-clock-o col-md-4 text-muted"> {{$question->asked_on}}</i>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
