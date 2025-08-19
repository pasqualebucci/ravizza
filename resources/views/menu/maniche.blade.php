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
                Maniche
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{
currentManica: @js($currentManicaMaterial),

    updateManica(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        // Get current colors from Livewire component
        const buttonColor = @js($currentButtonColor);
        const asolaColor = @js($currentAsolaColor);
        const currentPolsino = @js($currentPolsinoMaterial);

        const materials = modelViewer.model.materials;
        materials.forEach(material => {
            if (material.name.includes('manica') && !material.name.includes('button') && !material.name.includes('asola')) {
                material.setAlphaMode('BLEND');
                material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
            }
        });

        const selectedManica = modelViewer.model.getMaterialByName(item);
        if (selectedManica) {
            selectedManica.setAlphaMode('OPAQUE');
            selectedManica.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);

            // Handle cuff visibility based on sleeve type
            const cuffElements = [
                currentPolsino,
                `button_${currentPolsino}`,
                `asola_${currentPolsino}`
            ];
            if (item.includes('manica_corta') || item.includes('manica_pleated')) {
                // Hide cuff and its elements for short sleeve or pleated sleeve
                cuffElements.forEach(elementName => {
                    const element = modelViewer.model.getMaterialByName(elementName);
                    if (element) {
                        element.setAlphaMode('BLEND');
                        element.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
                    }
                });
            } else if (item === 'manica_lunga') {
                // Show cuff and its elements for long sleeve
                cuffElements.forEach(elementName => {
                    const element = modelViewer.model.getMaterialByName(elementName);
                    if (element) {
                        element.setAlphaMode('OPAQUE');
                        if (elementName.includes('button')) {
                            element.pbrMetallicRoughness.setBaseColorFactor(buttonColor);
                        } else if (elementName.includes('asola')) {
                            element.pbrMetallicRoughness.setBaseColorFactor(asolaColor);
                        } else {
                            element.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
                        }
                    }
                });
            }

            // Handle buttons and holes per manica pleated
            if (item.includes('manica_pleated')) {
                const buttonElements = ['button_manica_pleated', 'asola_manica_pleated'];
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
            } else {
                // Make pleated sleeve buttons and holes transparent
                const pleatedElements = ['button_manica_pleated', 'asola_manica_pleated'];
                pleatedElements.forEach(elementName => {
                    const element = modelViewer.model.getMaterialByName(elementName);
                    if (element) {
                        element.setAlphaMode('BLEND');
                        element.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
                    }
                });
            }

            
        }
    }
}">
    <div class="grid grid-cols-1 place-items-center">

        @foreach ($maniche as $manica)
        <div class="w-full max-w-72 {{ $currentManica == $manica->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $manica->id }}" wire:click="updateManica('{{$manica->id}}','{{$manica->material}}')" class="w-full cursor-pointer"
                x-on:click="updateManica('{{$manica->material}}')" {{ $currentManica == $manica->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $manica->image)}}"
                        alt="{{$manica->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$manica->nome}}</h3>
                    @if($manica->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($manica->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($manica->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($manica->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($manica->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$manica->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach

    </div>

</div>
@endif
</div>