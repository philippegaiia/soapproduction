@props([
    'placeholder' => null,
    'trailingAddOn' => null,
])

<div class="flex">
  <select {{ $attributes->merge(['class' => 'block w-full py-2 pl-3 pr-10 text-base leading-6 rounded-md shadow-sm border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 sm:text-sm sm:leading-5' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
    @if ($placeholder)
        <option disabled value="">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
  </select>

  @if ($trailingAddOn)
    {{ $trailingAddOn }}
  @endif
</div>
