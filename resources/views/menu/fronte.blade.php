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
                Fronte
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{

currentFronte: @js($currentFronteMaterial),
    
    updateFronte(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        const materials = modelViewer.model.materials;
        
        // Hide/show front buttons and buttonholes based on selection
        const frontElements = ['button_front', 'asola_front'];
        frontElements.forEach(elementName => {
            const element = modelViewer.model.getMaterialByName(elementName);
            if (element) {
                if (item !== '1') {
                    element.setAlphaMode('BLEND');
                    element.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
                } else {
                    element.setAlphaMode('OPAQUE');
                    element.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
                }
            }
        });
    }
}">
    <div class="grid grid-cols-1 place-items-center">

        @foreach ($fronte as $fron)
        <div class="w-full max-w-72 {{ $currentFronte == $fron->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $fron->id }}"wire:click="updateFronte('{{$fron->id}}','{{$fron->material}}')" class="w-full cursor-pointer"
                x-on:click="updateFronte('{{$fron->id}}')" {{ $currentFronte == $fron->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $fron->image)}}"
                        alt="{{$fron->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$fron->nome}}</h3>
                    @if($fron->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($fron->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($fron->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($fron->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($fron->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$fron->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>

</div>
@endif
</div>