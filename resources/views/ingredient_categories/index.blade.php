<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Catégories Ingrédients') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class=" mx-auto px-6 py-3 bg-white border-b border-gray-200"> --}}
                <div class="flex items-center  pb-3 text-right  sm:justify-center md:justify-end ">
                        <x-buttons.secondary-button href="{{ route('ingredient_categories.create') }}" class="block capitalize">
                            {{ __('Créer une nouvelle catégorie Ingrédient') }}
                        </x-buttons.secondary-button>
                </div>
                <div class="">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="table-head">
                                                Code
                                            </th>
                                            <th scope="col" class="table-head">
                                                Nom
                                            </th>
                                            <th scope="col" class="table-head">
                                                Nom anglais
                                            </th>

                                            <th scope="col" class="table-head">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($ingredientCategories as $ingredientCategory)
                                            <tr>
                                                <x-tables.table-detail>
                                                    {{ $ingredientCategory->code }}
                                                </x-tables.table-detail>

                                                <x-tables.table-detail>
                                                    {{ $ingredientCategory->name }}
                                                </x-tables.table-detail>

                                                <x-tables.table-detail>
                                                    {{ $ingredientCategory->name_en }}
                                                </x-tables.table-detail>

                                                <td class=" whitespace-nowrap py-2 flex">

                                                    <x-buttons.edit-button-sm href="{{ route('ingredient_categories.edit', ['ingredient_category' => $ingredientCategory] )}}" class="ml-4">
                                                    </x-buttons.edit-button-sm>

                                                    <form action="{{ route('ingredient_categories.destroy', ['ingredient_category' => $ingredientCategory] )}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <x-buttons.delete-button-sm class="ml-4" onclick="return confirm('Etes-vous certain d effacer la ctégorie {{ $ingredientCategory->name }}?')">
                                                        </x-buttons.delete-button-sm>
                                                    </form>

                                                </td>
                                            </tr>
                                            @empty
                                            <p class="font-semibold text-md text-gray-800 leading-tight">Il n'y a pas de Catégories enregistrées</h3>
                                        @endforelse
                                        <!-- More rows... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div>
        </div> --}}
    </div>
</x-app-layout>
