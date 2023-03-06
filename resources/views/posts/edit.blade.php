@extends('posts.layout')
@section('content')
    <div class="card" style="margin:20px;">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            <form action="{{ url('posts/'.$posts->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PUT")
                <input type="hidden" name="id" value="{{$posts->id}}">
                <label>title</label></br>
                <input type="text" name="title" class="form-control" value="{{$posts->title}}"></br>
                <label>image</label></br>
                <input type="file" name="content" class="form-control" value="{{$posts->content}}"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>
        </div>
    </div> 
@stop