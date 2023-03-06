@extends('posts.layout')
@section('content')
    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Post</div>
        <div class="card-body">
            <form action="{{ url('posts') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label>title</label></br>
                <input type="text" name="title" class="form-control"></br>
                <label>image</label></br>
                <input type="file" name="content" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div> 
@stop