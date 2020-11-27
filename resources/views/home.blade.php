@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="text-align:center; margin-top: 100px;">
            <h1 style="font-family: 'Gotu', sans-serif; font-size:5vw">You are</h1>
            <h1 style="font-family: 'Gotu', sans-serif; font-size:10vw">UN<span class="text-primary">break</span>able.</h1>
            <h3 style="font-family: 'Gotu', sans-serif; margin-top:12vh"><span class="text-primary">◦ </span><span class="typed-words"></span></h3><br><br>
            @guest
                <p><a class="btn btn-light" href="/login" role="button" style="font-family: 'Gotu', sans-serif;">Log in <i class="fas fa-sign-in-alt"></i></a></p>
            @endguest
        </div>
        <div class="col-md-3 d-none d-md-block">
            <img src="images/Gym.png" alt="" style="width:30rem; margin-left:-10px" id="homeimg">
        </div>
    </div>
</div>
@include('inc.footer')
@endsection
