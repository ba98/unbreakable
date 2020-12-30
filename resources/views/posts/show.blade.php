@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<?php
    use App\Comment;
    use App\User;
    use Carbon\Carbon;

    $Comments = Comment::where('commentable_id', '=', $posts->id)->get();
    $noOfComments = $Comments->count();

    $user = User::where('id', '=', $posts->user_id)->first();
    $userImage = $user->image;

    $imageName = strtr($posts->images, "\"", " ");
    $imageName = explode(' , ',trim($imageName));

    $date = substr($posts->created_at, 0,-9);
?>
<style>
    .display-comment .display-comment {
        margin-left: 25px
    }
    .userimg{
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        border-radius: 50% !important;
        object-fit: cover;
        width: 70px;
        height: 70px;
    }
</style>
<div class="conatiner">
    @if(Auth::user()->id == $posts->user_id)
        {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'DELETE', 'class' => 'float-right'])!!}
            <button type="submit" class=" btn btn-danger float-right" onclick="return confirm('Are you sure you want to delete this post permanently?');"><i class="far fa-trash-alt"></i></button>
        {!!Form::close()!!}
        {!!Form::open(['action' => ['PostsController@edit', $posts->id], 'method' => 'GET', 'class' => 'float-right'])!!}
            <button type="submit" class=" btn btn-dark float-right" style="margin-right: 10px;"><i class="far fa-edit"></i></button>
        {!!Form::close()!!}
    @endif
</div><br><br>
<div class="container">
    <div class="row" style="justify-content:center;">
        <div class="col-md-7" style="border-radius: 20px; background-color:#dddddd"><br>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-">
                        <img class="userimg" src="../storage/images/{{$userImage}}" alt="{{$posts->user_name}}" style="margin-left:10px">
                    </div>
                    <div class="col-md-10"><br>
                        <h5 style="color:#000; margin-top:10px;"><strong>{{$posts->user_name}}:</strong> {{$posts->caption}}</h5><hr style="background-color: #000">
                    </div>
                </div>
            </div>

            @if(count($imageName) >= 1)
                @foreach ($imageName as $i => $imageName)
                    <div class="d-md-flex flex-md-equal w-100 my-md-8 pl-md-8">
                        <div class="overflow-hidden" style="border-radius: 21px 21px 0 0; margin-bottom:10px; background-color:#fff">
                            <div class="shadow-sm mx-auto" style="background-position: center; overflow: hidden; border-radius: 21px 21px 0 0; background-color: #dddddd">
                                <img src="../images/{{$imageName}}" alt="" style="width:100%;height:auto; border-radius:21px 21px 0 0; padding:8px;">
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h2></h2>
            @endif

            <div class="row">
                <div class="col-md-6">
                    @if($noOfComments == 0)
                    <h6 style="color:#000; padding-left:10px;"><strong>No Comments!</strong></h6>
                    @elseif($noOfComments == 1)
                    <h6 style="color:#000; padding-left:10px;"><strong><?php echo $noOfComments;?> Comment</strong></h6>
                    @else
                    <h6 style="color:#000; padding-left:10px;"><strong><?php echo $noOfComments;?> Comments</strong></h6>
                    @endif
                </div>
                @php
                    $timestamp = Carbon::parse($date)->timestamp;
                @endphp
                <div class="col-md-6">
                    <h6 class="float-right" style="color:#000;"><strong>Shared on: {{date("M j, Y", $timestamp)}}</strong></h6>
                </div>
            </div>
            <hr>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group" style="padding-left:10px;">
                    <input type="text" name="comment_body" class="form-control" placeholder="Write a comment..."/>
                    <input type="hidden" name="post_id" value="{{$posts->id}}"/>
                </div>
                <div class="form-group" style="padding-left:10px;">
                    <button class="desButton" type="submit"><i class="fas fa-keyboard"></i> Comment</button>

                </div>
            </form>
            @include('posts.commentReplies', ['comments' => $posts->comments, 'post_id' => $posts->id])
        </div>
        </div>
    </div>
        <br>
    </div>
</div>
<!-- End of Sidebar -->
@endsection
