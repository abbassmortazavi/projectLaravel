@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>userName</th>
            <th>categoryId</th>
            <th>imageId</th>
            <th>Title</th>
            <th>body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category ? $post->category->name : "No Category"}}</td>
                    <td>
                        @if($post->photo)
                            <a href="{{ route('posts.edit' , ['id'=>$post->id]) }}">
                                <img class="img-fluid" src="{{ asset("images/posts/".$post->photo->file) }}"
                                     style="width: 40%;">
                            </a>


                        @else
                            <h5>عکس ندارد</h5>
                        @endif

                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForhumans() }}</td>
                    <td>{{ $post->updated_at->diffForhumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
