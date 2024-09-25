<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-8">
                <div class="max-w-xl">


                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Edit Role') }}</h2>
                </header>


                @if(session('success'))
                    <div class="bg-green-500 text-white px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
                @endif    


                <form method="post" action="{{ route('role.update', $role->id ) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')


                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  :value="old('name', $role->name)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"  :value="old('description', $role->description)" required autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>


                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>


                </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
