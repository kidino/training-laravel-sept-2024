@extends('layout.main')

@section('main-content')

    @session('success')
        <div class="alert alert-success">
            <button type="button" 
            class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {!! session('success') !!}
        </div>
    @endsession

    @error('delete_ids')
        <div class="alert alert-danger">
            <button type="button" 
            class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ $message }}
        </div>
    @enderror    

    <a href="{{ route('project.create') }}" 
        class="btn btn-primary float-end">
        Create New Project
    </a>

    <h2>Projects</h2>
    {{ $projects->links() }}

    <form action="{{ route('project.destroy-many') }}" method="POST"
        onsubmit="return confirm('Are you sure to delete these records?');">
    @csrf 
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PM</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        @forelse ($projects as $project)
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox" 
                    name="delete_ids[]" id="delete-{{ $project->id }}" 
                    value="{{ $project->id }}">
                </td>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->user->name }}</td>
                <td>
                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary">
                        EDIT
                    </a>

                    <!-- <form action="{{route('project.destroy', $project->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                    </form> -->
                </td>
            </tr>
        @empty 
            <tr>
                <td colspan="4" style="height: 100px; text-align: center; vertical-align:middle;">
                    No projects found. Create a new project to get started. 
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    </form>

    {{ $projects->links() }}
@endsection