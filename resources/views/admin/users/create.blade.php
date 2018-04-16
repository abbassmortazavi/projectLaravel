@extends('layouts.admin')


@section('content')
    <h1>Create User</h1>

    {!! Form::open(['action' => 'AdminUserController@store' , 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'email') !!}
        {!! Form::email('email', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id',[''=>'choose options'] + $roles , null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Active') !!}
        {!! Form::select('is_active',array(1=>'Active' , 0=>'Not Active') ,0, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'image') !!}
        {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'password') !!}
        {!! Form::text('password', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post!' , ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
{{--197--}}