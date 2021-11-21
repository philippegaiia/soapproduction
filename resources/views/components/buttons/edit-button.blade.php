
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-red active:bg-bue-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


