@extends('layouts.admin')

@section('content')
    @if(Session::has('delete_user'))
        <div class="alert alert-danger">
            <h1>{{ Session::get('delete_user') }}</h1>
        </div>
    @endif
    <h1>Users Page</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
            <th>userImage</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name == null ? "ندارد" : $user->role->name}}</td>
                    <td>{{ $user->is_active == 1 ? "active" : "deActive" }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('users.edit' , ['id' => $user->id]) }}">
                            <img class="img-fluid" src="{{ $user->photo ? asset("images/users/".$user->photo->file) : "no photos" }}" style="width: 40%;">
                        </a>

                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection

