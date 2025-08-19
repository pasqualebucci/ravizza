<nav class="">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 ">
        <li class="me-2">
            <button
                wire:click="updateKit(1)"
                class="{{$kit == 1 
            ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
            : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Filtri
            </button>

            @if($kit == 1 && ($selectedMaterials || $selectedColors || $selectedArmature || $selectedBrands))
            <button wire:click="resetFilters" class="ml-2 text-[var(--theme-accent-color)]/20 [var(--theme-accent-color)]/30 transition cursor-pointer">
                RESET
            </button>
            @endif
        </li>

        <li class="me-2">
            <button
                wire:click="updateKit(2)"
                class="{{$kit == 2 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Tessuti
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
    @include('menu.filtri-tessuto')
    @elseif($kit == 2)
    <div style="touch-action: pan-y pinch-zoom;">

        <div class="grid grid-cols-1 place-items-center">
            @forelse ($tessuti as $tess)

            <div class="max-w-72  {{ $tessuto->slug == $tess->slug ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-xl transition-shadow duration-300 mx-auto mb-4">
                <a href="/fabric/{{$tess->slug}}" class="block {{ $tessuto->slug == $tess->slug ? 'cursor-default' : '' }}">
                    <div class="relative">
                        @if($tess->label != "")
                        <span class="absolute right-2 top-2 text-gray-900 text-xs font-bold px-2.5 py-0.5 rounded-sm">{{$tess->label}}</span>
                        @endif
                        <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                            src="{{asset('storage/' . $tess->image)}}"
                            alt="{{$tess->nome}}"
                            loading="lazy" />

                    </div>

                    <div class="p-3">
                        <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900 hover:text-[var(--theme-accent-color)]/20">
                            {{$tess->nome}}
                        </h3>
                        @if($tess->prezzo_scontato > 0)
                        <p class="mb-3 font-bold text-sm text-gray-700">
                            € {{number_format($tess->prezzo_scontato, 2)}}
                            <span class="text-gray-400 line-through">€ {{number_format($tess->prezzo, 2)}}</span>
                        </p>
                        @else
                        <p class="mb-3 font-bold text-sm text-gray-700">
                            € {{number_format($tess->prezzo, 2)}}
                        </p>
                        @endif
                        <p class="mb-1 font-normal text-sm text-gray-700">
                            {{$tess->descrizione_breve}}
                        </p>
                    </div>
                </a>
            </div>

            @empty
            <div class="col-span-2 text-center py-8 text-gray-500">
                Nessun tessuto disponibile
            </div>
            @endforelse
        </div>
    </div>

    @endif
</div>
