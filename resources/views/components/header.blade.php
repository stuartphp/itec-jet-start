<header class="bg-white shadow">
    <div class="flex flex-col justify-between px-4 sm:flex-row">
        <h2 class="text-xl font-semibold leading-tight text-gray-500 px-4 py-4 ">
            {{ $title }}
        </h2>
        {{ $add ?? '' }}
        <div class="flex pt-2 pb-2">
            {{ $slot ?? '' }}
        </div>
    </div>
</header>
