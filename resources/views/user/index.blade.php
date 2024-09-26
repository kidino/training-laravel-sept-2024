<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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


    <table class="min-w-full bg-white border border-gray-200 mt-2 mb-2">
    <thead>
        <tr class="bg-gray-200 text-gray-600">
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">NAME</th>
            <th class="px-4 py-2 text-left">EMAIL</th>
            <th class="px-4 py-2 text-left"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $user->id }}</td>
            <td class="px-4 py-2">{{ $user->name }}</td>
            <td class="px-4 py-2">{{ $user->email }}</td>
            <td class="px-4 py-2 text-right">
                <a href="{{ route('user.edit', $user->id) }}" 
                   class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded-md">
                    EDIT
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
</div>
</div>
</x-app-layout>
