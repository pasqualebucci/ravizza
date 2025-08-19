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
                Taschini
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{

currentTaschino: @js($currentTaschinoMaterial),
    
    updateTaschino(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        const materials = modelViewer.model.materials;
        
        // First hide all pockets
        materials.forEach(material => {
            if (material.name.includes('tasca')) {
                material.setAlphaMode('BLEND');
                material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            }
        });

        // Function to show a pocket
        const showPocket = (pocketName) => {
            console.log('Trying to show pocket:', pocketName); // Debug log
            const pocket = modelViewer.model.getMaterialByName(pocketName);
            if (pocket) {
                pocket.setAlphaMode('OPAQUE');
                pocket.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
                console.log('Pocket shown:', pocketName); // Debug log
            } else {
                console.log('Pocket not found:', pocketName); // Debug log
            }
        };

        // Show pockets based on item value
        switch(item) {
            case '2':
                showPocket('tasca_1L');
                break;
            case '3':
                showPocket('tasca_1L');
                showPocket('tasca_1R');
                break;
            case '4':
                showPocket('tasca_2L');
                break;
            case '5':
                showPocket('tasca_2L');
                showPocket('tasca_2R');
                break;
            case '6':
                showPocket('tasca_3L');
                break;
            case '7':
                showPocket('tasca_3L');
                showPocket('tasca_3R');
                break;
        }

    }
}">
    <div class="grid grid-cols-1 place-items-center">

        @foreach ($taschini as $taschino)
        <div class="w-full max-w-72 {{ $currentTaschino == $taschino->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $taschino->id }}" wire:click="updateTaschino('{{$taschino->id}}','{{$taschino->material}}')" class="w-full cursor-pointer"
                x-on:click="updateTaschino('{{$taschino->id}}')" {{ $currentTaschino == $taschino->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $taschino->image)}}"
                        alt="{{$taschino->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$taschino->nome}}</h3>
                    @if($taschino->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($taschino->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($taschino->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($taschino->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($taschino->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$taschino->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>

</div>
@endif
</div>