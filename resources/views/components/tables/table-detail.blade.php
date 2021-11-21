{{-- <td class="px-6 py-2 whitespace-nowrap">
    <div class="flex items-center text-sm font-semibold text-gray-700">

            {{ $slot }}

    </div>
</td> --}}

<td class="px-6 py-2 whitespace-nowrap">
    <div {!! $attributes->merge(['class' => 'flex items-center text-sm font-semibold text-gray-700']) !!}>


            {{ $slot }}

    </div>
</td>
