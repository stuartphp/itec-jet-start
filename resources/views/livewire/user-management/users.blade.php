<div>
    <x-header>
        <x-slot name="title">
            <span class="text-gray-600">{{ __('User Management') }}</span> / <a href="{{ route('user-management.users.index') }}" class=" hover:text-indigo-600">{{ __('Users') }}</a>
        </x-slot>
        <x-slot name="add">
            <div class="pt-4">
                @if(count(array_intersect(session()->get('grant'), ['su','medicines_access']))==1)
                    <a href="#" class="hover:text-indigo-500" title="{{ __('global.create') }}" wire:click='showCreateForm'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </a>
                @endif
            </div>
        </x-slot>
        <x-pagesize/>
        <x-search-term/>
    </x-header>
<div class="px-4">
    <table class="w-full bg-white mt-2 shadow overflow-hidden sm:rounded-lg">
        <thead>
            <tr class="border border-gray-200 bg-gray-50 ">
            <x-table.th>
                <a href="#" wire:click="sortBy('name')">
                    <div class="flex items-center text-indigo-400">
                        {{ __('users.name') }}
                        <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </a>
            </x-table.th>
            <x-table.th>
                <a href="#" wire:click="sortBy('email')">
                    <div class="flex items-center text-indigo-400">
                        {{ __('users.email') }}
                        <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                    </div>
                </a>
            </x-table.th>
            <x-table.th>{{ __('Roles') }}</x-table.th>
            <x-table.th class="text-right">{{ __('Actions') }}</x-table.th>
            </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr class=" border-b-2 border-gray-100 hover:bg-gray-100">
                <x-table.td>{{ $item->name }}</x-table.td>
                <x-table.td>{{ $item->email }}</x-table.td>
                <x-table.td>
                    @foreach ($item->roles as $role )
                        <span class="px-3 py-1 text-xs text-purple-600 bg-purple-200 rounded-full">{{ $role->name }}</span>
                    @endforeach
                </x-table.td>
                <x-table.td>
                    <div class="flex justify-end">
                        @if (count(array_intersect(session()->get('grant'), ['su']))==1)
                            <x-btn-edit href="{{ route('user-management.users.edit', [$item->id]) }}"/>
                            <x-btn-delete id="{{ $item->id }}"/>
                        @endif
                            <x-btn-show id="{{ $item->id }}"/>
                    </div>
                </x-table.td>
            </tr>
        @empty
            <tr><td colspan="5" class="py-2 px-4">{{ __('No Records Found') }}</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $items->links() }}
</div>

</div>
