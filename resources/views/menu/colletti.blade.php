<nav class="">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 ">
        <li class="me-2">
            <button
                wire:click="updateKit(1)"
                class="{{$kit == 1 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                <span class=" ">Personalizzazioni</span>
            </button>
        </li>
        <li class="me-2">
            <button
                wire:click="updateKit(2)"
                class="{{$kit == 2 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active max-w-24' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Colletti
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
        
<div class="overflow-y-auto flex-1 col-span-2" x-data="{
currentCollar: @js($currentCollarMaterial),
    
    updateCollar(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        // Get current colors from Livewire component
        const buttonColor = @js($currentButtonColor);
        const asolaColor = @js($currentAsolaColor);

        // Determine base type
        const baseType = item.includes('alt') ? 'colletto_base_alta' : 'colletto_base';

        const materials = modelViewer.model.materials;
        materials.forEach(material => {
            if (material.name.includes('colletto')) {
                material.setAlphaMode('BLEND');
                material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            }
        });

        const selectedCollar = modelViewer.model.getMaterialByName(item);
        if (selectedCollar) {
            selectedCollar.setAlphaMode('OPAQUE');
            selectedCollar.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

            // Handle buttons and holes per button-down
            if (item.includes('botton_down')) {
                const buttonElements = ['button_colletto_botton_down', 'asola_colletto_botton_down'];
                buttonElements.forEach(elementName => {
                    const element = modelViewer.model.getMaterialByName(elementName);
                    if (element) {
                        element.setAlphaMode('OPAQUE');
                        if (elementName.includes('button')) {
                            element.pbrMetallicRoughness.setBaseColorFactor(buttonColor);
                        } else {
                            element.pbrMetallicRoughness.setBaseColorFactor(asolaColor);
                        }
                    }
                });
            }

            // Show corresponding base collo and its buttons/holes
            const baseCollo = modelViewer.model.getMaterialByName(baseType);
            if (baseCollo) {
                baseCollo.setAlphaMode('OPAQUE');
                baseCollo.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

                const buttonHolePairs = baseType === 'colletto_base_alta' 
                    ? ['button_colletto_base_alta', 'asola_colletto_base_alta']
                    : ['button_colletto_base', 'asola_colletto_base'];

                buttonHolePairs.forEach(elementName => {
                    const element = modelViewer.model.getMaterialByName(elementName);
                    if (element) {
                        element.setAlphaMode('OPAQUE');
                        if (elementName.includes('button')) {
                            element.pbrMetallicRoughness.setBaseColorFactor(buttonColor);
                        } else {
                            element.pbrMetallicRoughness.setBaseColorFactor(asolaColor);
                        }
                    }
                });
            }
        }
    }
}">


    <div class="grid grid-cols-1 place-items-center">
        @foreach ($colletti as $colletto)
        <div class="w-full max-w-72 {{ $currentCollar == $colletto->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4 ">
            <button id="card{{ $colletto->id }}" wire:click="updateCollar('{{$colletto->id}}','{{$colletto->material}}')" class="w-full cursor-pointer"
                x-on:click="updateCollar('{{$colletto->material}}')" {{ $currentCollar == $colletto->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $colletto->image)}}"
                        alt="{{$colletto->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$colletto->nome}}</h3>
                    @if($colletto->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($colletto->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($colletto->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($colletto->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($colletto->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$colletto->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>
</div>

@endif
</div>