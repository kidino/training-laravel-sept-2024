<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">


    @session('success')
    <div class="mb-2 alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <button type="button" 
                class="absolute top-0 right-0 px-4 py-3 text-green-700" 
                onclick="this.parentElement.style.display='none';" aria-label="Close">
            &times;
        </button>
        {!! session('success') !!}
    </div>
@endSession

@error('delete_ids')
    <div class="mb-2 alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <button type="button" 
                class="absolute top-0 right-0 px-4 py-3 text-red-700" 
                onclick="this.parentElement.style.display='none';" aria-label="Close">
            &times;
        </button>
        {{ $message }}
    </div>
@enderror    

<a href="{{ route('project.create') }}" class="btn btn-primary float-end bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
    Create New Project
</a>


<form action="{{ route('project.destroy-many') }}" method="POST"
      onsubmit="return confirm('Are you sure to delete these records?');">
    @csrf 
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
        Delete
    </button>
<div class="mt-3"></div>
{{ $projects->links() }}


    <table class="min-w-full bg-white border border-gray-200 mt-2 mb-2">
        <thead>
            <tr class="bg-gray-200 text-gray-600">
                <th class="px-4 py-2 text-left"></th>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">NAME</th>
                <th class="px-4 py-2 text-left">DESCRIPTION</th>
                <th class="px-4 py-2 text-left">PM</th>
                <th class="px-4 py-2 text-left"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="border-b">
                    <td class="px-4 py-2">
                        <input class="form-check-input" type="checkbox" 
                               name="delete_ids[]" id="delete-{{ $project->id }}" 
                               value="{{ $project->id }}">
                    </td>
                    <td class="px-4 py-2">{{ $project->id }}</td>
                    <td class="px-4 py-2">{{ $project->name }}</td>
                    <td class="px-4 py-2">{{ $project->description }}</td>
                    <td class="px-4 py-2">{{ $project->user->name }}</td>
                    <!-- <td class="px-4 py-2">{-- $project->user_name --}</td> -->
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty  
                <tr>
                    <td colspan="6" class="text-center py-4">
                        No projects found. Create a new project to get started. 
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</form>

{{ $projects->links() }}

</div>
</div>
</div>
</x-app-layout>
