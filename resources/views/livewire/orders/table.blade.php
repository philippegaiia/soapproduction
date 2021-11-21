<div class="py-4 space-y-4 ">
    <div class="flex justify-between">

            <div class="w-2/4 flex space-x-4">
                <x-input class=" focus:m-5" type="text" wire:model.debounce.400ms="search" placeholder="Rechercher..." />
                <x-buttons.link wire:click="$toggle('showFilters')">@if ($showFilters) Masquer les @endIf Filtres...</x-buttons.link>
            </div>
            <div>
                <x-buttons.primary wire:click="create" ><x-icons.plus />Nouvelle commande</x-buttons.primary>
            </div>
        </div>

    <!-- Advanced Search -->
        <div>
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

                <div class="relative w-1/2 pl-2 space-y-4">
                    <x-input.group inline for="filter-date-min" label="Minimum Date">
                        <x-input.date wire:model="filters.date-min" id="filter-date-min" placeholder="MM/DD/YYYY" />
                    </x-input.group>

                    <x-input.group inline for="filter-date-max" label="Maximum Date">
                        <x-input.date wire:model="filters.date-max" id="filter-date-max" placeholder="MM/DD/YYYY" />
                    </x-input.group>
                    <div class="absolute right-0 bottom-0 p-2">
                        <x-buttons.link wire:click="resetFilters" >Reset...</x-buttons.link>
                    </div>
                </div>
            </div>
            @endif
        </div>


        {{-- Orders table --}}
    <div class="flex-col space-y-4">
        <x-tables.table>
            <x-slot name="head">
                <x-tables.heading sortable wire:click="sortBy('order_ref')" :direction="$sortField === 'order_ref' ? $sortDirection : null">No Appro</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('supplier_id')" :direction="$sortField === 'supplier_id' ? $sortDirection : null">Fournisseur</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('order_date')" :direction="$sortField === 'order_date' ? $sortDirection : null">Date Commande</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('delivery_date')" :direction="$sortField === 'delivery_date' ? $sortDirection : null">Date Livraison</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('bl_no')" :direction="$sortField === 'bl_no' ? $sortDirection : null">No BL</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('invoice_no')" :direction="$sortField === 'invoice_no' ? $sortDirection : null">No Facture</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('active')" :direction="$sortField === 'active' ? $sortDirection : null">Statut</x-tables.heading>
                <x-tables.heading/>
            </x-slot>
            <x-slot name="body">
                @forelse ($orders as $order)
                <x-tables.row wire:loading.class.delay="opacity-50">
                    <x-tables.cell>{{$order->order_ref}}</x-tables.cell>
                    <x-tables.cell>{{$order->supplier->name}}</x-tables.cell>
                    <x-tables.cell>{{$order->order_date_for_humans}}</x-tables.cell>
                    <x-tables.cell>{{$order->delivery_date_for_humans}}</x-tables.cell>
                    <x-tables.cell>{{$order->bl_no}}</x-tables.cell>
                    <x-tables.cell>{{$order->invoice_no}}</x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $order->active_color }}-100 text-{{ $order->active_color }}-800 capitalize">
                            {{ $order->active_name }}
                        </span>
                    </x-tables.cell>
                     <x-tables.cell>
                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $order->id }})"></x-buttons.edit-button-modal-sm>
                        <x-buttons.show-button-sm href="{{ route('orders.show', ['order' => $order]) }}" class="ml-2"></x-buttons.show-button-sm>
                    </x-tables.cell>
                </x-tables.row>
                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucune commande trouvée</span>
                            </div>
                        </x-tables.cell>
                    </x-tables.row>
                @endforelse
            </x-slot>
        </x-tables.table>
        <div class="">
            {{ $orders->links() }}
        </div>
    </div>

{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >

                <x-slot name="title">Mettre à Jour l'approvisionnement</x-slot>

                <x-slot name="content">
                    <!-- Supplier -->
                    <x-input.group for="supplier" label="Statut" :error="$errors->first('editing.supplier_id')">
                        <x-input.select wire:model="editing.supplier_id" id="supplier">
                            <option value="">-- choisir un fournisseur --</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- Order ref -->
                    <x-input.group for="order_ref" label="Référence Commande" :error="$errors->first('editing.order_ref')">
                        <x-input.text wire:model="editing.order_ref" id="order_ref" />
                    </x-input.group>

                    <!-- Order date -->
                    <x-input.group for="order_date_for_editing" label="Date commande" :error="$errors->first('editing.order_date_for_editing')">
                        <x-input.date wire:model="editing.order_date_for_editing" id="order_date_for_editing" />
                    </x-input.group>

                    <!-- delivery date -->
                    <x-input.group for="delivery_date_for_editing" label="Date de livraison" :error="$errors->first('editing.delivery_date_for_editing')">
                        <x-input.date wire:model="editing.delivery_date_for_editing" id="delivery_date_for_editing" />
                    </x-input.group>

                    <!-- Order confirmation number -->
                    <x-input.group for="confirmation_no" label="No Confirmation" :error="$errors->first('editing.confirmation_no')">
                        <x-input.text wire:model="editing.confirmation_no" id="confirmation_no" />
                    </x-input.group>

                    <!-- BL  number -->
                    <x-input.group for="bl_no" label="No Bon de Livraison" :error="$errors->first('editing.bl_no')">
                        <x-input.text wire:model="editing.bl_no" id="bl_no" />
                    </x-input.group>

                    <!-- Invoice number-->
                    <x-input.group for="invoice_no" label="No Facture" :error="$errors->first('editing.invoice_no')">
                        <x-input.text wire:model="editing.invoice_no" id="invoice_no" />
                    </x-input.group>

                    <!-- Statut -->
                    <x-input.group for="active" label="Statut" :error="$errors->first('editing.active')">
                        <x-input.select wire:model="editing.active" id="active">
                            @foreach (App\Models\Order::STATUSES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group  for="amount" label="Montant HT" :error="$errors->first('editing.amount')">
                        <x-input.money wire:model.lazy="editing.amount" id="amount" />
                    </x-input.group>

                    <x-input.group  for="freight" label="Freight" :error="$errors->first('editing.freight')">
                        <x-input.money wire:model.lazy="editing.freight" id="freight" />
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
                        <x-buttons.primary type="submit">{{ __('Enregistrer') }}</x-buttons.primary>
{{--
                        <x-button class="ml-2" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button> --}}
                    </x-slot>
            </x-dialog-modal>
        </form>
    </div>
</div>
