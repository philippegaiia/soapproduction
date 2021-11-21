<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une formule') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-2xl mx-auto p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('formulas.store')}}">
                    @csrf

                    @include('formulas.form')

                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.secondary-button href="{{ url()->previous() }}">
                            {{ __('Annuler') }}
                        </x-buttons.secondary-button>
                        <x-button class="ml-4">
                            {{ __('Enregister') }}
                        </x-button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
