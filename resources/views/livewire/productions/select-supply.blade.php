<div>
    <!-- Listing -->

    <x-input.group for="listing" label="listing Ingrédient">
        <x-input.select wire:model="selectedListing" name="listing" id="listing">
            <option value="" selected>-- Sélectionner un listing --</option>
            @foreach ($listings as $listing)
                <option value="{{ $listing->id}}" > {{ $listing->name }} </option>
            @endforeach
        </x-input.select>
    </x-input.group>
    {{-- Ingrédient link to the selected category --}}
    @if (!is_null($selectedListing))
        <x-input.group for="supply_id" label="Ingrédient">
            <x-input.select wire:model="selectedSupply" name="editing.supply_id" id="supply_id">
                <option value="" selected>-- Sélectionner un ingrédient --</option>
                @foreach ($supplies as $supply)
                    <option value="{{ $supply->id}}"> {{ $supply->batch_no }} - {{ $supply->listing->name }} / {{ $supply->listing->pkg }} {{ $supply->listing->unit_weight }}</option>
                @endforeach
            </x-input.select>
        </x-input.group>
    @endif
</div>
