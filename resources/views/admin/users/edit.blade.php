@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>

    <div class="row">
        <div class="col-sm-3">
            <img class="img-fluid img-circle" src="{{ $user->photo ? asset("images/users/".$user->photo->file) : "No images" }}" style="width:100%;">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action' => ['AdminUserController@update' , $user->id] , 'files' =>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active',array('1' => "Active" , '0' => "Not Active"), null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id',[''=> "choose Options"] + $roles , null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'photo') !!}
                {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User' , ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}



            {!! Form::model($user,['method'=>'DELETE','action' => ['AdminUserController@destroy' , $user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User' , ['class' => 'btn btn-danger    ']) !!}
            </div>

            {!! Form::close() !!}





        </div>
    </div>



    @include('includes.errors.error')

@endsection
{{--197--}}
