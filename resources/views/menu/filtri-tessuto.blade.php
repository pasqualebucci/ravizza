<aside>
    
    @if (isset($elenco['materiali']))
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg mb-4">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Materiali</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">

                @foreach ($elenco['materiali'] as $item)
                <li class="py-3 cursor-pointer" wire:click="filterByMaterial('{{ $item->id }}')">
                    <div class="flex items-center ">
                        
                        @if(in_array($item->id, $selectedMaterials))
                        <x-far-check-square class="w-5 h-5 text-[var(--theme-accent-color)] mr-2" />
                        @else
                        <x-far-square class="w-5 h-5 text-gray-300 mr-2" />
                        @endif
                        <p class="text-sm font-medium {{ in_array($item->id, $selectedMaterials) ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900' }}">
                            {{ $item->nome }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    @if (isset($elenco['colori']))
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg mb-4">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Colori</h5>
        </div>
        <div class="grid grid-cols-4 gap-3 py-3">
            @foreach ($elenco['colori'] as $item)
            <button
                wire:click="filterByColor('{{ $item->id }}')"
                x-data="{color: '{{ $item->codice }}'}"
                class="w-6 h-6 cursor-pointer rounded-full hover:ring-2 hover:ring-offset-2 {{ in_array($item->id, $selectedColors) ? 'ring-2 ring-offset-2 ' : '' }}"
                :style="`background-color: ${color}; --tw-ring-color: ${color}; ${color.toLowerCase() === '#ffffff' ? 'border: 1px solid #e5e7eb; --tw-ring-color: #e5e7eb;' : ''}`"
                title="{{$item->nome}}">
            </button>
            @endforeach
        </div>
    </div>
    @endif
    @if (isset($elenco['disegni']))
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg mb-4">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Disegni</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">

                @foreach ($elenco['disegni'] as $item)
                <li class="py-3 cursor-pointer" wire:click="filterByDesign('{{ $item->id }}')">
                    <div class="flex items-center ">
                        
                        @if(in_array($item->id, $selectedDesigns))
                        <x-far-check-square class="w-5 h-5 text-[var(--theme-accent-color)] mr-2" />
                        @else
                        <x-far-square class="w-5 h-5 text-gray-300 mr-2" />
                        @endif
                        <p class="text-sm font-medium {{ in_array($item->id, $selectedDesigns) ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900' }}">
                            {{ $item->nome }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    @if (isset($elenco['armature']))
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg mb-4">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Armature</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">
            
                @foreach ($elenco['armature'] as $item)
                <li class="py-3 cursor-pointer" wire:click="filterByArmature('{{ $item->id }}')">
                    <div class="flex items-center ">
                    @if(in_array($item->id, $selectedArmature))
                    <x-far-check-square class="w-5 h-5 text-[var(--theme-accent-color)] mr-2" />
                        @else
                        <x-far-square class="w-5 h-5 text-gray-300 mr-2" />
                        @endif
                        <p class="text-sm font-medium {{ in_array($item->id, $selectedArmature) ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900' }}">
                            {{ $item->nome }}
                        </p>
                        
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if (isset($elenco['brands']))
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg ">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Brands</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">

                @foreach ($elenco['brands'] as $item)
                <li class="py-3 cursor-pointer" wire:click="filterByBrands('{{ $item->id }}')">
                    <div class="flex items-center">
                        
                        @if(in_array($item->id, $selectedBrands))
                        <x-far-check-square class="w-5 h-5 text-[var(--theme-accent-color)] mr-2" />
                        @else
                        <x-far-square class="w-5 h-5 text-gray-300 mr-2" />
                        @endif
                        <p class="text-sm font-medium {{ in_array($item->id, $selectedBrands) ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900' }}">
                            {{ $item->nome }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif


</aside>