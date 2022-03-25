@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="card">
        {{-- <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-bold">{!! $question->question !!}</h4>
                </div>
                {{-- <div class="col-md-6">
                    <button type="button" onclick="history.back()" class="card-title btn bg-primary">Back</button>
                </div> --}}
                {{--
            </div> --}}
            {{--
        </div> --}}
        <div class="d-flex w-100 justify-content-between">
            <h4 class="m-1 text-info">{{$question->question}}
            </h4>
            <small>
                @if($question->asked_by == @Auth::user()->id)
                <a href="{{route('question.edit',$question->id)}}">
                    <i class="fa fa-pencil text-muted"></i>
                </a>
                @endif
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
        <!-- /.card-header -->
        {{-- <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Question:</strong>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Task Status:</strong>
                            {{$question->status}}
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @if (auth()->check())
        <hr>
        <form action="{{route('comment.store')}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$question->id}}" name="question">
            <div class="mb-4">
                <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label">
                        <b>Comments</b> </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        placeholder="comment here..." name="comment"></textarea>
                </div>
                <div class="col-md-2 mt-2">
                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                    <button type="submit" class="btn btn-success">Comment</button>
                </div>
            </div>
        </form>
        @endif
        <li class="list-group-item">
            <h4 class="text-center bg-secondary"><b>All Comments</b></h4>
            <hr>
            @foreach($comment as $comments)
            <div class="d-flex">
                <b>{{$comments->commentor['name']}} : </b> <i> {{ $comments->comment }} </i>
            </div>
            <i style="float: right"> {{$comments->created_at}}</i>
            <small>
                @if($comments->comment_by == @Auth::user()->id)
                <a href="{{route('comment.edit',$comments->id)}}">
                    <i class="fa fa-pencil text-muted"></i>
                </a>
                @endif
                <span>
                    @if ($comments->status == 1)
                    <i class="text-muted"> edited</i>
                    @endif
                    @if($comments->id ==1)
                    <i class="badge bg-secondary">1st Comment</i>
                    @endif
                    @if($comments->id ==5)
                    <i class="badge bg-secondary">5th Comment</i>
                    @endif
                    @if($comments->id ==10)
                    <i class="badge bg-secondary">10th Comment</i>
                    @endif
                </span>
            </small>
            <hr>
            @endforeach

        </li>
        <!-- /.card-body -->
    </div>
</div>
@endsection
