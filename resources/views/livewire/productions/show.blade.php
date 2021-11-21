<div class="space-y-4 py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center pb-3 text-right sm:justify-center md:justify-end ">
            <x-buttons.edit-button-modal-sm wire:click="edit({{ $production->id }})" class="ml-3"></x-buttons.edit-button-modal-sm>
            <x-buttons.liste-button
                href="{{ route('productions.index')}}" class="ml-3">
            </x-buttons.liste-button>
        </div>
        <div class="bg-white shadow-lg overflow-hidden sm:rounded-lg">

            <div class="bproduction-t bproduction-gray-200">
                <dl>
                    <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="description-dt">No Production</dt>
                        <dd class="description-dd"><span class="font-bold text-xl">{{ $production->code }}</span> <span class="ml-12 px-3 py-1 rounded-full text-lg font-semibold leading-4 bg-{{ $production->status_color }}-100 text-{{ $production->status_color }}-800 capitalize">
                            {{ $production->status_name }}
                        </span></dd>
                    </div>
                    <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="description-dt">Formule utilisée</dt>
                        <dd class="description-dd">{{ $production->formula->name }} {{ $production->formula->ref_dip }} </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="description-dt">Chargement en huiles</dt>
                        <dd class="description-dd">{{ number_format($production->oil_qty,3,',', ' ')}} kg</dd>
                    </div>

                    <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="description-dt">Poids total après cure</dt>
                        <dd class="description-dd">{{ number_format($production->total_qty,3,',', ' ')}} kg </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-9 sm:gap-4 sm:px-6">
                        <dt class="description-dt col-span-3">Planning</dt>

                        <dt class="description-dt">Production:</dt>
                        <dd class="description-dd">{{ $production->production_date_for_humans}}</dd>

                        <dt class="description-dt">Libération:</dt>
                        <dd class="description-dd">{{ $production->ready_date_for_humans}}</dd>
                    </div>

                    @if ($production->infos != '')
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="description-dt">
                        Informations supplémentaires
                        </dt>
                        <dd class="description-dd">
                            {{ $production->infos }}
                        </dd>
                    </div>
                    @endIf

                </dl>
            </div>
            {{-- Modal for edit --}}
            <div >
                <form wire:submit.prevent="save">
                    <x-dialog-modal wire:model.defer="showEditModal" >

                        <x-slot name="title">Mettre à Jour l'approvisionnement</x-slot>

                        <x-slot name="content">
                            <!-- Formula -->
                            <x-input.group hidden for="formula" label="Formule" :error="$errors->first('editing.formula_id')">
                                <x-input.select wire:model="editing.formula_id" id="formula">
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
                            <x-input.group for="oil_qty" label="Quantité des huiles (kg)" :error="$errors->first('oil_qty')">
                                <x-input.text type="text" wire:model="editing.oil_qty" id="oil_qty" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
                            </x-input.group>

                            <!-- total quantity-->
                            <x-input.group for="total_qty" label="Quantité totale (kg)" :error="$errors->first('total_qty')">
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
        <div >
            <div class="border-t-2 mt-4 border-dashed border-indigo-200"></div>
            <livewire:productions.items :productionId="$production->id"
                                        :ingredientId="$production->ingredient_id"
                                        :production="$production"
                                        :oilQty="$production->oil_qty"
                                        :totalOils="$totalOils"
                                        :total="$total"
                                         />
        </div>
    </div>
</div>
