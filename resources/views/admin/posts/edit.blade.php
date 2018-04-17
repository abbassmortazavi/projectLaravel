@extends('layouts.admin')

@section('content')
    <h1>Edit</h1>
    {!! Form::model( $post,['method'=>'PATCH','action' => ['AdminPostController@update' , 'id'=>$post->id] , 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null , ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id',$categories, null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Image') !!}
        {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description') !!}
        {!! Form::textarea('body', null , ['class' => 'form-control' , 'rows'=>3]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Post' , ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


    {!! Form::model($post,['method'=>'DELETE','action' => ['AdminPostController@destroy' , $post->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Post' , ['class' => 'btn btn-danger']) !!}
    </div>

    {!! Form::close() !!}

    @include('includes.errors.error')
@endsection
