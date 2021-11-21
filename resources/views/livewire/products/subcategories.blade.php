<div class="py-4 space-y-4 ">
    <div class="flex justify-between">
        <div>
            <x-buttons.primary wire:click="create" ><x-icons.plus />Nouvelle sous-catégorie</x-buttons.primary>
        </div>
    </div>
        {{-- subcategories table --}}
    <div class="flex-col space-y-4">

        <x-tables.table>

            <x-slot name="head">
                <x-tables.heading class="text-left" >ID</x-tables.heading>
                <x-tables.heading class="text-left" >Code</x-tables.heading>
                <x-tables.heading class="text-left" >Name</x-tables.heading>
                <x-tables.heading class="text-left" >Catégorie</x-tables.heading>
                <x-tables.heading class="text-left" >Statut</x-tables.heading>
                <x-tables.heading/>
            </x-slot>

            <x-slot name="body">

                @forelse ($categories as $category)

                <x-tables.row wire:loading.class.delay="opacity-50">

                    <x-tables.cell>{{$category->id}}</x-tables.cell>

                    <x-tables.cell>{{$category->code}}</x-tables.cell>

                    <x-tables.cell>{{$category->name}}</x-tables.cell>

                    <x-tables.cell>{{$category->productCategory->name}}</x-tables.cell>

                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $category->active_color }}-100 text-{{ $category->active_color }}-800 capitalize">
                            {{$category->active ? 'Active' : 'Inactive'}}
                        </span>
                    </x-tables.cell>

                     <x-tables.cell>

                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $category->id }})"></x-buttons.edit-button-modal-sm>

                        {{-- <x-buttons.show-button-sm href="{{ route('categorys.show', ['category' => $category]) }}" class="ml-2"></x-buttons.show-button-sm> --}}

                    </x-tables.cell>
                </x-tables.row>
                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucune sous-catégorie produit trouvée</span>
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
                    <!-- main category select -->
                    <x-input.group for="product_category_id" label="Statut" :error="$errors->first('category.product_category_id')">
                        <x-input.select wire:model="category.product_category_id" id="product_category_id" name="category.product_category_id">
                            @foreach ($mainCategories as $mainCategory)
                                <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- sub- category code -->
                    <x-input.group for="code" label="Code" :error="$errors->first('category.code')">
                        <x-input.text wire:model="category.code" id="code" />
                    </x-input.group>

                    <!-- sub-category name -->
                    <x-input.group for="name" label="Nom catégorie" :error="$errors->first('category.name')">
                        <x-input.text wire:model="category.name" id="name" />
                    </x-input.group>

                     <!-- CUsqtom tariff code HS -->
                    <x-input.group for="hs_code" label="Code douanier HS" :error="$errors->first('category.hs_code')">
                        <x-input.text wire:model="category.hs_code" id="hs_code" />
                    </x-input.group>

                    <!-- category ref -->
                    <x-input.group for="active" label="Catégorie active" :error="$errors->first('category.active')">
                        <x-input.checkbox wire:model="category.active" id="active" />
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



