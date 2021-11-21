<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="flex items-center font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Informations pour l\'approvisionnement ') }}{{ $order->order_ref }} ({{ $order->supplier->name }})
            </h2>
            <div class="flex items-center px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                {{-- <dt class="description-dt">Statut</dt> --}}
                {{-- <dd class="description-dd "> --}}
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-lg font-semibold leading-4 bg-{{ $order->active_color }}-100 text-{{ $order->active_color }}-800 capitalize">
                        {{ $order->active_name }}
                    </span>
                {{-- </dd> --}}
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            {{-- <div class=" mx-auto px-6 py-3 bg-white border-b border-gray-200"> --}}
                <div class="flex items-center pb-3 text-right sm:justify-center md:justify-end ">

                    {{-- <x-buttons.secondary-button href="{{ route('ingredients.create') }}" class="block">
                        {{ __('Créer un nouvel ingrédient') }}
                    </x-buttons.secondary-button>

                    <x-buttons.edit-button-sm href="{{ route('ingredients.edit', ['ingredient' => $ingredient]) }}" class="block ml-3">
                        {{ __('') }}
                    </x-buttons.edit-button-sm>

                    <form action="{{ route('ingredients.destroy', ['ingredient' => $ingredient] )}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-buttons.delete-button-sm class="ml-4" onclick="return confirm('Etes-vous certain de supprimer {{ $ingredient->name }}?')">
                        </x-buttons.delete-button-sm>
                    </form>--}}

                    <x-buttons.liste-button
                        href="{{ route('orders.index')}}" class="ml-3">
                    </x-buttons.liste-button>

                </div>

                <div class="bg-white shadow-lg overflow-hidden sm:rounded-lg">

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">Date Commande</dt>
                                <dd class="description-dd">{{ $order->order_date_for_humans }}</dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">Date de livraison</dt>
                                <dd class="description-dd">{{ $order->delivery_date_for_humans }}</dd>
                            </div>

                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">No Confirmation de Commande</dt>
                                <dd class="description-dd">{{ $order->confirmation_no }}</dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">No BL</dt>
                                <dd class="description-dd">{{ $order->bl_no}} </dd>
                            </div>

                            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">No Facture</dt>
                                <dd class="description-dd">{{ $order->invoice_no}}</dd>
                            </div>
                                <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">

                                    <dt class="description-dt">Montant HT</dt>
                                    <dd class="description-dd">{{ $order->amount}} Euros</dd>

                                    <dt class="description-dt">Freight</dt>
                                    <dd class="description-dd">{{ $order->freight}} Euros</dd>
                                </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="description-dt">
                                Informations supplémentaires
                                </dt>
                                <dd class="description-dd">
                                    {{ $order->infos }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8 ">
                <div class="border-t-2 border-dashed border-indigo-200"></div>
                <livewire:supply.add-supply  :orderId="$order->id" :supplierId="$order->supplier_id">
            </div>
    </div>
{{-- </div>
</div> --}}

{{-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('supply.add-supply')
        </div>
    </div>
</div> --}}



</x-app-layout>



