@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::model($category ,['method'=>'PATCH','action' => ['AdminCategoryController@update' ,'id'=>$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update Category' , ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


    <div class="col-sm-6">
        {!! Form::model($category ,['method'=>'DELETE','action' => ['AdminCategoryController@destroy' ,'id'=>$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Delete Category' , ['class' => 'btn btn-danger']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
