@extends('posts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><span>id:</span>{{$posts->user_id}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('/images/' . $posts->content)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{$posts->title}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection