@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<style>
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 20px;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #000;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    background-color: #4c648c;
    color: #000;
    border-bottom:2px solid #ababab;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 20px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #000;
}

#previmg{
    border-radius: 20px;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
    margin-top: 2px;
    object-fit: cover;
    width: 160px;
    height: 160px;
}
p{
    margin-top:10px !important;
}
</style>
<?php
use App\Post;
use App\Comment;
use Carbon\Carbon;
$userPosts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->get();
$moments = Post::where('user_id', '=', $user->id)->where('type', '!=', 'discussion')->get();
$discussions = Post::where('user_id', '=', $user->id)->where('type', '=', 'discussion')->get();
?>
<div class="container emp-profile">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                <img src="../storage/images/{{$user->image}}" alt="Photo of {{$user->name}}" style="object-fit: cover; width: 230px; height: 230px; border-radius:20px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);"/>

                <form action="{{ route('updateImage') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12">
                        <div class="file btn btn-lg btn-primary" id="changePhoto">
                            <div class="" style="justify-content:center; text-align:center;">
                                <div id="image_preview"></div>
                            </div>
                            Change Photo
                            <input type="file" name="image" class="form-control" id="image" onchange="preview_image();" multiple/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark">Upload</button>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h1><br>
                        {{$user->name}}
                    </h1>
                    <h6 style="margin-top:25px">
                        (Role: <strong>{{$user->role}}</strong>)
                    </h6>
                    @if(Auth()->user()->role == "Member")
                        @php
                            $timestamp = Carbon::parse($user->member_until($user->id))->timestamp;
                        @endphp
                        <p class="proile-rating">Member until: <span>{{date("M j, Y", $timestamp)}}</span></p>
                    @else
                        @php
                            $timestamp = Carbon::parse($user->created_at)->timestamp;
                        @endphp
                        <p class="proile-rating">Registered since : <span>{{date("M j, Y", $timestamp)}}</span></p>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="moment-tab" data-toggle="tab" href="#moment" role="tab" aria-controls="moment" aria-selected="false">Moments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="discussion-tab" data-toggle="tab" href="#discussion" role="tab" aria-controls="discussion" aria-selected="false">Discussions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div><br>
            <div class="col-md-8" style="margin:-5% 0px 0px 0px;">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                    style="border-style:solid; border-radius:20px; border-width:2px; border-color:#60779c; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-top:10px; margin-left:10px;">User ID: {{$user->id}}</label>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-top:10px; margin-left:10px;">User name: {{$user->name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="margin-top:10px; margin-left:10px;">E-mail: {{$user->email}}</label>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-top:10px; margin-left:10px;">Phone Number: {{$user->phone_num}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="moment" role="tabpanel" aria-labelledby="moment-tab">
                        @if($moments->Count() == 0)
                            <h6>You have not shared any moment yet!</h6>
                        @else
                        @foreach($userPosts as $userPost)
                            @if($userPost->type != "Discussion")
                            <div class="col-md-9">
                                <h6 style="color:#000; margin-top:10px; text-align:center;">{{$userPost->caption}}</h6>
                                <div class=" shadow-sm mx-auto" style="background-color:rgb(185, 185, 185); background-position: center; overflow: hidden; border-radius: 21px 21px 0 0; ">
                                <?php
                                    $imageName = strtr($userPost->images, "\"", " ");
                                    $imageName = explode(' , ',trim($imageName));
                                ?>
                                <a href="/posts/{{$userPost->id}}"><img src="images/{{$imageName[0]}}" alt="post image" style="width:100%; border-radius:21px 21px 0 0; padding:8px;"></a>
                                </div><br>
                            </div>
                            @endif
                        @endforeach
                        @endif
                    </div>

                    <div class="tab-pane fade" id="discussion" role="tabpanel" aria-labelledby="discussion-tab">
                        @if($discussions->Count() == 0)
                            <h6>You have not shared any discussion yet!</h6>
                        @else
                        @foreach($userPosts as $userPost)
                            @if($userPost->type == "Discussion")
                            <div class="col-md-9">
                                <div class="row" style="justify-content:center; font-family: 'Gotu', sans-serif;">
                                    <div id="login-container">
                                        <div class="description">
                                            {{$userPost->caption}}
                                        </div>
                                        <div style="justify-content: center; text-align: center;">
                                            <a href="/posts/{{$userPost->id}}">
                                                <button><i class="far fa-comment-alt"></i> Open</button>
                                            </a>
                                        </div><br>
                                    </div>
                                </div><br><br>
                            </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
