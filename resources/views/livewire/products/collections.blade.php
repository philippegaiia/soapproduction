<div class="py-4 space-y-4 ">
    <div class="flex justify-between">
        <div>
            <x-buttons.primary wire:click="create" ><x-icons.plus />Nouvelle collection</x-buttons.primary>
        </div>
    </div>
        {{-- subcategories table --}}
    <div class="flex-col space-y-4">

        <x-tables.table>

            <x-slot name="head">
                <x-tables.heading class="text-left" >ID</x-tables.heading>
                <x-tables.heading class="text-left" >Code</x-tables.heading>
                <x-tables.heading class="text-left" >Name</x-tables.heading>
                <x-tables.heading class="text-left" >Statut</x-tables.heading>
                <x-tables.heading/>
            </x-slot>

            <x-slot name="body">

                @forelse ($collections as $collection)

                <x-tables.row wire:loading.class.delay="opacity-50">

                    <x-tables.cell>{{$collection->id}}</x-tables.cell>

                    <x-tables.cell>{{$collection->code}}</x-tables.cell>

                    <x-tables.cell>{{$collection->name}}</x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $collection->active_color }}-100 text-{{ $collection->active_color }}-800 capitalize">
                            {{$collection->active ? 'Active' : 'Inactive'}}
                        </span>
                    </x-tables.cell>

                     <x-tables.cell>

                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $collection->id }})"></x-buttons.edit-button-modal-sm>

                        {{-- <x-buttons.show-button-sm href="{{ route('collections.show', ['collection' => $collection]) }}" class="ml-2"></x-buttons.show-button-sm> --}}

                    </x-tables.cell>

                </x-tables.row>

                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucune collection produit trouvée</span>
                            </div>
                        </x-tables.cell>
                    </x-tables.row>
                @endforelse

            </x-slot>

        </x-tables.table>

    </div>

{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showModal" >

                <x-slot name="title">Categorie Produit</x-slot>

                <x-slot name="content">

                    <!-- collection ref -->
                    <x-input.group for="code" label="Code" :error="$errors->first('collection.code')">
                        <x-input.text wire:model="collection.code" id="code" />
                    </x-input.group>

                    <!-- collection ref -->
                    <x-input.group for="name" label="Nom catégorie" :error="$errors->first('collection.name')">
                        <x-input.text wire:model="collection.name" id="name" />
                    </x-input.group>

                    <!-- collection ref -->
                    <x-input.group for="active" label="Catégorie active" :error="$errors->first('collection.active')">
                        <x-input.checkbox wire:model="collection.active" id="active" />
                    </x-input.group>



                </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button
                        wire:click="close"
                        wire:loading.attr="disabled" >
                            {{ __('Annuler') }}
                        </x-secondary-button>

                        <x-button class="ml-2" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
            </x-dialog-modal>
        </form>
    </div>
</div>


