{{-- <a {{ $attributes->merge(['
    href' => '',
    'class' => 'inline-flex items-center justify-center px-2 py-2 bg-indigo-400  rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500  transition ease-in-out duration-300']) }}>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
{{ $slot }}
</a> --}}

<span class="inline-flex rounded-md shadow-sm">
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'inline-flex items-center justify-center px-2 py-2 bg-indigo-600  rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none transition ease-in-out duration-300' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
        ]) }}>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>

        {{ $slot }}
    </button>
</span>
