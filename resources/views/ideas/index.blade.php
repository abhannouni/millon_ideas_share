@extends('ideas.layouts.app')
@section('profile')
    <div class="card overflow-x-hidden" style="border-radius: 15px; color: white;">
        <div class="card-body text-center">
            <div class="mt-3 mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                    class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2">Julie L. Arsenault</h4>
            <input type="submit" class="btn btn-info btn-rounded btn-lg" name="" id="" value="logout">
            <div class="d-flex justify-content-between text-center mt-5 mb-2" >
                <div>
                    <p class="mb-2 h5">8471</p>
                    <p class=" mb-0" >number du post</p>
                </div>
                <div class="px-3">
                    <p class="mb-2 h5">8512</p>
                    <p class="mb-0" >comment</p>
                </div>
                <div>
                    <p class="mb-2 h5">4751</p>
                    <p class="mb-0" >likes</p>
                </div>
            </div>
        </div>
    </div>
@stop
@section('posts')
    <div class="card">
        <!-- tweetbox starts -->
        <div class="tweetBox">
            <form action="{{ url('ideas') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="tweetbox__input">
                    <img src="https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png"
                        alt="" />
                    <input type="text" name="title" placeholder="What's happening?" />
                </div>
                <div class="tweetbox__input">
                    <select name="categorey" id="">
                        <option value="sport">sport</option>
                        <option value="art">art</option>
                        <option value="movies">movies</option>
                        <option value="other">other</option>
                    </select>
                </div>
                <div class="tweetbox__input">
                    <input type="file"  name="content" id="">
                    <input type="submit" value="Post" class="btn btn-info btn-rounded" >
                </div>
            </form>
        </div>
        <!-- tweetbox ends -->
    </div>
    @foreach($posts as $item)
    <div class="card">
        <main>
            <div class="post__body">
                <header class="user">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                        alt="">
                    <div class="user-info">
                        <h2 class="user-info-name">{{$item->user->name}}</h2>
                        <p class="user-info-time">4 min ago</p>
                    </div>
                </header>
                <div class="post__header">
                    <div class="post__headerDescription">
                        <p>{{$item->title}}</p>
                    </div>
                </div>
                <img src="{{url('/images')}}/{{$item->content}}"
                    alt="" style="width: 100%;" />
                <section class="d-flex justify-content-around">
                    <p>40 Likes</p>
                    <p class="comment">10 comment</p>
                </section>
                <div class="container comment_show">
                    @foreach($item->comments as $comment)

                    <header class="user mt-1">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="user-info">
                            <main>
                                <h2 class="user-info-name">{{$comment->user->name}}</h2>
                                <p>{{$comment->content}}</p>
                                <input type="hidden" name="id_comment" class="comment_id" id="" value="{{$comment->id}}">
                            </main>
                        </div>
                    </header>

                    <hr>
                    
                    @endforeach
                    {{-- <header class="user mt-1">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="user-info">
                            <main>
                                <h2 class="user-info-name">Dadda Hicham</h2>
                                <p>We are facing a serious business dilemma, with Facebook taking  . </p>
                            </main>
                        </div>
                    </header>
                    <hr> --}}
                </div>
                <div class="container">
                    <form action="{{ url('comments') }}" method=post class=" d-flex justify-content-between ">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="comment"  placeholder="Type something...">
                        <input type="hidden" name="post_id"  value="{{$item->id}}">
                        <input type="submit" class="btn btn-info" value="comment">
                    </form>
                    <div>
                        <input type="text" name="comment" class="comment" placeholder="Type something...">
                        <input type="hidden" name="post_id" class="id_post" value="{{$item->id}}">
                        <button class="btn btn-info" onclick="addComment(event)">comment</button>
                    </div>

                </div>
                
            </div>
        </main>
    </div>
    @endforeach
@stop
@section('script')
<script type="">
    var xhttp = new XMLHttpRequest();
    function addComment(ev) {
        let pr = ev.target.parentElement.parentElement.parentElement.querySelector('.comment_show');
        console.log(pr);
        let val1 = ev.target.parentElement.querySelector('.comment').value;
        let val2 = ev.target.parentElement.querySelector('.id_post').value;
        var url = "{{ url('comments') }}"; // replace with the URL for your route
        var data = "comment="+val1+"&post_id="+val2; // replace with the data you want to send in the format of "key=value&key2=value2"
        console.log(val1);
        console.log(val2);
        xhttp.open("POST", url);
        xhttp.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // xhttp.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        xhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Request finished and response is ready, handle the response here
            var data = JSON.parse(this.responseText);
            console.log(data.status + '-' + data.message)
            console.log(data.last_id)
            console.log(data.last_name)
            var ab = `<header class="user mt-1">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="user-info">
                            <main>
                                <h2 class="user-info-name">${data.last_name}</h2>
                                <p>${data.last_comment}</p>
                                <input type="hidden" name="id_comment" class="comment_id" id="" value="${data.last_id_post}">
                            </main>
                        </div>
                    </header>
                    <hr>`
                    // let newDiv = document.createElement('div');
                    // newDiv.innerHTML = ab;
                    // console.log(newDiv);
            // console.log(this.responseText);
            pr.innerHTML += ab;
        }
        };
        xhttp.send(data);


    }
</script>
@stop