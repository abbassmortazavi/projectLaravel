@extends('layouts.admin')


@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['action' => 'AdminCategoryController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        @include('includes.errors.error')
    </div>


    <div class="col-sm-6">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>create at</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>
                            <a href="{{ route('cats.edit' , ['id'=>$cat->id]) }}">
                                {{ $cat->name }}
                            </a>
                        </td>
                        <td>{{ $cat->created_at ? $cat->created_at->diffForHumans() : "no date" }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection