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
                Polsini
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{
currentPolsino: @js($currentPolsinoMaterial),
    
    updatePolsino(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        // Get current colors from Livewire component
        const buttonColor = @js($currentButtonColor);
        const asolaColor = @js($currentAsolaColor);

        const materials = modelViewer.model.materials;
        materials.forEach(material => {
            if (material.name.startsWith('polsino_') || 
                material.name.includes('button_polsino') ||
                material.name.includes('asola_polsino')) {
                material.setAlphaMode('BLEND');
                material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            }
        });

        const selectedPolsino = modelViewer.model.getMaterialByName(item);
        if (selectedPolsino) {
            selectedPolsino.setAlphaMode('OPAQUE');
            selectedPolsino.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

            // Handle regular cuff buttons and buttonholes
            const buttonElements = [
                `button_${item}`,
                `asola_${item}`
            ];
            

            buttonElements.forEach(elementName => {
                const element = modelViewer.model.getMaterialByName(elementName);
                
                if (element) {
                    element.setAlphaMode('OPAQUE');
                    if (elementName.includes('button') || elementName.includes('gemello')) {
                        element.pbrMetallicRoughness.setBaseColorFactor(buttonColor);
                    } else if (elementName.includes('asola')) {
                        element.pbrMetallicRoughness.setBaseColorFactor(asolaColor);
                    }
                }
            });
        }
    }
}">
    <div class="grid grid-cols-1 place-items-center">

        @foreach ($polsini as $polsino)
        <div class="w-full max-w-72 {{ $currentPolsino == $polsino->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $polsino->id }}" wire:click="updatePolsino('{{$polsino->id}}','{{$polsino->material}}')" class="w-full cursor-pointer"
                x-on:click="updatePolsino('{{$polsino->material}}')" {{ $currentPolsino == $polsino->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $polsino->image)}}"
                        alt="{{$polsino->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$polsino->nome}}</h3>
                    @if($polsino->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($polsino->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($polsino->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($polsino->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($polsino->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$polsino->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>

</div>
@endif
</div>