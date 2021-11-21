
<div class="py-4 space-y-4 ">
    <div class="flex justify-between">
        <div class="w-2/4 flex space-x-4">
            <p class="text-2xl font-semibold">Items de la formule</p>
        </div>

        <div>
            <x-buttons.primary wire:click="create" ><x-icons.plus />Ajouter un ingredient à la formule</x-buttons.primary>
        </div>
    </div>

    {{-- Orders table --}}
    <div class="flex-col space-y-4">

        <x-tables.table>

            <x-slot name="head">

                <x-tables.heading sortable wire:click="sortBy('ingredient_id')" :direction="$sortField === 'ingredient_id' ? $sortDirection : null">Ingredient</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('percentoils_dip')" :direction="$sortField === 'percentoils_dip' ? $sortDirection : null">DIP % oils</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('percenttotal_dip')" :direction="$sortField === 'percenttotal_dip' ? $sortDirection : null">DIP % Total</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('percentoils_real')" :direction="$sortField === 'percentoils_real' ? $sortDirection : null">Réel % oils</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('percenttotal_real')" :direction="$sortField === 'percenttotal_real' ? $sortDirection : null">Réel % total</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('organic')" :direction="$sortField === 'organic' ? $sortDirection : null">Bio</x-tables.heading>

                <x-tables.heading sortable wire:click="sortBy('phase')" :direction="$sortField === 'phase' ? $sortDirection : null">Phase</x-tables.heading>

                <x-tables.heading/>

            </x-slot>

            <x-slot name="body">
                @forelse ($items as $item)
                <x-tables.row wire:loading.class.delay="opacity-50">
                    <x-tables.cell>{{$item->ingredient->name}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percentoils_dip,3,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percenttotal_dip,3,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percentoils_real,3,',', ' ')}}</x-tables.cell>
                    <x-tables.cell>{{number_format($item->percenttotal_real,3,',', ' ')}}</x-tables.cell>
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
{{--
        <div class="">
            {{ $products->links() }}
        </div> --}}

    </div>

{{-- Modal for edit --}}
    <div >
        <form wire:submit.prevent="save">
            <x-dialog-modal wire:model.defer="showEditModal" >

                <x-slot name="title">Mettre à Jour la ligne</x-slot>

                <x-slot name="content">
                     <!-- livewire component to select product_subcategory  from product_category -->
                    {{-- <div>
                        <livewire:products.add-category
                        :selectedSubcategory="$product->product_subcategory_id"
                        />
                    </div> --}}

                    <input type="text" hidden wire:model="editing.formula_id">

                    <!-- select ingredient -->
                    <x-input.group for="ingredient_id" label="Ingrédient" :error="$errors->first('editing.ingredient_id')">
                        <x-input.select wire:model="editing.ingredient_id" id="ingredient_id">
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <!-- percentage of oils DIP-->
                    <x-input.group for="percentoils_dip" label="% huiles DIP" :error="$errors->first('percentoils_dip')">
                        <x-input.text type="text" wire:model="editing.percentoils_dip" id="percentoils_dip" pattern="[0-9]+([\.|,][0-9]+)?" step="0.001" placeholder="000.000" required/>
                    </x-input.group>

                    <!-- percentage total DIP -->
                    <x-input.group for="percenttotal_dip" label="% total DIP" :error="$errors->first('percenttotal_dip')">
                        <x-input.text type="text" wire:model="editing.percenttotal_dip" id="percenttotal_dip" pattern="[0-9]+([\.|,][0-9]+)?" step="0.001" placeholder="000.000" required/>
                    </x-input.group>

                    <!-- percentage of oils real-->
                    <x-input.group for="percentoils_dip" label="% huiles DIP" :error="$errors->first('percentoils_dip')">
                        <x-input.text type="text" wire:model="editing.percentoils_real" id="percentoils_dip" pattern="[0-9]+([\.|,][0-9]+)?" step="0.001" placeholder="000.000" required/>
                    </x-input.group>

                    <!-- percentage total real -->
                    <x-input.group for="percenttotal_real" label="% réel DIP" :error="$errors->first('percenttotal_real')">
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
{{--
                        <x-button class="ml-2" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-button> --}}
                    </x-slot>
            </x-dialog-modal>
        </form>
    </div>
</div>




