@extends('layouts.master')
@section('location')
Edit user
@endsection
@section('content')
<div class="container well">

    <form action="{{action('UsersController@update', $user->id)}}" method="post">
        {{csrf_field()}}
        
        {{method_field('PUT')}}

        <div class="form-group col-lg-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}" required>
        </div>

        <div class="form-group col-lg-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
        </div>

        <div class="form-group col-lg-2">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
        </div>

        <div class="form-group col-lg-3">
            <label for="password_confirmation">Password confirmation:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
        </div>

        <div class="form-group col-lg-3">
            <label for="type">Type of department:</label>
            <select name="type" id="type" class="form-control">
                <option value="0" @if($user->type == 'sales') selected @endif>Sales</option>
                <option value="1" @if($user->type == 'finance') selected @endif>Finance</option>
                <option value="2" @if($user->type == 'development') selected @endif>Development</option>
            </select>
        </div>
        <div class="form-group pull-right col-lg-2">
            <input type="submit" class="btn btn-primary col-lg-12" value="Confirm">
        </div>
    </form>
</div>
@endsection