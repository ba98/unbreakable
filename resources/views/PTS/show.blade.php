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
}
#form{
    margin-top: 200px !important;
}
</style>

<div class="container emp-profile">
    <h3 style="text-align: center; color: #000;">Schedule a Private Training Session</h3><br>
    <form method="get" action="/pts/{{$coach->id}}/notifyCoach" id="form">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="dt">Date and Time</label>
                </div>
                <div class="col-md-6">
                    <label for="dt">Note</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="datetime" class="form-control datetimepicker-input" id="dt" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="note" maxlength="100" placeholder="Write a note if you wish... "/>
                </div>
            </div>
        </div>
        <input type="hidden" name="memberID" value="{{auth()->user()->id}}">
        <input type="hidden" name="memberName" value="{{auth()->user()->name}}">
        <input type="hidden" name="coachID" value="{{$coach->id}}">
        <input type="hidden" name="coachName" value="{{$coach->name}}">
        {{Form::hidden('_method', 'POST')}}
        <div class="container" style="text-align: center;">
            <button class="btn btn-dark" style="background-color: #4c648c" onclick="return confirm('Are you sure you want to send this request!');">Send a Request</button><br>
        </div>
    </form>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
</div>
@endsection
