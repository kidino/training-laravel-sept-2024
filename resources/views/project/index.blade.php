@extends('layout.main')

@section('main-content')

    @session('success')
        <div class="alert alert-success">
            <button type="button" 
            class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {!! session('success') !!}
        </div>
    @endsession

    <a href="{{ route('project.create') }}" 
        class="btn btn-primary float-end">
        Create New Project
    </a>

    <h2>Projects</h2>
    {{ $projects->links() }}

    <table class="table">
        <thead>
            <tr>
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
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->user->name }}</td>
                <td>
                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary">
                        EDIT
                    </a>
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


    {{ $projects->links() }}
@endsection