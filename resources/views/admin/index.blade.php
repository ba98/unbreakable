@extends('layouts.admin')
@section('content')

@include('inc.adminNav')
@include('inc.adminSide')
@include('inc.messages')
    @php
        use App\User;
        use App\Post;
        use App\Comment;
        use Carbon\Carbon;

        $membersNum = User::where('role','=','Member')->count();
        $coachesNum = User::where('role','=','Coach')->count();
        $discussionsNum = Post::where('type','=','Discussion')->count();
        $momentsNum = Post::where('type','!=','Discussion')->count();

        $members = User::where('role', 'Member')->get();
        $coaches = User::where('role', 'Coach')->get();
        $moments = Post::where('type', '!=', 'Discussion')->paginate(20);
        $discussions = Post::where('type', 'Discussion')->paginate(50);
    @endphp
    <div class="container">
        <div class="row" style="justify-content:center;">
            <h4>Welcome {{auth()->user()->name}}. You are in control</h4>
        </div>
    </div>
    <div class="main-content" style="padding-top: 0px !important;">
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <a data-toggle="collapse" href="#collapseMembers" aria-expanded="false" aria-controls="collapseMembers">
                                    <i class="fas fa-users"></i>
                                </a>
                            </div>
                            <div class="text">
                            <h2>{{$membersNum}}</h2>
                                <a data-toggle="collapse" href="#collapseMembers" aria-expanded="false" aria-controls="collapseMembers">
                                    <span>Members</span>
                                </a>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <a data-toggle="collapse" href="#collapseCoaches" aria-expanded="false" aria-controls="collapseCoaches">
                                    <i class="fas fa-dumbbell"></i>
                                </a>
                            </div>
                            <div class="text">
                            <h2>{{$coachesNum}}</h2>
                            <a data-toggle="collapse" href="#collapseCoaches" aria-expanded="false" aria-controls="collapseCoaches">
                                <span>Coaches</span>
                            </a>
                        </div>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <a data-toggle="collapse" href="#collapseMoments" aria-expanded="false" aria-controls="collapseMoments">
                                    <i class="far fa-images"></i>
                                </a>
                            </div>
                            <div class="text">
                            <h2>{{$momentsNum}}</h2>
                            <a data-toggle="collapse" href="#collapseMoments" aria-expanded="false" aria-controls="collapseMoments">
                                <span>Moments</span>
                            </a>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <a data-toggle="collapse" href="#collapseDiscussions" aria-expanded="false" aria-controls="collapseDiscussions">
                                    <i class="fas fa-comments"></i>
                                </a>
                            </div>
                            <div class="text">
                            <h2>{{$discussionsNum}}</h2>
                            <a data-toggle="collapse" href="#collapseDiscussions" aria-expanded="false" aria-controls="collapseDiscussions">
                                <span>Discussions</span>
                            </a>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>

        </div>
        <div class="collapse" id="collapseMembers">
            <div class="card card-body">
                <div class="container">
                    <h4>Members Basic Information</h4><hr>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    <strong>Name</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Phone Number</strong>
                    </div>
                    <div class="col-md-4">
                        <strong>E-mail</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Member Until</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Renew Sub</strong>
                    </div>
                </div>
                @foreach ($members as $member)
                    <ul>
                        <div class="row">
                            <div class="col-md-2">
                                <li>{{$member->name}}</li>
                            </div>
                            <div class="col-md-2">
                                <li>{{$member->phone_num}}</li>
                            </div>
                            <div class="col-md-4">
                                <li>{{$member->email}}</li>
                            </div>
                            <div class="col-md-2">
                                @php
                                    $timestamp = Carbon::parse($member->member_until($member->id))->timestamp;
                                @endphp
                                <li>{{date("M j, Y", $timestamp)}}</li>
                            </div>
                            <div class="col-md-2">
                                <li>
                                    {!!Form::open(['action' => ['UsersController@renewSubscription', $member->id], 'method' => 'GET'])!!}
                                    {{Form::hidden('_method', 'PUT')}}
                                    @php
                                        if(Carbon::parse($member->member_until($member->id))->timestamp < Carbon::now()->timestamp){
                                            $today = Carbon::today();
                                            $addOneMonth = $today->add(1, 'month');
                                        }else{
                                            $until = Carbon::parse($member->member_until($member->id));
                                            $addOneMonth = $until->add(1, 'month');
                                        }
                                    @endphp
                                            <input name="renew" value="{{$addOneMonth}}" type="hidden">
                                            <button type="submit" class="btn btn-primary"
                                            onclick="return confirm('Are you sure you want to renew this membership for one month?');">Renew
                                            </button>
                                    {!!Form::close()!!}
                                </li>
                            </div>
                        </div>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="collapse" id="collapseCoaches">
            <div class="card card-body">
                <div class="container">
                    <h4>Coaches Basic Information</h4><hr>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <strong>Name</strong>
                    </div>
                    <div class="col-md-4">
                        <strong>Phone Number</strong>
                    </div>
                    <div class="col-md-4">
                        <strong>E-mail</strong>
                    </div>
                </div>
                @foreach ($coaches as $coach)
                    <ul>
                        <div class="row">
                            <div class="col-md-4">
                                <li>{{$coach->name}}</li>
                            </div>
                            <div class="col-md-4">
                                <li>{{$coach->phone_num}}</li>
                            </div>
                            <div class="col-md-4">
                                <li>{{$coach->email}}</li>
                            </div>
                        </div>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="collapse" id="collapseMoments">
            <div class="card card-body">
                <div class="container">
                    <h4>Moments</h4><hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Publisher</strong>
                        </div>
                        <div class="col-md-9">
                            <strong>Caption</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Open</strong>
                        </div>
                    </div>
                </div>
                <div class="container">
                @foreach($moments as $moment)
                    <ul>
                        <div class="row">
                            <div class="col-md-2">
                                <li>{{$moment->user_id}}-{{$moment->user_name}}</li>
                            </div>
                            <div class="col-md-9">
                                <li>{{$moment->caption}}</li>
                            </div>
                            <div class="col-md-1">
                                <li>
                                    <a href="/posts/{{$moment->id}}" class="btn btn-success">
                                        <button><i class="fas fa-search-plus"></i></button>
                                    </a>
                                </li>
                            </div>
                        </div><hr>
                    </ul>
                @endforeach
            {{ $moments->links() }}
            </div>
            </div>
        </div>
        <div class="collapse" id="collapseDiscussions">
            <div class="card card-body">
                <div class="container">
                    <h4>Discussions</h4><hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                        <strong>Publisher</strong>
                        </div>
                        <div class="col-md-9">
                            <strong>Content</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Open</strong>
                        </div>
                    </div>
                </div>
                <div class="container">
                @foreach($discussions as $discussion)
                    <ul>
                        <div class="row">
                            <div class="col-md-2">
                                <li>{{$discussion->id}}-{{$discussion->user_name}}</li>
                            </div>
                            <div class="col-md-9">
                                <li>{{$discussion->caption}}</li>
                            </div>
                            <div class="col-md-1">
                                <li>
                                    <a href="/posts/{{$discussion->id}}" class="btn btn-primary">
                                        <button><i class="fas fa-search-plus"></i></button>
                                    </a>
                                </li>
                            </div>
                        </div><hr>
                    </ul>
                @endforeach
            {{ $discussions->links() }}
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- End of Sidebar --}}
@endsection
