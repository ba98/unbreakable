@extends('layouts.admin')
@section('content')

@include('inc.adminSide')

<style>
    #red{
        color: red;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register New Users') }}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST'])!!}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> {{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> Role</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" id="smt-fld-1-3" name="role" value="Manager"> Manager
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" id="smt-fld-1-2" name="role" value="Staff"> Staff
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" id="smt-fld-1-2" name="role" value="Coach"> Coach
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" id="smt-fld-1-3" name="role" value="Member" checked> Member
                                    </label>
                                </div>
                            </div>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="salary" class="col-md-4 col-form-label text-md-right">Salary</label>

                        <div class="col-md-6">
                            {{Form::text('salary', '', ['class' => 'form-control', 'placeholder' => 'Staff/Coach Salary'])}}

                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_num" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> Phone Number</label>

                        <div class="col-md-6">
                            {{Form::text('phone_num', '', ['class' => 'form-control', 'placeholder' => '', 'required'])}}

                            @error('phone_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> {{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> {{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span id="red">*</span> {{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    {{Form::submit('Register' , ['class' =>[ 'btn btn-dark', 'float-right']])}}
                    {!! Form::close() !!}

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
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

@endsection
