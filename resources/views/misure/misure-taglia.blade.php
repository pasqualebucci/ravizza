<div class="p-4 bg-white border border-gray-200 rounded-lg space-y-4">
    <div>
        <label for="taglia" class="block mb-2 text-sm font-medium text-gray-900">Seleziona la tua taglia</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.defer="taglia">
            <option value="S" {{ $taglia === "S" ? 'selected' : '' }}>S</option>
            <option value="M" {{ $taglia === "M" ? 'selected' : '' }}>M</option>
            <option value="L" {{ $taglia === "L" ? 'selected' : '' }}>L</option>
            <option value="XL" {{ $taglia === "XL" ? 'selected' : '' }}>XL</option>
            <option value="XXL" {{ $taglia === "XXL" ? 'selected' : '' }}>XXL</option>
            <option value="XXXL" {{ $taglia === "XXXL" ? 'selected' : '' }}>XXXL</option>

        </select>
    </div>


    <div>
        <label for="vestibilita" class="block mb-2 text-sm font-medium text-gray-900">Seleziona la tua vestibilità</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model.defer="vestibilita">
            <option value="Slim" {{ $vestibilita === "Slim" ? 'selected' : '' }}>Slim</option>
            <option value="Regular" {{ $vestibilita === "Regular" ? 'selected' : '' }}>Regular</option>
            <option value="Large" {{ $vestibilita === "Large" ? 'selected' : '' }}>Large</option>
        </select>
    </div>

    @guest
    <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">

        <div>
            Per salvare queste misure nel tuo profilo, devi essere loggato. <a href="/profile" class="font-medium underline hover:text-gray-900">Accedi adesso</a>.
        </div>
    </div>
    @endguest

    <div class="flex space-x-1">
        <button
            wire:click="updateMisureTaglia()"
            class="text-white bg-[var(--theme-accent-color)] hover:bg-[var(--theme-accent-color)]/80 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer">
            Applica
        </button>

    </div>
</div>