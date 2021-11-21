<!-- Order ref -->
<div class="mt-4">
    <x-label for="order_ref" :value="__('Date commande')" />
    <x-input id="order_ref" class="mt-1 w-full" type="text" name="order_ref" :value="old('order_ref') ?? $order->order_ref" required autofocus />
    <x-input-error for="order_ref" class="mt-2" />
</div>


<!-- Order date -->
<div class="mt-4">
    <x-label for="order_date" :value="__('Date commande')" />
    <x-input id="order_date" class="mt-1 w-full" type="date" name="order_date" :value="old('order_date') ?? $order->order_date" required autofocus />
    <x-input-error for="order_date" class="mt-2" />
</div>

<!-- delivery date -->
<div class="mt-4">
    <x-label for="delivery_date" :value="__('Date de livraison')" />
    <x-input id="delivery_date" class="mt-1 w-full" type="date" name="delivery_date" :value="old('delivery_date') ?? $order->delivery_date" autofocus />
    <x-input-error for="delivery_date" class="mt-2" />
</div>

<!-- Statut -->
<div class="mt-4">
    <x-label for="active" :value="__('Statut')" />
    <select id="active" name="active"  class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <option value="" disabled>Position de la commande</option>
        @foreach ($order->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ (old('active') == $activeOptionValue || $order->active == $activeOptionValue) ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>


<!-- order confirmation number-->
<div class="mt-4">
    <x-label for="confirmation_no" :value="__('Numéro Confirmation de Commande')" />
    <x-input id="confirmation_no" class="block mt-1 w-full" type="text" name="confirmation_no" :value="old('confirmation_no') ?? $order->confirmation_no"  autofocus/>
    <x-input-error for="confirmation_no" class="mt-2" />
</div>

<!-- bl number-->
<div class="mt-4">
    <x-label for="bl_no" :value="__('Numéro de BL')" />
    <x-input id="bl_no" class="block mt-1 w-full" type="text" name="bl_no" :value="old('bl_no') ?? $order->bl_no"  autofocus/>
    <x-input-error for="bl_no" class="mt-2" />
</div>

<!-- invoice number -->
<div class="mt-4">
    <x-label for="invoice_no" :value="__('Numéro Facture')" />
    <x-input id="invoice_no" class="block mt-1 w-full" type="text" name="invoice_no" :value="old('invoice_no') ?? $order->invoice_no"/>
    <x-input-error for="invoice_no" class="mt-2" />
</div>

<!-- Infos -->
<div class="mt-4">
    <x-label for="infos" :value="__('Informations')" />
    <x-textarea id="infos" class="block mt-1 w-full" rows="5" name="infos" :value="old('infos') ?? $order->infos"/>
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
