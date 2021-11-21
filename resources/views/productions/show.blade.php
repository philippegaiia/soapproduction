<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="flex items-center font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Informations Production ') }}
            </h2>
            {{-- <div class="flex items-center px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-lg font-semibold leading-4 bg-{{ $order->active_color }}-100 text-{{ $order->active_color }}-800 capitalize">
                        {{ $order->active_name }}
                    </span>
            </div> --}}
        </div>
    </x-slot>
    <div>
        <livewire:productions.show :production="$production" :productionId="$production->id" />
    </div>
</x-app-layout>


