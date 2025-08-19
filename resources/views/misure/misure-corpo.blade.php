<div class="p-4 bg-white border border-gray-200 rounded-lg space-y-4">

    @if($showErrors)
    <div class="p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50" role="alert">
        <p class="block mb-2 text-sm font-bold text-gray-900 text-red-500">Anomalie riscontrate</p>
        <ul class="mb-4">
            @foreach ($erroriCompatibilita as $error)
            <li class="text-sm text-red-500 mb-2">{{$loop->iteration}} - {{$error}}</li>
            @endforeach
        </ul>
        <div>
            Se ritieni che queste misure siano comunque esatte, premi FORZA in fondo al modulo. In caso contrario correggile e premi APPLICA.
        </div>
    </div>
    @endif

    <div>
        <label for="collo" class="block mb-2 text-sm font-medium text-gray-900">Collo {{$unitaMisure == 'cm' ? 'da 35 a 50' : 'da 13.78 a 27.56'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required wire:model.defer="colloCorpo" />
        @error('collo')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="torace" class="block mb-2 text-sm font-medium text-gray-900">Torace {{$unitaMisure == 'cm' ? 'da 80 a 130' : 'da 31.50 a 51.18'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required wire:model.defer="toraceCorpo" />
        @error('torace')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="girovita" class="block mb-2 text-sm font-medium text-gray-900">Girovita {{$unitaMisure == 'cm' ? 'da 70 a 120' : 'da 27.56 a 47.24'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required wire:model.defer="girovitaCorpo" />
        @error('girovita')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="spalle" class="block mb-2 text-sm font-medium text-gray-900">Spalle {{$unitaMisure == 'cm' ? 'da 42 a 55' : 'da 16.53 a 21.65'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required wire:model.defer="spalleCorpo" />
        @error('spalle')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="braccia" class="block mb-2 text-sm font-medium text-gray-900">Braccia {{$unitaMisure == 'cm' ? 'da 58 a 70' : 'da 22.83 a 27.56'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required wire:model.defer="bracciaCorpo" />
        @error('braccia')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="polso" class="block mb-2 text-sm font-medium text-gray-900">Polso {{$unitaMisure == 'cm' ? 'da 15 a 22' : 'da 5.90 a 8.66'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required wire:model.defer="polsoCorpo" />
        @error('polso')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="lunghezza" class="block mb-2 text-sm font-medium text-gray-900">Lunghezza {{$unitaMisure == 'cm' ? 'da 40 a 55' : 'da 15.75 a 21.65'}} {{$unitaMisure}}</label>
        <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required wire:model.defer="lunghezzaCorpo" />
        @error('lunghezza')
        <p class="mt-2 text-sm text-red-600"><span class="font-semibold">{{ $message }}</p>
        @enderror
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
            wire:click="updateMisureCorpo()"
            class="text-white bg-[var(--theme-accent-color)] hover:bg-[var(--theme-accent-color)]/80 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer">
            Applica
        </button>
        @if($showErrors)
        <button
            wire:click="updateMisureCorpo(true)"
            class="text-white bg-gray-700 hover:bg-gray-800 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer">
            Forza
        </button>
        @endif
    </div>
</div>