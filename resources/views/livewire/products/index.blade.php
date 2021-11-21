
<div class="py-4 space-y-4 ">
    <div class="flex justify-between">

        <div class="w-2/4 flex space-x-4">
            <x-input class=" focus:m-5" type="text" wire:model.debounce.400ms="search" placeholder="Rechercher..." />
        </div>
        <div>
            <x-buttons.primary wire:click="create" ><x-icons.plus />Nouveau produit</x-buttons.primary>
        </div>
    </div>

    <!-- Advanced Search -->
        {{-- <div>
            @if ($showFilters)
            <div class="bg-gray-200 p-4 rounded shadow-inner flex ">
                <div class="w-1/2 pr-2 space-y-4">
                    <x-input.group inline for="filter-status" label="Status">
                        <x-input.select wire:model="filters.status" id="filter-status">
                            <option value="" disabled>Sélectionner Position...</option>
                            @foreach (App\Models\Order::STATUSES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group inline for="filter-amount-min" label="Minimum Amount">
                        <x-input.money wire:model.lazy="filters.amount-min" id="filter-amount-min" />
                    </x-input.group>

                    <x-input.group inline for="filter-amount-max" label="Maximum Amount">
                        <x-input.money wire:model.lazy="filters.amount-max" id="filter-amount-max" />
                    </x-input.group>
                </div>

                <div class="w-1/2 pl-2 space-y-4">
                    <x-input.group inline for="filter-date-min" label="Minimum Date">
                        <x-input.date wire:model="filters.date-min" id="filter-date-min" placeholder="MM/DD/YYYY" />
                    </x-input.group>

                    <x-input.group inline for="filter-date-max" label="Maximum Date">
                        <x-input.date wire:model="filters.date-max" id="filter-date-max" placeholder="MM/DD/YYYY" />
                    </x-input.group>
                    <div class="absolute right-0 bottom-0 p-4">
                        <x-buttons.link wire:click="resetFilters" >Reset...</x-buttons.link>
                    </div>
                </div>
            </div>
            @endif
        </div> --}}


        {{-- Orders table --}}
    <div class="flex-col space-y-4">

        <x-tables.table>

            <x-slot name="head">

                <x-tables.heading sortable wire:click="sortBy('code')" :direction="$sortField === 'code' ? $sortDirection : null">Code</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">Name</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('net_weight')" :direction="$sortField === 'net_weight' ? $sortDirection : null">Poids</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('product_subcategory_id')" :direction="$sortField === 'product_subcategory_id' ? $sortDirection : null">Category</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('product_collection_id')" :direction="$sortField === 'product_collection_id' ? $sortDirection : null">Collection</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('launch_date')" :direction="$sortField === 'launch_date' ? $sortDirection : null">Date lancement</x-tables.heading>

                {{-- <x-tables.heading sortable wire:click="sortBy('brand')" :direction="$sortField === 'brand' ? $sortDirection : null">Marque</x-tables.heading> --}}

                <x-tables.heading sortable wire:click="sortBy('active')" :direction="$sortField === 'active' ? $sortDirection : null">Statut</x-tables.heading>

                <x-tables.heading class="text-left">DIP</x-tables.heading>
                <x-tables.heading/>

            </x-slot>

            <x-slot name="body">

                @forelse ($products as $product)

                <x-tables.row
                {{-- wire:loading.class.delay="opacity-50" --}}
                >

                    <x-tables.cell>{{$product->code}}</x-tables.cell>
                    <x-tables.cell>{{$product->name}} {{$product->net_weight}}G</x-tables.cell>
                    <x-tables.cell>{{$product->net_weight}}g</x-tables.cell>
                    <x-tables.cell>{{$product->productSubcategory->name}}</x-tables.cell>
                    <x-tables.cell>{{$product->productCollection->name}}</x-tables.cell>
                    <x-tables.cell>{{$product->launch_date_for_humans}}</x-tables.cell>
                    {{-- <x-tables.cell>{{$product->brand}}</x-tables.cell> --}}
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $product->active_color }}-100 text-{{ $product->active_color }}-800 capitalize">
                            {{$product->active_name}}
                        </span>
                    </x-tables.cell>
                    <x-tables.cell>
                        @foreach ($product->formulas as $formula)
                           {{ $formula->ref_dip }} {{ $formula->name }} <br>
                        @endforeach
                    </x-tables.cell>
                     <x-tables.cell>
                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $product->id }})"></x-buttons.edit-button-modal-sm>
                        {{-- <x-buttons.show-button-sm href="{{ route('products.show', ['product' => $product]) }}" class="ml-2"></x-buttons.show-button-sm> --}}
                    </x-tables.cell>

                </x-tables.row>

                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucun produit trouvé</span>
                            </div>
                        </x-tables.cell>
                    </x-tables.row>
                @endforelse

            </x-slot>

        </x-tables.table>

        <div class="">
            {{ $products->links() }}
        </div>

    </div>

{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >

                <x-slot name="title">Mettre à Jour le produit</x-slot>

                <x-slot name="content">
                     <!-- livewire component to select product_subcategory  from product_category -->
                    {{-- <div>
                        <livewire:products.add-category
                        :selectedSubcategory="$product->product_subcategory_id"
                        />
                    </div> --}}
                    <!-- Collection -->
                    <x-input.group for="product_subcategory_id" label="Catégorie" :error="$errors->first('editing.product_subcategory_id')">
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
                    <x-input.group for="brand" label="Marque" :error="$errors->first('editing.brand')">
                        <x-input.text wire:model="editing.brand" id="brand" />
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

                    <!-- internal woocommerce code-->
                    {{-- <x-input.group  for="amount" label="Montant HT" :error="$errors->first('editing.amount')">
                        <x-input.money wire:model.lazy="editing.amount" id="amount" />
                    </x-input.group> --}}

                    <!-- Statut -->
                    <x-input.group for="active" label="Statut" :error="$errors->first('editing.active')">
                        <x-input.select wire:model="editing.active" id="active">
                            @foreach (App\Models\Product::STATUSES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- attach formula -->
                    <x-input.group for="productFormulas" label="Formules" :error="$errors->first('productFormulas')">
                        <x-input.select multiple wire:model="productFormulas" id="productFormulas">
                            @foreach ($formulas as $formula)
                                <option value="{{ $formula->id }}">{{ $formula->name }} - {{ $formula->ref_dip }}</option>
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
    </div>
</div>




