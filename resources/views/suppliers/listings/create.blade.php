<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Listing pour') }} {{ $supplier->name }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-3xl mx-auto p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('suppliers.listings.store', ['supplier' => $supplier ]) }}">
                    @csrf

                    @include('suppliers.listings.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
