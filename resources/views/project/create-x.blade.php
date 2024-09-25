<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"></div>

    <form action="{{ route('project.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
            class="form-control @error('name') is-invalid @enderror">
            <div class="invalid-feedback">@error('name') {{ $message }} @enderror </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="3" 
            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            <div class="invalid-feedback">@error('description') {{ $message }} @enderror </div>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Project Manager</label>
            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" >
                <option value="">[ -- please select project manager -- ]</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" 
                @if( old('user_id') == $user->id ) selected @endif >[ {{ $user->id }} ] {{ $user->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">@error('user_id') {{ $message }} @enderror </div>

        </div>
        <a href="{{ route('project.index') }}" class="btn btn-info">CANCEL</a>
        <button type="submit" class="btn btn-primary">SUBMIT</button>
    </form>

    </div>
    </div>
    </div>
</x-app-layout>
