@extends('layouts.admin')


@section('content')
    <h1>Media</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td>
                        <a href="">
                            <img class="img-fluid" src="{{ $photo->file ? asset('images/photos/'.$photo->file) : "no photo" }}" style="width: 20%;">
                        </a>
                    </td>
                    <td>{{ $photo->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection