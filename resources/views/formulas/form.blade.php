<!-- Formula Name -->
<x-input.group for="name" label="Désignation" :error="$errors->first('name')">
    <x-input.text name="name" id="name" :value="old('name') ?? $formula->name" />
</x-input.group>

    <!-- Formula code -->
<x-input.group for="code" label="Code" :error="$errors->first('code')">
    <x-input.text name="code" id="code" :value="old('code') ?? $formula->code"/>
</x-input.group>

    <!-- Formula reference dip -->
<x-input.group for="ref_dip" label="Référence DIP" :error="$errors->first('ref_dip')">
    <x-input.text name="ref_dip" id="ref_dip" :value="old('ref_dip') ?? $formula->ref_dip"/>
</x-input.group>

<!-- formula start date -->
<x-input.group for="start_date_for_editing" label="Date d'application" :error="$errors->first('start_date_for_editing')">
    <x-input.text type="date" name="start_date_for_editing" id="start_date_for_editing" :value="old('start_date_for_editing') ?? $formula->start_date_for_editing"/>
</x-input.group>

{{-- <input type="date" name="start_date_for_editing" value={{ old('start_date_for_editing') ?? $formula->start_date_for_editing }}> --}}

<!-- Statut -->
{{-- <x-input.group for="active" label="Statut" :error="$errors->first('active')">
    <x-input.select name="active" id="active">
        @foreach (App\Models\Formula::STATUSES as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </x-input.select>
</x-input.group> --}}

<!-- Statut -->
<x-input.group for="active" label="Statut">
    <x-input.select  name="active" id="active">
        <option value="" selected>-- Sélectionner un statut --</option>
        @foreach ($formula->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ (old('active') == $activeOptionValue || $formula->active == $activeOptionValue) ? 'selected' : '' }}> {{ $activeOptionValue }} </option>
        @endforeach
    </x-input.select>
</x-input.group>

<!-- Statut -->
<x-input.group for="infos" label="Infos" :error="$errors->first('infos')" >
    <x-textarea name="infos" id="infos" row="2" class="w-full">{{ old('infos') ?? $formula->infos }}</x-textarea>
</x-input.group>
