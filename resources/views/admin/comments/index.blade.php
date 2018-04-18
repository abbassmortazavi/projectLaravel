@extends('layouts.admin')



@section('content')
    <h1 class="text-info">All Comments</h1>


    @if(count($comments) > 0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Approve</th>
                <th>body</th>
                <th>Email</th>
                <th>View</th>
                <th>image</th>
                <th>Operation</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->author }}</td>
                    <td>{{ $comment->approve }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>
                        <a href="{{ route('home.post' , $comment->post->id) }}">View post</a>
                    </td>
                    <td>
                        <img src="{{ $comment->photo ? asset("images/users/".$comment->photo) : "no image" }}">
                    </td>


                    <td>
                        @if($comment->approve == 1)
                            {!! Form::open(['method'=>'PATCH','action' => ['PostCommentController@update' , $comment->id]]) !!}

                            <input type="hidden" name="approve" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve' , ['class' => 'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}
                            @else
                            {!! Form::open(['method'=>'PATCH','action' => ['PostCommentController@update' , $comment->id]]) !!}

                            <input type="hidden" name="approve" value="1">
                            <div class="form-group">
                                {!! Form::submit('approve' , ['class' => 'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE','action' => ['PostCommentController@destroy' , $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center text-info">No comments</h1>
    @endif
@stop