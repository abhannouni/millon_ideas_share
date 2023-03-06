@extends('posts.layout')
@if(Auth::check())
<div class="container">
    <div>
        <div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/posts/create') }}" class="btn btn-success btn-sm" title="Add new post">
                        Add new post
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>content</th>
                                        <th>user_id</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->title}}</td>
                                        <td><img src="{{url('/images')}}/{{$item->content}}" width="100px" height="100px" alt=""></td>
                                        <td>{{$item->user_id}}</td>
                                        <td>
                                            <a href="{{url('/posts/'.$item->id)}}" title="View Post"><button class="btn btn-info btn-sm">View</button></a>
                                            <a href="{{url('/posts/'.$item->id . '/edit')}}" title="Edit Post"><button class="btn btn-primary btn-sm">Edit</button></a>
                                            <form method="POST" action="{{ url('/posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            <!-- <a href="" title="Delete Post"><button class="btn btn-danger btn-sm">Delete</button></a> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection