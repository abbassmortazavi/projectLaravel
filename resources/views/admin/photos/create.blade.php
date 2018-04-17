@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endsection

@section('content')
    <h1>Photos Create</h1>
    {!! Form::open(['method'=>'post' , 'action' => 'AdminPhotoController@store' , 'class'=>'dropzone']) !!}


    {!! Form::close() !!}
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@endsection
