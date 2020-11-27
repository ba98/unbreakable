@extends('layouts.app')

@section('content')
@include('inc.sidebar')
@php
    use App\Comment;
@endphp
<div class="container">
    <div class="row" style="justify-content:center; font-family: 'Gotu', sans-serif;">
        <div class="col-md-6">
            <div class="page-header">
                <h1>Discussions</h1><hr><br><br>
            </div>
        </div>
    </div>
</div>
@foreach($discussions as $discussion)
@php
    $Comments = Comment::where('commentable_id', '=', $discussion->id)->get();
    $noOfComments = $Comments->count();

    $date = substr($discussion->created_at, 0, -9);
@endphp
<div class="container col-md-8">
    <div class="row" style="justify-content:center; font-family: 'Gotu', sans-serif;">
        <div id="login-container">
            <img class="profile-img" src="../storage/images/{{$discussion->user->image}}">
            <h2>
                {{$discussion->user_name}}
            </h2>
            <div class="description">
                {{$discussion->caption}}
            </div>

            <div style="justify-content: center; text-align: center;">
                <a href="/posts/{{$discussion->id}}">
                    <button><i class="far fa-comment-alt"></i> Reply</button>
                </a>
            </div><br>

            <footer>
                <div class="likes">
                <p>Shared on</p>
                <p>{{$date}}</p>
                </div>
                <div class="projects">
                <p>Replies</p>
                <p>{{$noOfComments}}</p>
                </div>
            </footer>
        </div>
    </div><br><br>
</div>
@endforeach
</div>
</div><!-- End of Sidebar -->
@endsection
