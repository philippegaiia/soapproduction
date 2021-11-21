<div class="mt-1 relative rounded-md shadow-sm">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm sm:leading-5">
            €
        </span>
    </div>

    <input {{ $attributes }}
     class="block w-full pl-7 pr-15 flex-1 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-inset focus:ring-indigo-300 focus:ring-opacity-50 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
     placeholder="0.00"
     aria-describedby="price-currency"
     type="number" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01"
    >

    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm sm:leading-5" id="price-currency">
            EUROS
        </span>
    </div>
</div>
