@extends('layout.main')

@section('main-content')

                <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
                <hr>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>NAME</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>EMAIL</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </tbody>
                </table>
@endsection