<a {{ $attributes->merge(['href' => '', 'class' => 'inline-flex items-center px-2 py-2 border border-gray-200 rounded-md font-semibold text-xs text-gray-600 uppercase tracking-wide shadow-sm hover:text-gray-900 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150'])}}>
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clipRule="evenodd" /></svg>
    {{ $slot }}
</a>

