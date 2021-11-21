
<div class="py-4 space-y-4 ">
    <div class="flex justify-between">

        <div class="w-2/4 flex space-x-4">
            <x-input class=" focus:m-5" type="text" wire:model.debounce.400ms="search" placeholder="Rechercher..." />
        </div>
        <div>
            <x-buttons.add-button href="{{ route('formulas.create') }}" ><x-icons.plus />Nouvelle formule</x-buttons.primary>
        </div>
    </div>



        {{-- Formuylas table --}}
    <div class="flex-col space-y-4">

        <x-tables.table>

            <x-slot name="head">

                <x-tables.heading sortable wire:click="sortBy('code')" :direction="$sortField === 'code' ? $sortDirection : null">Code</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('ref_dip')" :direction="$sortField === 'ref_dip' ? $sortDirection : null">Ref. DIP</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">Name</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('start_date')" :direction="$sortField === 'start_date' ? $sortDirection : null">Date effet</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('active')" :direction="$sortField === 'active' ? $sortDirection : null">Statut</x-tables.heading>

                <x-tables.heading/>

            </x-slot>

            <x-slot name="body">

                @forelse ($formulas as $formula)

                <x-tables.row wire:loading.class.delay="opacity-50">

                    <x-tables.cell>{{$formula->code}}</x-tables.cell>
                    <x-tables.cell>{{$formula->ref_dip}}</x-tables.cell>
                    <x-tables.cell>{{$formula->name}}</x-tables.cell>
                    <x-tables.cell>{{$formula->start_date_for_humans}}</x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $formula->active_color }}-100 text-{{ $formula->active_color }}-800 capitalize">
                            {{$formula->active}}
                        </span>
                    </x-tables.cell>
                     <x-tables.cell>
                        <x-buttons.edit-button-sm href="{{ route('formulas.edit', ['formula' => $formula]) }}"></x-buttons.edit-button-sm>
                        <x-buttons.show-button-sm href="{{ route('formulas.show', ['formula' => $formula]) }}" class="ml-2"></x-buttons.show-button-sm>
                    </x-tables.cell>

                </x-tables.row>

                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucune formule trouvée</span>
                            </div>
                        </x-tables.cell>
                    </x-tables.row>
                @endforelse

            </x-slot>

        </x-tables.table>

        <div class="">
            {{ $formulas->links() }}
        </div>

    </div>

{{-- Modal for edit --}}
    {{-- <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >

                <x-slot name="title">Mettre à Jour l'approvisionnement</x-slot>

                <x-slot name="content"> --}}
                     <!-- livewire component to select product_subcategory  from product_category -->
                    {{-- <div>
                        <livewire:products.add-category
                        :selectedSubcategory="$product->product_subcategory_id"
                        />
                    </div> --}}
                    <!-- Collection -->
                    {{-- <x-input.group for="product_subcategory_id" label="Catégorie" :error="$errors->first('editing.product_subcategory_id')">
                        <x-input.select wire:model="editing.product_subcategory_id" id="product_subcategory_id">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <!-- Collection -->
                    <x-input.group for="product_collection_id" label="Collection" :error="$errors->first('editing.product_collection_id')">
                        <x-input.select wire:model="editing.product_collection_id" id="product_collection_id">
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- Product code -->
                    <x-input.group for="code" label="Code Produit" :error="$errors->first('editing.code')">
                        <x-input.text wire:model="editing.code" id="code" />
                    </x-input.group>

                    <!-- Product Name -->
                    <x-input.group for="name" label="Désignation" :error="$errors->first('editing.name')">
                        <x-input.text wire:model="editing.name" id="name" />
                    </x-input.group>

                    <!-- Launched date -->
                    <x-input.group for="launch_date_for_editing" label="Date de lancement" :error="$errors->first('editing.launch_date_for_editing')">
                        <x-input.date wire:model="editing.launch_date_for_editing" id="launch_date_for_editing" />
                    </x-input.group>

                    <!-- contains essential oils -->
                    <x-input.group for="essential_oils" label="Contient huiles essentielles" :error="$errors->first('editing.essential_oils')">
                        <x-input.checkbox wire:model="editing.essential_oils" id="essential_oils" />
                    </x-input.group>

                    <!-- contains vegetable extract -->
                    <x-input.group for="extracts" label="Contient extraits végétaux" :error="$errors->first('editing.extracts')">
                        <x-input.checkbox wire:model="editing.extracts" id="extracts" />
                    </x-input.group>

                     <!-- net weight-->
                    <x-input.group for="net_weight" label="Poids net" :error="$errors->first('net_weight')">
                        <x-input.text type="text" wire:model="editing.net_weight" id="net_weight" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
                    </x-input.group>

                     <!-- raw weight-->
                    <x-input.group for="gross_weight" label="Poids brut" :error="$errors->first('gross_weight')">
                        <x-input.text type="text" wire:model="editing.gross_weight" id="gross_weight" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
                    </x-input.group>

                    <!--  ean13 code -->
                    <x-input.group for="ean_code" label="Code EAN13" :error="$errors->first('editing.ean_code')">
                        <x-input.text wire:model="editing.ean_code" id="ean_code" />
                    </x-input.group>

                    <!-- internal woocommerce code-->
                    <x-input.group for="wp_code" label="Code woocommerce" :error="$errors->first('editing.wp_code')">
                        <x-input.text wire:model="editing.wp_code" id="wp_code" />
                    </x-input.group>


                    <!-- Statut -->
                    <x-input.group for="active" label="Statut" :error="$errors->first('editing.active')">
                        <x-input.select wire:model="editing.active" id="active">
                            @foreach (App\Models\Product::STATUSES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="infos" label="Infos" :error="$errors->first('editing.infos')">
                        <x-input.textarea wire:model="editing.infos" id="infos" />
                    </x-input.group>

                </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button
                        wire:click="$toggle('showEditModal')"
                        wire:loading.attr="disabled" >
                            {{ __('Annuler') }}
                        </x-secondary-button>

                        <x-button class="ml-2" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
            </x-dialog-modal>
        </form>
    </div> --}}
</div>





