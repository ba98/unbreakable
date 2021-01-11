@extends('layouts.admin')
@section('content')
<style>
    html, body{
        width:100% !important;
        padding:0 !important;
        margin:0 !important;
        overflow-x: hidden !important;
    }

    #sidebar .sidebar-header{
        padding-left: 20px !important;
        margin-bottom: -38px !important;
        background: #151516;
    }

    h3{
        font-size: 24px !important;
    }

    #showMe {
    animation: cssAnimation 0s .5s forwards;
    visibility: hidden;
    }

    @keyframes cssAnimation {
    to   { visibility: visible; }
    }
</style>
@php
    use App\PrivateTrainingSession;
    $ptss = PrivateTrainingSession::orderBy('created_at', 'desc')->get();
@endphp

<div id="showMe">
@include('inc.adminSide')

<div class="container">
    <div style="width:100%;text-align:center; ">
        <h2>Private Training Sessions</h2>
        <h6>Newest to oldest</h6>
    </div>
</div>
<div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped" style="font-size:14 !important;">
                            <thead>
                                <tr  style="background-color: rgb(53, 53, 53); color: #fff">
                                    <th>Member</th>
                                    <th>Coach</th>
                                    <th>Session D/T</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptss as $pts)
                                <tr style="background-color: #fff">
                                    <td style="background-color: #000; color: #fff">{{$pts->member_id}} {{$pts->member_name}}</td>
                                    <td>{{$pts->coach_name}}</td>
                                    <td>{{$pts->session_datetime}}</td>
                                    @if ($pts->status == "Accepted")
                                    <td style="color: green">{{$pts->status}}</td>
                                    @else
                                    <td style="color: red">{{$pts->status}}</td>
                                    @endif
                                    <td>
                                        <span class="block-email">{{$pts->note}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="justify-content:center;">
            <a href="http://unbreakable.me/admin/dashboard" role="button" class="btn btn-dark" style="margin: 10px; color: #fff !important;">
                <i class="fas fa-users-cog"></i>
                Back
            </a>
        </div>
    </div>
{{-- Close sidebar --}}
</div>
</div>
