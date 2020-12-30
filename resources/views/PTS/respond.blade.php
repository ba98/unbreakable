@extends('layouts.app')

@section('content')
@include('inc.sidebar')

@php
    use App\PrivateTrainingSession;
    use App\User;

    $ptss = PrivateTrainingSession::where('coach_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    $pts_sent = PrivateTrainingSession::where('coach_id', auth()->user()->id)->where('status', "Sent")->count();
    $pts_status = PrivateTrainingSession::where('coach_id', auth()->user()->id)->where('status', "!=", "Sent")->count();
@endphp

<style>
    #down{
        margin-top: 200px;
    }
</style>
    <div class="container">
        <div class="jumbotron">
            @if ($ptss->count() > 0)
                @if ($pts_sent > 0)
                    <h3>New Requests</h3><hr>
                    <div class="container" id="down">
                @endif

                @foreach ($ptss as $pts)
                    @if ($pts->status == 'Sent')
                        @php
                            $member_phone = User::where("id", "=", $pts->member_id)->first("phone_num");
                            $member_image = User::where("id", "=", $pts->member_id)->first("image");
                            $num = substr($member_phone, 14,-2);
                            $image = substr($member_image, 10,-2);
                            $date = substr($pts->session_datetime, 0,-8);
                            $time = substr($pts->session_datetime, 10);
                        @endphp
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../storage/images/{{ $image }}" alt="Member Image" id="memberImage">
                            </div>
                            <div class="col-md-10"><br>
                                <h5>Member's name: <strong>{{ $pts->member_name }}</strong></h5>
                                <h5>Member's phone number: <strong>{{ $num }}</strong></h5>
                                <h5>Requested Session Date and Time: <strong>{{ $date }}</strong> at <strong>{{ $time }}</strong></h5><br>
                                <form method="get" action="/pts/{{ $pts->id }}/notifyMember" id="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="status" value="Accepted"
                                                class="btn btn-success" onclick="return confirm('Are you sure you want to ACCEPT this request!');">Accept</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="status" value="Rejected"
                                                class="btn btn-danger float-right" onclick="return confirm('Are you sure you want to REJECT this request!');">Reject</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="member_id" value="{{ $pts->member_id }}">
                                    <input type="hidden" method="POST">
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
                @if ($pts_sent > 0)
                    </div>
                @endif

                @if ($pts_status > 0)
                    <h3>History</h3><br>
                    <div class="container" id="down">
                @endif
                @foreach ($ptss as $pts)
                    @if ($pts->status != 'Sent')
                        @php
                            $member_phone = User::where("id", "=", $pts->member_id)->first("phone_num");
                            $member_image = User::where("id", "=", $pts->member_id)->first("image");
                            $num = substr($member_phone, 14,-2);
                            $image = substr($member_image, 10,-2);
                            $date = substr($pts->session_datetime, 0,-8);
                            $time = substr($pts->session_datetime, 10);
                        @endphp
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../storage/images/{{ $image }}" alt="Member Image" id="memberImage">
                            </div>
                            <div class="col-md-10"><br>
                                <h5>Member's name: <strong>{{ $pts->member_name }}</strong></h5>
                                <h5>Member's phone number: <strong>{{ $num }}</strong></h5>
                                <h5>Requested Session Date and Time: <strong>{{ $date }}</strong> at
                                    <strong>{{ $time }}</strong>
                                </h5>
                                <h5>Status: <strong>{{ $pts->status }}</strong></h5><br>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
                @if ($pts_status > 0)
                    </div>
                @endif
            @else
                <h2>You haven't received any request yet!</h2>
                <hr>
            @endif
        </div>
    </div>
@endsection
