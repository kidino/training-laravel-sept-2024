<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @session('success')
            <div class="mb-2 alert alert-success bg-green-100 border border-green-400 
            text-green-700 px-4 py-3 rounded relative" role="alert">
                <button type="button" 
                        class="absolute top-0 right-0 px-4 py-3 text-green-700" 
                        onclick="this.parentElement.style.display='none';" aria-label="Close">
                    &times;
                </button>
                {!! session('success') !!}
            </div>
        @endsession
        
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 dark:text-gray-100">


        <a href="{{ route('role.create') }}"
        class="inline-flex mb-2 items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        Add New</a>

        @if($roles->isEmpty())
            <p class="mt-4 ">No roles found.</p>
        @else
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Role Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $role->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $role->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $role->description }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('role.edit', $role->id) }}" class="bg-yellow-500 px-4 py-2 rounded hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-800">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
