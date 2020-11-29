@extends('layouts.admin')
@section('content')

@php
    use App\User;
    $users = User::orderBy('created_at', 'desc')->get();
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
</style>
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
                                <tr style="background-color: #fff">
                                    <td style="background-color: #000; color: #fff">{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->phone_num}}</td>
                                    <td>
                                        <span class="block-email">{{$user->email}}</span>
                                    </td>
                                    <td><button class="btn btn-danger"> Block</button></td>
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
