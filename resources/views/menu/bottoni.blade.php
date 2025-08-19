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
                Bottoni
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{

    updateButton(item) {
        
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        const materials = modelViewer.model.materials;
        materials.forEach(material => {
            if (material.name.includes('button')) {
                material.pbrMetallicRoughness.setBaseColorFactor(item);
            }
        });
    }
}">
    <div class="grid grid-cols-1 place-items-center">
        @foreach ($bottoni as $bottone)
        <div class="w-full max-w-72 {{ $currentButton == $bottone->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $bottone->id }}" wire:click="updateButton('{{$bottone->id}}','{{$bottone->colore}}')" class="w-full cursor-pointer"
                x-on:click="updateButton('{{$bottone->colore}}')" {{ $currentButton == $bottone->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $bottone->image)}}"
                        alt="{{$bottone->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$bottone->nome}}</h3>
                    @if($bottone->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($bottone->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($bottone->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($bottone->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($bottone->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$bottone->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
</div>