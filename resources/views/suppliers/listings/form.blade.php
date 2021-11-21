<!-- livewire component to select categorie and ingredients -->
<div>
<livewire:category-ingredient />

<!-- Internal code -->
<div class="mt-4">
    <x-label for="code" :value="__('Code Interne')" />
    <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code') ?? $listing->code" required />
    <x-input-error for="code" class="mt-2" />
</div class="mt-4">

<!-- Supplier code or ref -->
<div class="mt-4">
    <x-label for="supplier_ref" :value="__('Code Fournisseur')" />
    <x-input id="supplier_ref" class="block mt-1 w-full" type="text" name="supplier_ref" :value="old('supplier_ref') ?? $listing->supplier_ref" required  />
    <x-input-error for="supplier_ref" class="mt-2" />
</div class="mt-4">

<!-- Supplier Designation of the ingredient-->
<div class="mt-4">
    <x-label for="name" :value="__('Designation')" />
    <x-input id="name" class="mt-1 w-full" type="text" name="name" :value="old('name') ?? $listing->name" required  />
    <x-input-error for="name" class="mt-2" />
</div>

<!-- Statut -->
<x-input.group for="pkg" label="Unité conditionnement" :error="$errors->first('pkg')">
    <x-input.select name="pkg" id="pkg">
        @foreach (App\Models\Listing::PACKAGES as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </x-input.select>
</x-input.group>

<!-- Unit weight-->
<div class="mt-4">
    <x-label for="unit_weight" :value="__('Poids unitaire')" />
    <x-input id="name" class="mt-1 w-full" type="number" name="unit_weight" :value="old('unit_weight') ?? $listing->unit_weight" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" placeholder="000.00" required  />
    <x-input-error for="name" class="mt-2" />
</div>


<div class="flex flex-row mt-4">
    <!-- organic -->
    <div class="">
        <label for="organic" class="inline-flex items-center">
            <input type="hidden" name="organic" value="0">
            <input id="organic" type="checkbox" value="1" {{ $listing->organic || old('organic', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="organic">
            <span class="ml-2 text-sm text-gray-600">{{ __('Biologique') }}</span>
        </label>
        <x-input-error for="organic" class="mt-2" />
    </div>

    <!-- fairtrade -->
    <div class="ml-12">
        <label for="fairtrade" class="inline-flex items-center">
            <input type="hidden" name="fairtrade" value="0">
            <input id="fairtrade" type="checkbox" value="1" {{ $listing->fairtrade || old('fairtrade', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="fairtrade">
            <span class="ml-2 text-sm text-gray-600">{{ __('Fair Trade') }}</span>
        </label>
        <x-input-error for="fairtrade" class="mt-2" />
    </div>

     <!-- cosmos -->
    <div class="ml-12">
        <label for="cosmos" class="inline-flex items-center">
            <input type="hidden" name="cosmos" value="0">
            <input id="cosmos" type="checkbox" value="1" {{ $listing->fairtrade || old('cosmos', 0) === 1 ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="cosmos">
            <span class="ml-2 text-sm text-gray-600">{{ __('Cosmos') }}</span>
        </label>
        <x-input-error for="cosmos" class="mt-2" />
    </div>
</div>

<!-- Statut -->
<div class="mt-4">
    <x-label for="active" :value="__('Statut')" />
    <select id="active" name="active"  class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <option value="" disabled>Sélectionner une situation</option>
        @foreach ($listing->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ (old('active') == $activeOptionValue || $listing->active == $activeOptionValue) ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>


<!-- einecs -->


<!-- Infos -->
<div class="mt-4">
    <x-label for="infos" :value="__('Informations')" />
    <x-textarea id="infos" class="block mt-1 w-full" rows="5" name="infos" :value="old('infos') ?? $listing->infos"/>
    <x-input-error for="infos" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
    <x-buttons.secondary-button href="{{ url()->previous() }}">
        {{ __('Annuler') }}
    </x-buttons.secondary-button>
    <x-button class="ml-4">
        {{ __('Enregister') }}
    </x-button>
</div>
</div>
