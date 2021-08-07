<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-label for="name" value="{{ __('users.name') }}" />
        <x-input id="name" type="text" class="mt-1 block w-full" name="name" value="{{ isset($item->name) ? $item->name : '' }}" />
        <x-input-error for="name" class="mt-2" />
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-label for="email" value="{{ __('users.email') }}" />
        <x-input id="email" type="email" class="mt-1 block w-full" name="state.email" />
        <x-input-error for="email" class="mt-2" />
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <x-label for="schedule" value="{{ __('medicines.schedule') }}" />
        <x-input id="schedule" type="text" class="mt-1 block w-full" name="state.schedule" />
        <x-input-error for="schedule" class="mt-2" />
    </div>
</div>

