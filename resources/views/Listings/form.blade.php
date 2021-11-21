<div class="space-y-4 sm:space-y-0">
    <x-input.group for="supplier_id" label="Fournisseur" :error="$errors->first('supplier_id')">
        <x-input.select name="supplier_id" id="supplier_id">
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ (old('supplier_id') ?? $supplier->id) == $listing->supplier_id ? 'selected' : ''}}>{{ $supplier->name }} - {{ $supplier->code }}</option>
            @endforeach
        </x-input.select>
    </x-input.group>

<!-- livewire component to select categorie and ingredients -->
    <div>
        <livewire:category-ingredient :selectedIngredient="$listing->ingredient_id"/>
    </div>

    <!-- Company internal code -->
    <x-input.group for="code" label="Code Interne" :error="$errors->first('code')">
        <x-input.text name="code" id="code" :value="old('code') ?? $listing->code"/>
    </x-input.group>

    <!-- Supplier ref -->
     <x-input.group for="supplier_ref" label="Code Fournisseur" :error="$errors->first('supplier_ref')">
        <x-input.text name="supplier_ref" id="supplier_ref" :value="old('supplier_ref') ?? $listing->supplier_ref" required/>
    </x-input.group>

    <!-- Supplier designation of the ingredient -->
    <x-input.group for="name" label="Libellé" :error="$errors->first('name')">
        <x-input.text name="name" id="name" :value="old('name') ?? $listing->name" required/>
    </x-input.group>

    <!-- Statut -->
    <x-input.group for="pkg" label="Unité conditionnement" :error="$errors->first('pkg')">
        <x-input.select name="pkg" id="pkg">
            @foreach ($listing->pkgOptions() as $pkgOptionKey => $pkgOptionValue)
                <option value="{{ $pkgOptionKey }}" {{ (old('pkg') == $pkgOptionValue || $listing->pkg == $pkgOptionValue) ? 'selected' : '' }} >{{ $pkgOptionValue }}</option>
            @endforeach
        </x-input.select>
    </x-input.group>

    <!-- Unit weight-->
    <x-input.group for="unit_weight" label="Poids unitaire (kg)" :error="$errors->first('unit_weight')">
        <x-input.text type="number" name="unit_weight" id="unit_weight" :value="old('unit_weight') ?? $listing->unit_weight" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required/>
    </x-input.group>


    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200 sm:py-3 '">
        <div class="block text-sm font-semibold leading-5 text-gray-700 mt-4 sm:mt-px sm:pt-2">
            Certifications
        </div>
        <div class="flex justify-start pt-2 col-span-2">
            <!-- organic -->
            <div class="">
                <label for="organic" class="inline-flex items-center text-gray-900 font-semibold">
                    <input type="hidden" name="organic" value="0">
                    <input id="organic" type="checkbox" value="1" {{ $listing->organic || old('organic', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="organic">
                    <span class="ml-1 text-sm text-gray-600">{{ __('Biologique') }}</span>
                </label>
                <x-input-error for="organic" class="mt-2" />
            </div>

            <!-- fairtrade -->
            <div class="ml-8">
                <label for="fairtrade" class="inline-flex items-center">
                    <input type="hidden" name="fairtrade" value="0">
                    <input id="fairtrade" type="checkbox" value="1" {{ $listing->fairtrade || old('fairtrade', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="fairtrade">
                    <span class="ml-1 text-sm text-gray-600">{{ __('Fairtrade') }}</span>
                </label>
                <x-input-error for="fairtrade" class="mt-2" />
            </div>

            <!-- cosmos -->
            <div class="ml-8">
                <label for="cosmos" class="inline-flex items-center">
                    <input type="hidden" name="cosmos" value="0">
                    <input id="cosmos" type="checkbox" value="1" {{ $listing->fairtrade || old('cosmos', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="cosmos">
                    <span class="ml-1 text-sm text-gray-600">{{ __('Cosmos') }}</span>
                </label>
                <x-input-error for="cosmos" class="mt-2" />
            </div>

            <!-- cosmecert -->
            <div class="ml-8">
                <label for="cosmecert" class="inline-flex items-center">
                    <input type="hidden" name="cosmecert" value="0">
                    <input id="cosmecert" type="checkbox" value="1" {{ $listing->fairtrade || old('cosmecert', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="cosmecert">
                    <span class="ml-1 text-sm text-gray-600">{{ __('Cosmecert') }}</span>
                </label>
                <x-input-error for="cosmecert" class="mt-2" />
            </div>
        </div>
    </div>

    <!-- Statut -->
    <x-input.group for="active" label="Statut">
        <x-input.select  name="active" id="active">
            <option value="" selected>-- Sélectionner un statut --</option>
            @foreach ($listing->activeOptions() as $activeOptionKey => $activeOptionValue)
                <option value="{{ $activeOptionKey }}" {{ (old('active') == $activeOptionValue || $listing->active == $activeOptionValue) ? 'selected' : '' }}> {{ $activeOptionValue }} </option>
            @endforeach
        </x-input.select>
    </x-input.group>

    <!-- Infos -->
    <x-input.group for="infos" label="Infos" :error="$errors->first('infos')" >
        <x-textarea name="infos" id="infos" row="2" class="w-full">{{ old('infos') ?? $listing->infos }}</x-textarea>
    </x-input.group>

    <div class="flex items-center justify-end mt-4">
        <x-buttons.secondary-button href="{{ url()->previous() }}">
            {{ __('Annuler') }}
        </x-buttons.secondary-button>
        <x-button class="ml-4">
            {{ __('Enregister') }}
        </x-button>
    </div>
</div>
