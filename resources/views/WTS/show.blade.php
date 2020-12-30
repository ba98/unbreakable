@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<style>
.emp-profile{
    padding: 5%;
    margin-top: 5%;
    margin-bottom: 5%;
    border-radius: 0.5rem;
    background: #fff;
    max-width: 500px;
}
#schedule{
    margin-top: 70px !important;
    text-align: center !important;
}
</style>
<div class="container emp-profile">
    <h3 style="text-align: center; color: #000;">This Week's Training Schedule</h3><br>
    <div class="container" id="schedule">
        <h5>Coach {{ $wts->coach_name }}</h5><hr>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @if($wts->monday != ' - ')
                        <li>
                            <strong>Monday:</strong> {{ $wts->monday }}
                        </li>
                    @endif
                    @if($wts->tuesday != ' - ')
                        <li>
                            <strong>Tuesday:</strong> {{ $wts->tuesday }}
                        </li>
                    @endif
                    @if($wts->wednesday != ' - ')
                        <li>
                            <strong>Wednesday:</strong> {{ $wts->wednesday }}
                        </li>
                    @endif
                    @if($wts->thursday != ' - ')
                        <li>
                            <strong>Thursday:</strong> {{ $wts->thursday }}
                        </li>
                    @endif
                    @if($wts->friday != ' - ')
                        <li>
                            <strong>Friday:</strong> {{ $wts->friday }}
                        </li>
                    @endif
                    @if($wts->saturday != ' - ')
                            <li>
                                <strong>Saturday:</strong> {{ $wts->saturday }}
                            </li>
                    @endif
                    @if($wts->sunday != ' - ')
                        <li>
                            <strong>Sunday:</strong> {{ $wts->sunday }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: center;">
        <a href="http://unbreakable.me/pts/{{$wts->coach_id}}"><button class="btn btn-dark" style="background-color: #4c648c">Request a Private Training Session</button></a><br>
    </div>
</div>
@endsection
