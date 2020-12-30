@extends('layouts.admin')
@section('content')

@php
    use App\User;
    $users = User::orderBy('created_at', 'desc')->paginate(10);
@endphp
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

<div id="showMe">
@include('inc.adminNav')
@include('inc.adminSide')
<div class="container">
    <div style="width:100%;text-align:center; ">
        <h2>Manage Users</h2>
    </div>
</div>
<div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped" style="font-size:14 !important;">
                            <thead>
                                <tr style="background-color: rgb(53, 53, 53); color: #fff">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->member_ban($user->id) == "Banned")
                                    <tr style="background-color: #bb2112">
                                    @else
                                    <tr style="background-color: #fff">
                                    @endif
                                        <td style="background-color: #000; color: #fff">{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->phone_num}}</td>
                                        <td><span class="block-email">{{$user->email}}</span></td>
                                        <td>
                                            @if ($user->role == "Member")
                                                {!!Form::open(['action' => ['UsersController@updateUserStatus', $user->id], 'method' => 'GET'])!!}
                                                {{Form::hidden('_method', 'PUT')}}
                                                    @if($user->member_ban($user->id) == 'Not Banned')
                                                        <input name="ban_status" value="Banned" type="hidden">
                                                        <button type="submit" class="btn btn-danger">Block</button>
                                                    @else
                                                        <input name="ban_status" value="Not Banned" type="hidden">
                                                        <button type="submit" class="btn btn-dark">Unblock</button>
                                                    @endif
                                                {!!Form::close()!!}
                                            @else
                                            No Action
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
