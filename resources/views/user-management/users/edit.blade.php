<x-app-layout>
    <x-header>
        <x-slot name="title">
            {{ __('User Management') }} / <a href="{{ route('user-management.users.index') }}" class=" hover:text-indigo-600">{{ __('Users') }}</a> / {{ __('Edit') }} / <span class="text-gray-300">{{ $item->name }}</span>
        </x-slot>
    </x-header>
    <x-form>
        @include('user-management.users.form')
    </x-form>
    
</x-app-layout>
