<div>
    <!-- Categorie -->

    <x-input.group for="category" label="Catégorie Ingrédient">
        <x-input.select wire:model="selectedCategory" name="catagory" id="category">
            <option value="" selected>-- Sélectionner une catégorie --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id}}" > {{ $category->name }} </option>
            @endforeach
        </x-input.select>
    </x-input.group>

    {{-- Ingrédient link to the selected category --}}
    @if (!is_null($selectedCategory))

        <x-input.group for="ingredient_id" label="Ingrédient">
            <x-input.select wire:model="selectedIngredient" name="ingredient_id" id="ingredient_id">
                <option value="" selected>-- Sélectionner un ingrédient --</option>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id}}" > {{ $ingredient->name }} </option>
                @endforeach
            </x-input.select>
    </x-input.group>
    @endif
</div>
