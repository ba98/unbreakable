@extends('layouts.admin')
@section('content')

@php
    use App\WeeklyTrainingSchedule;
    $wtss = WeeklyTrainingSchedule::orderBy('created_at', 'desc')->take(10)->get();
@endphp
<style>
    html, body{
        width:100% !important;
        padding:0 !important;
        margin:0 !important;
        overflow-x: hidden !important;
    }
    #black{
        color: #000 !important;
    }
    #sidebar .sidebar-header{
        padding-left: 20px !important;
        margin-bottom: -38px !important;
        background: #151516;
    }
    h3{
        font-size: 24px !important;
    }
</style>
@include('inc.adminNav')
@include('inc.adminSide')
<div class="container">
    <div style="width:100%;text-align:center; ">
        <h2>Weekly Training Schedules</h2>
    </div>
</div>
<div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table--no-card">
                        <table class="table table-borderless table-striped" style="font-size:14px !important;">
                            <thead>
                                <tr style="background-color: rgb(53, 53, 53); color: #fff">
                                    <th id="titles">Coach</th>
                                    <th id="titles">Mon</th>
                                    <th id="titles">Tue</th>
                                    <th id="titles">Wed</th>
                                    <th id="titles">Thur</th>
                                    <th id="titles">Fri</th>
                                    <th id="titles">Sat</th>
                                    <th id="titles">Sun<th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wtss as $wts)
                                @php
                                    $monFrom = substr($wts->monday, 0, -10);
                                    $monTo = substr($wts->monday, 10);
                                    $tueFrom = substr($wts->tuesday, 0, -10);
                                    $tueTo = substr($wts->tuesday, 10);
                                    $wedFrom = substr($wts->wednesday, 0, -10);
                                    $wedTo = substr($wts->wednesday, 10);
                                    $thurFrom = substr($wts->monday, 0, -10);
                                    $thurTo = substr($wts->thursday, 10);
                                    $friFrom = substr($wts->friday, 0, -10);
                                    $friTo = substr($wts->friday, 10);
                                    $satFrom = substr($wts->saturday, 0, -10);
                                    $satTo = substr($wts->saturday, 10);
                                    $sunFrom = substr($wts->sunday, 0, -10);
                                    $sunTo = substr($wts->sunday, 10);
                                @endphp
                                <tr style="background-color: #fff">
                                    <td style="background-color: #000; color: #fff">{{$wts->coach_id}} {{$wts->coach_name}}</td>
                                    <td id="black">-{{$monFrom}}<br>-{{$monTo}}</td>
                                    <td id="black">-{{$tueFrom}}<br>-{{$tueTo}}</td>
                                    <td id="black">-{{$wedFrom}}<br>-{{$wedTo}}</td>
                                    <td id="black">-{{$thurFrom}}<br>-{{$thurTo}}</td>
                                    <td id="black">-{{$friFrom}}<br>-{{$friTo}}</td>
                                    <td id="black">-{{$satFrom}}<br>-{{$satTo}}</td>
                                    <td id="black">-{{$sunFrom}}<br>-{{$sunTo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Template by <a href="https://colorlib.com">Colorlib</a>.</p>                                </div>
                </div>
            </div>
        </div>
    </div>
</div>
