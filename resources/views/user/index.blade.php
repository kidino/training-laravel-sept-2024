@extends('layout.main')

@section('main-content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('user.show', $user->id) }}" 
            class="btn btn-sm btn-primary">EDIT</a></td>
        </tr>
    @endforeach 
        </tbody>
    </table>
@endsection