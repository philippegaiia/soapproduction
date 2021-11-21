<!-- Categorie -->
<div class="mt-4">
    <x-label for="ingredient_category_id" :value="__('Catégorie')" />
    <select id="ingredient_category_id" name="ingredient_category_id"  class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <option value="" disabled>Sélectionner une catégorie</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id}}" {{ (old('ingredient_category_id') ?? $category->id) == $ingredient->ingredient_category_id ? 'selected' : ''  }}> {{ $category->name }} </option>
        @endforeach
    </select>
    <x-input-error for="ingredient_category_id" class="mt-2" />
</div>

<!-- Code -->
{{-- <div class="mt-4 hidden">
    <x-label for="code" :value="__('Code ingrédient')" />
    <input type="text" id="code" class="block mt-1 w-full" name="code" value=" " />
</div class="mt-4"> --}}

<!-- Name -->
<div class="mt-4">
    <x-label for="name" :value="__('Nom ingrédient')" />
    <x-input id="name" class="mt-1 w-full" type="text" name="name" :value="old('name') ?? $ingredient->name" required autofocus />
    <x-input-error for="name" class="mt-2" />
</div>

<!-- Name english -->
<div class="mt-4">
    <x-label for="name_en" :value="__('Nom ingrédient - Anglais')" />
    <x-input id="name_en" class="mt-1 w-full" type="text" name="name_en" :value="old('name_en') ?? $ingredient->name_en" autofocus />
    <x-input-error for="name_en" class="mt-2" />
</div>

<!-- Statut -->
<div class="mt-4">
    <x-label for="active" :value="__('Statut')" />
    <select id="active" name="active"  class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <option value="" disabled>Sélectionner une situation</option>
        @foreach ($ingredient->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ (old('active') == $activeOptionValue || $ingredient->active == $activeOptionValue) ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>

<!-- inci -->
<div class="mt-4">
    <x-label for="inci" :value="__('Code INCI')" />
    <x-input id="inci" class="block mt-1 w-full" type="text" name="inci" :value="old('inci') ?? $ingredient->inci" required autofocus/>
    <x-input-error for="inci" class="mt-2" />
</div>

<!-- inci saponified soude-->
<div class="mt-4">
    <x-label for="inci_naoh" :value="__('Code INCI après saponification soude')" />
    <x-input id="inci_naoh" class="block mt-1 w-full" type="text" name="inci_naoh" :value="old('inci_naoh') ?? $ingredient->inci_naoh"  autofocus/>
    <x-input-error for="inci_naoh" class="mt-2" />
</div>

<!-- inci saponified potasse-->
<div class="mt-4">
    <x-label for="inci_koh" :value="__('Code INCI après saponification potasse')" />
    <x-input id="inci_koh" class="block mt-1 w-full" type="text" name="inci_koh" :value="old('inci_koh') ?? $ingredient->inci_koh"  autofocus/>
    <x-input-error for="inci_koh" class="mt-2" />
</div>

<!-- cas -->
<div class="mt-4">
    <x-label for="cas" :value="__('Numéro CAS TSCA')" />
    <x-input id="cas" class="block mt-1 w-full" type="text" name="cas" :value="old('cas') ?? $ingredient->cas"/>
    <x-input-error for="cas" class="mt-2" />
</div>

<!-- cas -->
<div class="mt-4">
    <x-label for="cas_einecs" :value="__('Numéro CAS EINECS')" />
    <x-input id="cas_einecs" class="block mt-1 w-full" type="text" name="cas_einecs" :value="old('cas_einecs') ?? $ingredient->cas_einecs"/>
    <x-input-error for="cas_einecs" class="mt-2" />
</div>

<!-- einecs -->
<div class="mt-4">
    <x-label for="einecs" :value="__('Numéro EINECS')" />
    <x-input id="einecs" class="block mt-1 w-full" type="text" name="einecs" :value="old('einecs') ?? $ingredient->einecs"/>
    <x-input-error for="einecs" class="mt-2" />
</div>

<!-- Infos -->
<div class="mt-4">
    <x-label for="infos" :value="__('Informations')" />
    <x-textarea id="infos" class="block mt-1 w-full" rows="5" name="infos" :value="old('infos') ?? $ingredient->infos"/>
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
