<div>
   {{-- <div class=" mx-auto px-6 py-3 bg-white border-b border-gray-200"> --}}
        <div class="flex items-center py-3 text-right sm:justify-center md:justify-between ">
            <div class="w-3/12 ml-1 mr-2">
                <input wire:model.debounce.400ms="search" type="text" class="appearance-none block w-full text-sm font-medium bg-white text-gray-700 border border-blue-300 rounded py-2 px-4 leading-tight focus:outline-none focus:border-blue-200  focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" placeholder="Rechercher un ingrédient...">
            </div>
            <div class="w-3/12 relative mx-2">
                <select wire:model="searchCategory" class="block appearance-none w-full text-sm font-medium bg-white border border-blue-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none  focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="w-2/12 relative mx-2">
                <select wire:model="sortField" class="block appearance-none w-full text-sm font-medium bg-white border border-blue-300  py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                    <option value="name">Désignation</option>
                    <option value="inci">inci</option>
                    <option value="ingredient_category_id">Categorie</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="w-2/12 relative mx-2">
                <select wire:model="sortAsc" class="block appearance-none w-full text-sm font-medium bg-white border border-blue-300  text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none   focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                    <option value="1">Ascending</option>
                    <option value="0">Descending</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="w-1/12 relative mx-2">
                <select wire:model="perPage" class="block appearance-none w-full text-sm font-medium bg-white border border-blue-300  text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none  focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                 <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="w-2/12 relative mx-2">
                <x-buttons.add-button href="{{ route('ingredients.create') }}" class=" bg-white border   ">
                    {{ __('Nouvel ingrédient') }}
                </x-buttons.add-button>
            </div>
        </div>
        <div class="">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="mb-4 shadow overflow-hidden border-b border-gray-300 sm:rounded-lg">
                        @if ($ingredients->isNotEmpty())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="table-head">
                                        Id
                                    </th>
                                    <th scope="col" class="table-head">
                                        Code
                                    </th>
                                    <th scope="col" class="table-head">
                                        Ingredient
                                    </th>
                                    <th scope="col" class="table-head">
                                        Code Inci
                                    </th>
                                    <th scope="col" class="table-head">
                                        Statut
                                    </th>
                                    <th scope="col" class="table-head">
                                        Categorie
                                    </th>
                                    <th scope="col" class="table-head">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($ingredients as $ingredient)
                                    <tr>
                                        <x-tables.table-detail>
                                            {{ $ingredient->id }}
                                        </x-tables.table-detail>

                                        <x-tables.table-detail>
                                            {{ $ingredient->code }}
                                        </x-tables.table-detail>

                                        <x-tables.table-detail>
                                            {{ $ingredient->name }}
                                        </x-tables.table-detail>

                                        <x-tables.table-detail>
                                            {{ $ingredient->inci }}
                                        </x-tables.table-detail>

                                        <x-tables.table-active class="{{ $ingredient->active == 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $ingredient->active }}
                                        </x-tables.table-active>

                                        <x-tables.table-detail>
                                                @if (isset($ingredient->ingredientCategory->name ))
                                            {{ $ingredient->ingredientCategory->name }}
                                            @endif
                                        </x-tables.table-detail>

                                        <td class=" whitespace-nowrap py-2 flex">

                                            <x-buttons.show-button-sm href="{{ route('ingredients.show', ['ingredient' => $ingredient]) }}" class="ml-4">
                                            </x-buttons.show-button-sm>

                                            <x-buttons.edit-button-sm href="{{ route('ingredients.edit', ['ingredient' => $ingredient] )}}" class="ml-4">
                                            </x-buttons.edit-button-sm>

                                            {{-- <form action="{{ route('ingredients.destroy', ['ingredient' => $ingredient] )}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <x-buttons.delete-button-sm class="ml-4" onclick="return confirm('Etes-vous certain de supprimer {{ $ingredient->name }}?')">
                                                </x-buttons.delete-button-sm>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @empty
                                    <h3>Il n'y a pas d'ingrédients enregistrés</h3>
                                @endforelse
                                <!-- More rows... -->
                            </tbody>
                        </table>
                         @else
                         <p>No ingredients found!!</p>
                        @endif
                    </div>
                    {!! $ingredients->links() !!}
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
