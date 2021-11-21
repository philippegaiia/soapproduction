<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500  hover:ring-2 hover:shadow-1 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
