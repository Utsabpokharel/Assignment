@extends('layouts.master')
@section('content')
<form action="{{route('comment.update',$comment->id)}}" method="post" class="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <div class="col-md-12">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Comment</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="comment..."
                name="comment">{{$comment->comment}}</textarea>
        </div>
        <div class="col-md-2 mt-2">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
