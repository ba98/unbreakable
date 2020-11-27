@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Weekly Training Schedule</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'WeeklyTrainingSchedulesController@store', 'method' => 'POST'])!!}
                    <div class="form-group row">
                        <label for="monday" class="col-md-4 col-form-label text-md-right">Monday: From</label>
                        <div class="col-md-3">
                            <input id="monday" type="text" class="form-control timepicker" name="mondayF">
                        </div>
                        <label for="monday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="monday" type="text" class="form-control timepicker" name="mondayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tuesday" class="col-md-4 col-form-label text-md-right">Tuesday: From</label>
                        <div class="col-md-3">
                            <input id="tuesday" type="text" class="form-control timepicker" name="tuesdayF">
                        </div>
                        <label for="tuesday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="tuesday" type="text" class="form-control timepicker" name="tuesdayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wednesday" class="col-md-4 col-form-label text-md-right">Wednesday: From</label>
                        <div class="col-md-3">
                            <input id="wednesday" type="text" class="form-control timepicker" name="wednesdayF">
                        </div>
                        <label for="wednesday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="wednesday" type="text" class="form-control timepicker" name="wednesdayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="thursday" class="col-md-4 col-form-label text-md-right">Thursday: From</label>
                        <div class="col-md-3">
                            <input id="thursday" type="text" class="form-control timepicker" name="thursdayF">
                        </div>
                        <label for="thursday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="thursday" type="text" class="form-control timepicker" name="thursdayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="friday" class="col-md-4 col-form-label text-md-right">Friday: From</label>
                        <div class="col-md-3">
                            <input id="friday" type="text" class="form-control timepicker" name="fridayF">
                        </div>
                        <label for="friday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="friday" type="text" class="form-control timepicker" name="fridayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="saturday" class="col-md-4 col-form-label text-md-right">Saturday: From</label>
                        <div class="col-md-3">
                            <input id="saturday" type="text" class="form-control timepicker" name="saturdayF">
                        </div>
                        <label for="saturday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="saturday" type="text" class="form-control timepicker" name="saturdayT">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sunday" class="col-md-4 col-form-label text-md-right">Sunday: From</label>
                        <div class="col-md-3">
                            <input id="sunday" type="text" class="form-control timepicker" name="sundayF">
                        </div>
                        <label for="sunday" class=" col-md-1 col-form-label text-md-right">To</label>
                        <div class="col-md-3">
                            <input id="sunday" type="text" class="form-control timepicker" name="sundayT">
                        </div>
                    </div>

                    {{Form::submit('Submit' , ['class' =>[ 'btn btn-dark', 'float-right']])}}
                    {!! Form::close() !!}

                   {{--  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
