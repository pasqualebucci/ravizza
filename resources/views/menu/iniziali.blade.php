<nav class="">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 ">
        <li class="me-2">
            <button
                wire:click="updateKit(1)"
                class="{{$kit == 1 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Personalizzazioni
            </button>
        </li>
        <li class="me-2">
            <button
                wire:click="updateKit(2)"
                class="{{$kit == 2 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Iniziali
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
    <div class="p-4 mb-4  border border-gray-200 rounded-lg">
        <div class="mb-4">
            <label for="ini" class="block mb-2 text-sm font-medium text-gray-900">Inserisci le tue iniziali</label>
            <input
                type="text"
                id="ini"
                wire:model.live="initials"
                
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Inserisci le tue iniziali..."
                required />
        </div>

        
            <div class="mb-4">
                <label for="initialsColor" class="block mb-2 text-sm font-medium text-gray-900">Colore</label>
                <select
                    id="initialsColor"
                    wire:model.live="iniColor"
                    wire:change="saveInitials"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleziona...</option>
                    @foreach ($ini_color as $colore)
                    <option value="{{ $colore->codice }}">{{ $colore->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="initialsStyle" class="block mb-2 text-sm font-medium text-gray-900">Stile</label>
                <select
                    id="initialsStyle"
                    wire:model.live="iniStyle"
                    wire:change="saveInitials"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleziona...</option>
                    @foreach ($ini_style as $stile)
                    <option value="{{ $stile->font_family }}">{{ $stile->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="initialsPosition" class="block mb-2 text-sm font-medium text-gray-900">Posizione</label>
                <select
                    id="initialsPosition"
                    wire:model.live="iniPosition"
                    wire:change="saveInitials"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleziona...</option>
                    @foreach ($ini_position as $posizione)
                    <option>
                        {{ $posizione->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Esempio con AlpineJS in iniziali.blade.php per triggerare la funzione JS --}}
<div wire:ignore x-data x-init="
    $watch('$wire.initials', value => window.updateInitialsHotspot($wire.initials, $wire.iniColor, $wire.iniPosition, $wire.iniStyle));
    $watch('$wire.iniColor', value => window.updateInitialsHotspot($wire.initials, $wire.iniColor, $wire.iniPosition, $wire.iniStyle));
    $watch('$wire.iniPosition', value => window.updateInitialsHotspot($wire.initials, $wire.iniColor, $wire.iniPosition, $wire.iniStyle));
    $watch('$wire.iniStyle', value => window.updateInitialsHotspot($wire.initials, $wire.iniColor, $wire.iniPosition, $wire.iniStyle));
"></div>

        @if ($settings['prezzo_iniziali_tipo'] == 'completo')
        @if ($settings['prezzo_iniziali_completo'] != 0)
        <hr class="h-px my-6 bg-gray-200 border-0" />
        <p class="mb-3 font-bold text-sm text-gray-700">
            € {{number_format($settings['prezzo_iniziali_completo'], 2)}}
        </p>
        @endif
        @elseif ($settings['prezzo_iniziali_tipo'] == 'lettera')
        @if ($settings['prezzo_iniziali_per_lettera'] != 0)
        <hr class="h-px my-6 bg-gray-200 border-0" />
        <p class="mb-3 font-bold text-sm text-gray-700">
            € {{number_format($settings['prezzo_iniziali_per_lettera'], 2)}} / carattere
        </p>
        @endif
        @endif
    </div>



    <div class="relative">
        <img class="object-cover object-center h-64 w-full rounded-lg" src="{{ asset('storage/' . $tessuto->image) }}" alt="">
        <p class="absolute inset-0 flex items-center justify-center text-white font-medium stitched-text"
            style="
        font-size: 48px;
        font-weight: bold;
        color: {{$iniColor ? $iniColor: ''}};
        font-family: {{$iniStyle ? $iniStyle: 'Courier New'}};
        text-shadow: -1px 1px 3px rgba(0, 0, 0, 0.82);
    ">
            {{$initials}}
        </p>
    </div>


@endif
</div>