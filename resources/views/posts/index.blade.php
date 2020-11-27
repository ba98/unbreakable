@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row" style="justify-content:center; font-family: 'Gotu', sans-serif;">
        <div class="col-md-6">
            <div class="page-header">
                <h1>Training moments</h1><hr>
            </div>
        </div>
    </div>
</div>
@foreach ($posts as $post)
@php
    $date = substr($post->created_at, 0, -9);
@endphp
<div class="container">
    <div class="row" style="justify-content:center; font-family: 'Gotu', sans-serif;">
        <div class="col-md-5">
            <div class="d-md-flex flex-md-equal w-100 my-md-6 pl-md-6">
                <div class="text-center text-white overflow-hidden" style="border-radius: 21px 21px 0 0; margin-bottom:10px; background-color:#dddddd">
                <h6 style="color:#000; margin-top:10px">{{$post->user_name}}: {{$post->caption}}</h6>
                <div class="bg-light shadow-sm mx-auto" style="background-position: center; overflow: hidden; border-radius: 21px 21px 0 0;">
                <?php
                    
                    $imageName = strtr($post->images, "\"", " ");
                    $imageName = explode(' , ',trim($imageName));
                ?>
                <a href="/posts/{{$post->id}}"><img src="images/{{$imageName[0]}}" alt="post image" style="width:100%; border-radius:21px 21px 0 0; padding:8px;"></a>
                </div><br>
                <h6 style="color:rgb(88, 88, 88)">Shared on: {{$date}}</h6>
                {{-- <a href="/posts/{{$post->id}}">
                    <button class="desButton"><i class="far fa-comment-alt"></i> Open</button>
                </a> --}}
                </div><br>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
</div><!-- End of Sidebar -->
@endsection
