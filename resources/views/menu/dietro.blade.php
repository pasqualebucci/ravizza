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
                Dietro
            </button>
        </li>

    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-personalizzazioni')
    @elseif($kit == 2)
<div class="overflow-y-auto flex-1 col-span-2" x-data="{

currentDietro: @js($currentDietroMaterial),
    
    updateDietro(item) {
        const modelViewer = document.querySelector('#shirtViewer');
        if (!modelViewer || !modelViewer.model) return;

        const materials = modelViewer.model.materials;
        
        // Define which materials should be visible for each selection
        const visibilityMap = {
            '1': {
                dietro: 'dietro_1',
                yoke: 'yoke_1'
            },
            '2': {
                dietro: 'dietro_2',
                yoke: 'yoke_2'
            },
            '3': {
                dietro: 'dietro_3',
                yoke: 'yoke_3'
            }
        };

        const selectedMaterials = visibilityMap[item];
        
        materials.forEach(material => {
            if (material.name.startsWith('dietro_') || material.name.startsWith('yoke_')) {
                const isVisible = (material.name === selectedMaterials.dietro || 
                                 material.name === selectedMaterials.yoke);
                
                if (!isVisible) {
                    material.setAlphaMode('BLEND');
                    material.pbrMetallicRoughness.setBaseColorFactor([0, 0, 0, 0]);
                } else {
                    material.setAlphaMode('OPAQUE');
                    material.pbrMetallicRoughness.setBaseColorFactor([1, 1, 1, 1]);
                }
            }
        });
    }
}">
    <div class="grid grid-cols-1 place-items-center">

        @foreach ($dietro as $diet)
        <div class="w-full max-w-72 {{ $currentDietro == $diet->id ? 'bg-[var(--theme-accent-color)]/20 pointer-events-none' : 'bg-white' }} rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 mx-auto mb-4">
            <button id="card{{ $diet->id }}" wire:click="updateDietro('{{$diet->id}}','{{$diet->material}}')" class="w-full cursor-pointer"
                x-on:click="updateDietro('{{$diet->id}}')" {{ $currentDietro == $diet->id ? 'disabled' : '' }}>
                <div class="w-full">
                    <img class="rounded-t-lg w-full aspect-video object-cover object-center"
                        src="{{asset('storage/' . $diet->image)}}"
                        alt="{{$diet->nome}}"
                        loading="lazy" />
                </div>
                <div class="p-3 text-left">
                    <h3 class="mb-2 text-l font-bold tracking-tight text-gray-900">{{$diet->nome}}</h3>
                    @if($diet->prezzo_scontato > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($diet->prezzo_scontato, 2)}}
                        <span class="text-gray-400 line-through">€ {{number_format($diet->prezzo, 2)}}</span>
                    </p>
                    @else
                    @if ($diet->prezzo > 0)
                    <p class="mb-3 font-bold text-sm text-gray-700">
                        € {{number_format($diet->prezzo, 2)}}
                    </p>
                    @endif
                    @endif
                    <p class="mb-1 font-normal text-sm text-gray-700">{{$diet->descrizione}}</p>
                </div>
            </button>
        </div>
        @endforeach
    </div>

</div>
@endif
</div>