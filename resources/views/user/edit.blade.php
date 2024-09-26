<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User:') }} {{ $user->name }}
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
            @endsession            

            <form method="post" action="{{ route('user.update', $user->id ) }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')


                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"  :value="old('email', $user->email)" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <div>
                    <x-input-label for="password" :value="__('Password (only enter to update or leave blank)')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password', '')" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>


                <div class="mb-4">
                    <x-input-label :value="__('Roles')" />
                    @foreach($roles as $role)
                        <div class="flex items-center">
                            <input id="role-{{ $role->id }}" type="checkbox" name="roles[]" 
                            value="{{ $role->id }}" 
                            {{ $user->roles->contains($role->id) ? 'checked' : '' }} class="mr-2">
                            <label for="role-{{ $role->id }}" class="text-sm">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>


                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>


                </form>


            </div>
        </div>
    </div>
</x-app-layout>
