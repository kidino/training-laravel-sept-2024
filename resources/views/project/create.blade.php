<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">



            <form action="{{ route('project.store') }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror">
        @error('name')
        <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3"
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        @error('description')
        <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="user_id" class="block text-sm font-medium text-gray-700">Project Manager</label>
        <select name="user_id" id="user_id"
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('user_id') border-red-500 @enderror">
            <option value="">[ -- please select project manager -- ]</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" @if( old('user_id') == $user->id ) selected @endif>
                [ {{ $user->id }} ] {{ $user->name }}
            </option>
            @endforeach
        </select>
        @error('user_id')
        <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <a href="{{ route('project.index') }}" class="text-indigo-600 hover:text-indigo-800">CANCEL</a>
    <button type="submit"
        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        SUBMIT
    </button>
</form>


    </div>
    </div>
    </div>
</x-app-layout>
