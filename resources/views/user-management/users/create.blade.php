<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between sm:flex-row pt-4 pb-4">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                {{ __('User Management') }} / <a href="{{ route('user-management.users.index') }}" class=" hover:text-indigo-600">{{ __('Users') }}</a> / {{ __('Create') }}
            </h2>
        </div>
    </x-slot>

</x-app-layout>
