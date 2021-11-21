<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un fournisseur') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-4xl mx-auto p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('suppliers.update', ['supplier' => $supplier]) }}">
                        @method('PATCH')
                        @csrf

                        <!-- Code -->
                        <div class="mt-4">
                            <x-label for="code" :value="__('Code Fournisseur')" />
                            <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code') ?? $supplier->code" required autofocus />
                            <x-input-error for="code" class="mt-2" />
                        </div class="mt-4">

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Société')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $supplier->name" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <!-- Contact -->
                        <div class="mt-4">
                            <x-label for="contact" :value="__('Nom Contact')" />
                            <x-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact') ?? $supplier->contact"/>
                            <x-input-error for="contact" class="mt-2" />
                        </div>


                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? $supplier->email"/>
                            <x-input-error for="email" class="mt-2" />
                        </div>

                        <!-- Tel -->
                        <div class="mt-4">
                            <x-label for="tel" :value="__('Tel')" />
                            <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel') ?? $supplier->tel"/>
                            <x-input-error for="tel" class="mt-2" />
                        </div>

                        <!-- www -->
                        <div class="mt-4">
                            <x-label for="www" :value="__('Site Internet')" />
                            <x-input id="www" class="block mt-1 w-full" type="text" name="www" :value="old('www') ?? $supplier->www"/>
                            <x-input-error for="www" class="mt-2" />
                        </div>

                        <!-- Address 1 -->
                        <div class="mt-4">
                            <x-label for="address1" :value="__('Adresse')" />
                            <x-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1') ?? $supplier->address1"/>
                            <x-input-error for="address1" class="mt-2" />
                        </div>

                        <!-- Address 2 -->
                        <div class="mt-4">
                            <x-label for="address2" :value="__('Adresse - suite')" />
                            <x-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2') ?? $supplier->address2"/>
                            <x-input-error for="address2" class="mt-2" />
                        </div>

                        <!-- ZIP CODE -->
                        <div class="mt-4">
                            <x-label for="zip" :value="__('Code Postal')" />
                            <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip') ?? $supplier->zip"/>
                            <x-input-error for="zip" class="mt-2" />
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-label for="city" :value="__('Ville')" />
                            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city') ?? $supplier->city"/>
                            <x-input-error for="city" class="mt-2" />
                        </div>

                        <!-- Country -->
                        <div class="mt-4">
                            <x-label for="country" :value="__('Pays')" />
                            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country') ?? $supplier->country"/>
                            <x-input-error for="country" class="mt-2" />
                        </div>

                        <!-- Statut -->
                        <div class="mt-4">
                            <label for="active" class="block text-sm font-medium text-gray-700">Statut</label>
                            <select id="active" name="active"  class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="old('active') ?? ''" selected>Sélectionner une situation</option>
                                @foreach ($supplier->activeOptions() as $activeOptionKey => $activeOptionValue)
                                    <option value="{{ $activeOptionKey }}" {{ $supplier->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Infos -->
                        <div class="mt-4">
                            <x-label for="infos" :value="__('Informations')" />
                            <x-textarea id="infos" class="block mt-1 w-full" rows="5" name="infos" >{{ $supplier->infos }}</x-textarea>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
