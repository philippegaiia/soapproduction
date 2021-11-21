<div class="space-y-2 py-4 ">
    <div class="flex items-center  pb-3 text-right  sm:justify-center md:justify-end ">
        <div class="w-2/6 ml-1 mr-2">
            <input wire:model.debounce.600ms="search" type="text" class="block w-full bg-white text-gray-700 border border-gray-200 rounded py-2 pr-2 leading-tight focus:ml-3 focus:outline-none focus:border-blue-200 focus:bg-white focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" placeholder="Rechercher un listing...">
        </div>
        <div class="w-1/6 relative mx-2">
            <select wire:model="sortField" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                <option value="name">Désignation</option>
                <option value="name">Ingrédient</option>
                <option value="supplier_ref">Ref Fournisseur</option>
                <option value="code">Code</option>
                <option value="supplier_id">Fournisseur</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-2">
            <select wire:model="sortAsc" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white  focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0  items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-2">
            <select wire:model="perPage" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-200 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-300" id="grid-state">
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
        <div class="w-1/6 ml-2">
            <x-buttons.add-button href="{{ route('listings.create') }}" class="bg-white">
                {{ __('Nouveau listing') }}
            </x-buttons.add-button>
        </div>
    </div>
    <div class="">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="mb-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th scope="col" class="table-head">
                                    Ref. Fournisseur
                                </th>
                                <th scope="col" class="table-head">
                                    Ingrédient
                                </th>
                                <th scope="col" class="table-head">
                                    Désignation
                                </th>
                                {{-- <th scope="col" class="table-head">
                                    PCB
                                </th> --}}
                                <th scope="col" class="table-head">
                                    Bio
                                </th>
                                <th scope="col" class="table-head">
                                    Fournisseur
                                </th>
                                <th scope="col" class="table-head">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($listings as $listing)
                                <tr class="hover:bg-gray-50">

                                    <x-tables.table-detail>
                                        {{ $listing->supplier_ref }}
                                    </x-tables.table-detail>

                                    <x-tables.table-detail>
                                        {{ \Illuminate\Support\Str::limit($listing->ingredient->name, 30,'...') }}
                                    </x-tables.table-detail>

                                    <x-tables.table-detail>
                                        {{ \Illuminate\Support\Str::limit($listing->name, 30,'...') }} {{ $listing->unit_weight }} @if ($listing->pkg != 'Unitaire') kg @endif
                                    </x-tables.table-detail>

                                    {{-- <x-tables.table-detail>

                                    </x-tables.table-detail> --}}

                                    <x-tables.table-detail >
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $listing->organic_color }}-100 text-{{ $listing->organic_color }}-800 capitalize">
                                            {{ $listing->organic ? 'Bio' : 'Conv' }}
                                        </span>
                                    </x-tables.table-detail>

                                    <x-tables.table-detail>
                                        {{ $listing->supplier->name }}
                                    </x-tables.table-detail>

                                    <td class=" whitespace-nowrap py-2 flex">

                                        <x-buttons.show-button-sm href="{{ route('listings.show', ['listing' => $listing]) }}" class="ml-4">
                                        </x-buttons.show-button-sm>

                                        <x-buttons.edit-button-sm href="{{ route('listings.edit', ['listing' => $listing] )}}" class="ml-4">
                                        </x-buttons.edit-button-sm>

                                        {{-- <form action="{{ route('listings.destroy', ['listings' => $listings] )}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <x-buttons.delete-button-sm class="ml-4" onclick="return confirm('Etes-vous certain d effacer le fournisseur {{ $listings->name }}?')">
                                            </x-buttons.delete-button-sm>
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                <h3>Il n'y a pas de Fournisseurs enregistrés</h3>
                                 @endforelse
                        </tbody>
                    </table>
                </div>
                {!! $listings->links() !!}
            </div>
        </div>
    </div>
</div>

