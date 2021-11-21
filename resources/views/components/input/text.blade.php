@props([
    'leadingAddOn' => false,
])

<div class="flex rounded-md shadow-sm">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input {{ $attributes->merge(['class' => 'flex-1 py-2 pl-2 rounded-md block w-full border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-inset focus:ring-indigo-300 focus:ring-opacity-50 transition duration-150 ease-in-out sm:text-sm sm:leading-5' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) }}/>
</div>
