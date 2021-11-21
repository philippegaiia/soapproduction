@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 transition duration-150 ease-in-out']) !!}>
