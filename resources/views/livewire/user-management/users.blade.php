<div>
    <x-slot name="header">
        <div class="flex flex-col justify-between px-4 sm:flex-row pt-3 pb-4">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                <span class="text-gray-600">{{ __('User Management') }}</span> / <a href="{{ route('user-management.users.index') }}" class=" hover:text-indigo-600">{{ __('Users') }}</a>
            </h2>
            <div>
                <a href="{{ route('user-management.users.create') }}" class="hover:text-indigo-500" title="{{ __('Create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a></div>
            <div class="flex">
                <div class="relative">
                    <select
                        class="block h-full px-4 pr-8 py-1 leading-tight text-gray-700 bg-white border border-gray-200 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model="pageSize"
                        >
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                {{-- <div class="relative">
                    <select
                        class="block h-full px-4 py-1 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-200 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div> --}}
                <div class="relative block sm:mt-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="{{ __('global.search') }}"
                        wire:model.debounce.300ms="searchTerm"
                        class="block w-full py-1 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-200 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                </div>
            </div>
        </div>
    </x-slot>

    <x-table.table :headers="$headers">
        @forelse ($items as $item)
            <tr class=" border-b-2 border-gray-100 hover:bg-gray-100">
                <x-table.td>{{ $item->name }}</x-table.td>
                <x-table.td>{{ $item->email }}</x-table.td>
                <x-table.td>
                    @foreach ($item->roles as $role )
                        <span class="px-3 py-1 text-xs text-purple-600 bg-purple-200 rounded-full">{{ $role->name }}</span>
                    @endforeach
                </x-table.td>
                <x-table.td align="right">
                    <div class="flex justify-end">
                        @if (count(array_intersect(session()->get('grant'), ['su']))==1)
                            <x-btn-edit id="{{ $item->id }}"/>
                            <x-btn-delete id="{{ $item->id }}"/>
                        @endif
                        <x-btn-show id="{{ $item->id }}"/>
                    </div>
                </x-table.td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-2 px-4">{{ __('No Records Found') }}</td></tr>
        @endforelse
    </x-table.table>
    {{ $items->links() }}
</div>
