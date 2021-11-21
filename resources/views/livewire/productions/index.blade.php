<div class="py-4 space-y-4 " >
    <div class="flex justify-between">
        <div class="w-2/4 flex space-x-4">
            Current time: {{ now() }}
            <x-input class=" focus:m-5" type="text" wire:model.debounce.400ms="search" placeholder="Rechercher..." />
            <x-buttons.link wire:click="$toggle('showFilters')">@if ($showFilters) Masquer les @endIf Filtres...</x-buttons.link>
        </div>
        <div>
            <x-buttons.primary wire:click="create" ><x-icons.plus />Nouvelle production</x-buttons.primary>
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
                            @foreach (App\Models\Production::STATUSES as $value => $label)
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
                    <div class="absolute right-0 bottom-0 p-4">
                        <x-buttons.link wire:click="resetFilters" >Reset...</x-buttons.link>
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{-- productions table --}}
    <div class="flex-col space-y-4">
        <x-tables.table>
            <x-slot name="head">
                <x-tables.heading sortable wire:click="sortBy('code')" :direction="$sortField === 'code' ? $sortDirection : null">No Prod</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('formula_id')" :direction="$sortField === 'formula_id' ? $sortDirection : null">Formule</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('production_date')" :direction="$sortField === 'production_date' ? $sortDirection : null">Production</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('ready_date')" :direction="$sortField === 'ready_date' ? $sortDirection : null">Prêt le</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('masterbatch')" :direction="$sortField === 'masterbatch' ? $sortDirection : null">masterbatch</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('cosmecert')" :direction="$sortField === 'cosmecert' ? $sortDirection : null">Cosmecert</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Statut</x-tables.heading>
                <x-tables.heading/>
            </x-slot>
            <x-slot name="body">
                @forelse ($productions as $production)
                <x-tables.row wire:loading.class.delay="opacity-50">
                    <x-tables.cell>{{$production->code}}</x-tables.cell>
                    <x-tables.cell>{{$production->formula->ref_dip}} {{$production->formula->name}}</x-tables.cell>
                    <x-tables.cell>{{$production->production_date_for_humans}}</x-tables.cell>
                    <x-tables.cell>{{$production->ready_date_for_humans}}</x-tables.cell>
                    <x-tables.cell>{{$production->masterbatch}}</x-tables.cell>
                    <x-tables.cell>{{$production->ecocert}}</x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $production->status_color }}-100 text-{{ $production->status_color }}-800 capitalize">
                            {{ $production->status_name }}
                        </span>
                    </x-tables.cell>
                    <x-tables.cell>
                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $production->id }})"></x-buttons.edit-button-modal-sm>
                        <x-buttons.show-button-sm href="{{ route('productions.show', ['production' => $production]) }}" class="ml-2"></x-buttons.show-button-sm>
                    </x-tables.cell>
                </x-tables.row>
                @empty
                    <x-tables.row >
                        <x-tables.cell colspan="8">
                            <div class="flex justify-center items-center">
                                <span class="py-8 text-gray-400 font-medium text-xl">Aucune production trouvée</span>
                            </div>
                        </x-tables.cell>
                    </x-tables.row>
                @endforelse
            </x-slot>
        </x-tables.table>
        <div class="">
            {{ $productions->links() }}
        </div>
    </div>
{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >

                <x-slot name="title">Mettre à Jour l'approvisionnement</x-slot>

                <x-slot name="content">
                    <!-- Formula -->
                    <x-input.group for="formula" label="Formule" :error="$errors->first('editing.formula_id')">
                        <x-input.select wire:model="editing.formula_id" id="formula">
                            <option value="" selected>-- Sélectionner une formule --</option>
                            @foreach ($formulas as $formula)
                                <option value="{{ $formula->id }}">{{ $formula->ref_dip }} - {{ $formula->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <!-- production code No de production -->
                    <x-input.group for="code" label="No Production" :error="$errors->first('editing.code')">
                        <x-input.text wire:model="editing.code" id="code" />
                    </x-input.group>

                    <!-- Statut -->
                    <x-input.group for="status" label="Statut" :error="$errors->first('editing.status')">
                        <x-input.select wire:model="editing.status" id="status">
                            @foreach (App\Models\production::STATUSES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- production date -->
                    <x-input.group for="production_date_for_editing" label="Date production" :error="$errors->first('editing.production_date_for_editing')">
                        <x-input.date wire:model="editing.production_date_for_editing" id="production_date_for_editing" />
                    </x-input.group>

                    <!-- ready date -->
                    <x-input.group for="ready_date_for_editing" label="Date libérable" :error="$errors->first('editing.ready_date_for_editing')">
                        <x-input.date wire:model="editing.ready_date_for_editing" id="ready_date_for_editing" />
                    </x-input.group>

                     <!-- oil quantity-->
                    <x-input.group for="oil_qty" label="Quantité des huiles" :error="$errors->first('oil_qty')">
                        <x-input.text type="text" wire:model="editing.oil_qty" id="oil_qty" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
                    </x-input.group>

                       <!-- total quantity-->
                    <x-input.group for="total_qty" label="Quantité totale" :error="$errors->first('total_qty')">
                        <x-input.text type="text" wire:model="editing.total_qty" id="total_qty" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
                    </x-input.group>

                     <!-- is a masterbatch -->
                    <x-input.group for="masterbatch" label="Masterbatch" :error="$errors->first('editing.masterbatch')">
                        <x-input.checkbox wire:model="editing.masterbatch" id="masterbatch" />
                    </x-input.group>
                     <!-- is cosmecert organic -->
                    <x-input.group for="cosmecert" label="Cosmecert" :error="$errors->first('editing.cosmecert')">
                        <x-input.checkbox wire:model="editing.cosmecert" id="cosmecert" />
                    </x-input.group>
                    <!-- infos comments -->
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
                        {{-- <x-button class="ml-2" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button> --}}
                        <x-buttons.primary type="submit">{{ __('Enregistrer') }}</x-buttons.primary>
                    </x-slot>
            </x-dialog-modal>
        </form>
    </div>
</div>
