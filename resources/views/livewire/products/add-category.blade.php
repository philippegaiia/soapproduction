<div>
    <!-- product category -->

    <x-input.group for="category" label="Catégorie Produit">
        <x-input.select wire:model="selectedCategory" name="catagory" id="category">
            <option value="" selected>-- Sélectionner une catégorie --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id}}" > {{ $category->name }} </option>
            @endforeach
        </x-input.select>
    </x-input.group>

    {{-- product subcategory linked to the selected  productcategory --}}
    @if (!is_null($selectedCategory))

        <x-input.group for="product_category_id" label="Sous-catégorie">
            <x-input.select wire:model="selectedSubcategory"  id="product_category_id">
                <option value="" selected>-- Sélectionner un ingrédient --</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id}}" > {{ $subcategory->name }} </option>
                @endforeach
            </x-input.select>
    </x-input.group>
    @endif
</div>

