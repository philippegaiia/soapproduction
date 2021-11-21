
<div class="py-4 space-y-4 ">
    <div class="flex justify-between">
        <div class="w-1/4 flex space-x-4">
            <p class="text-xl">Items de la production</p>
        </div>
        <div>
            <x-buttons.special wire:click="createItems({{ $production->id }},'{{ $production->formula_id }}')" ><x-icons.plus />générer items</x-buttons.special>
            <x-buttons.primary wire:click="create" class="ml-4"><x-icons.plus />Ajouter un ingredient</x-buttons.primary>
        </div>
    </div>
    {{-- Production items table --}}
    <div class="flex-col space-y-4">
        <x-tables.table>
            <x-slot name="head">
                <x-tables.heading sortable wire:click="sortBy('ingredient_id')" :direction="$sortField === 'ingredient_id' ? $sortDirection : null">Ingredient</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('supply_id')" :direction="$sortField === 'supply_id' ? $sortDirection : null">Batch</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('percentoils_real')" :direction="$sortField === 'percentoils_real' ? $sortDirection : null">% Huiles</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('percenttotal_real')" :direction="$sortField === 'percenttotal_real' ? $sortDirection : null">% total</x-tables.heading>
                <x-tables.heading class="text-left">Poids g</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('organic')" :direction="$sortField === 'organic' ? $sortDirection : null">Bio</x-tables.heading>
                <x-tables.heading sortable wire:click="sortBy('phase')" :direction="$sortField === 'phase' ? $sortDirection : null">Phase</x-tables.heading>
                <x-tables.heading/>
            </x-slot>
            <x-slot name="body">
                @forelse ($items as $item)
                <x-tables.row wire:loading.class.delay="opacity-50">
                    <x-tables.cell>{{$item->ingredient->name}}</x-tables.cell>
                    <x-tables.cell>{{$item->supply->code ?? ''}} {{$item->supply->name ?? ''}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percentoils_real,2,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percenttotal_real,3,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percentoils_real * $oilQty/100*1000,0,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $item->organic_color }}-100 text-{{ $item->organic_color }}-800 capitalize">
                            {{ $item->organic ? 'Bio' : 'Bio ou conv' }}
                        </span>
                    </x-tables.cell>
                    <x-tables.cell>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-{{ $item->phase_color }}-100 text-{{ $item->phase_color }}-800 capitalize">
                            {{ $item->phase_name }}
                        </span>
                    </x-tables.cell>
                     <x-tables.cell>
                        <x-buttons.edit-button-modal-sm wire:click="edit({{ $item->id }})"></x-buttons.edit-button-modal-sm>
                        <x-buttons.duplicate-button-modal-sm wire:click="duplicate({{ $item->id }})"></x-buttons.duplicate-button-modal-sm>
                        <x-buttons.delete-button-sm wire:click="delete({{ $item->id }})" class="ml-4"></x-buttons.delete-button-sm>
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
        <div class="align-middle max-w-full overflow-x-auto shadow-lg sm:rounded-lg px-4 bg-purple-50 bg-opacity-100">
            <div class="flex justify-start items-center py-2">
                <span class="pr-4 text-gray-900 text-xl font-semibold ">Total % Huiles (doit être 100%): <span class="pl-2 font-bold "> {{ number_format($totalOils,2,',', ' ') }}%</span></span>
                <span class="px-6 text-gray-900 text-xl font-semibold ">% Total: <span class="pl-2 font-bold "> {{ number_format($total,2,',', ' ') }}%</span></span>
            </div>
        </div>
    </div>
{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >
                <x-slot name="title">Mettre à Jour la formule </x-slot>
                <x-slot name="content">
                    <input type="text" hidden wire:model="editing.ingredient_id">
                    <!-- select ingredient listing -->
                    {{-- <x-input.group for="listing_id" label="Listing" :error="$errors->first('editing.listing_id')">
                        <x-input.select wire:model="editing.listing_id" id="listing_id">
                            <option value="">-- Choisir un ingrédient --</option>
                            @foreach ($listings as $listing)
                                <option value="{{ $listing->id }}">{{ $listing->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group> --}}
                    <!-- select ingredient listing -->
                    {{-- <x-input.group for="listing_id" label="Listing" :error="$errors->first('editing.listing_id')">
                        <x-input.select wire:model="editing.listing_id" id="listing_id">
                            <option value="">-- Choisir un ingrédient --</option>
                            @foreach ($supplies as $supply)
                                <option value="{{ $supply->id }}">{{ $supply->listing->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group> --}}
                    <!-- percentage of oils real-->

                    {{-- <div>
                        @if ($item)
                           <livewire:productions.select-supply :ingredientId="$item->ingredient_id" :selectedSupply="$item->supply_id" />
                        @endif

                    </div> --}}

                    <x-input.group for="percentoils_real" label="% / huiles " :error="$errors->first('editing.percentoils_real')">
                        <x-input.text type="text" wire:model="editing.percentoils_real" id="percentoils_real" pattern="[0-9]+([\.|,][0-9]+)?" step="0.001" placeholder="000.000" required/>
                    </x-input.group>
                    <!-- percentage total real -->
                    <x-input.group for="percenttotal_real" label="% / Total" :error="$errors->first('percenttotal_real')">
                        <x-input.text type="text" wire:model="editing.percenttotal_real" id="percenttotal_real" pattern="[0-9]+([\.|,][0-9]+)?" step="0.001" placeholder="000.000" required/>
                    </x-input.group>
                    <!-- has to be organic -->
                    <x-input.group for="organic" label="Doit être bio" :error="$errors->first('editing.organic')">
                        <x-input.checkbox wire:model="editing.organic" id="organic" />
                    </x-input.group>
                    <!-- ingredient phase -->
                    <x-input.group for="phase" label="Phase" :error="$errors->first('editing.phase')">
                        <x-input.select wire:model="editing.phase" id="phase">
                            @foreach (App\Models\FormulaItem::PHASES as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button
                    wire:click="$toggle('showEditModal')"
                    wire:loading.attr="disabled" >
                        {{ __('Annuler') }}
                    </x-secondary-button>
                    <x-buttons.primary type="submit">{{ __('Enregistrer') }}</x-buttons.primary>
                </x-slot>
            </x-dialog-modal>
        </form>
    </div>
</div>




