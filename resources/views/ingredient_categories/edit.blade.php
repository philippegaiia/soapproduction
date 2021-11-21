<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une Catégorie Ingrédients') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-3xl mx-auto p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('ingredient_categories.update', ['ingredient_category' => $ingredient_category]) }}">
                        @method('PATCH')
                        @csrf
                       <!-- Code -->
                        <div class="mt-4">
                            <x-label for="code" :value="__('Code Catégorie')" />
                            <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value=" old('code') ?? $ingredient_category->code" required autofocus />
                            <x-input-error for="code" class="mt-2" />
                        </div class="mt-4">

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Catégorie')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $ingredient_category->name" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <!-- Name english-->
                        <div class="mt-4">
                            <x-label for="name_en" :value="__('Catégorie Anglais')" />
                            <x-input id="name_en" class="block mt-1 w-full" type="text" name="name_en" :value="old('name_en') ?? $ingredient_category->name_en" required autofocus />
                            <x-input-error for="name_en" class="mt-2" />
                        </div>

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
