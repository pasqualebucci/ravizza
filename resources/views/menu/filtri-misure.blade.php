<aside>

    <div class="w-full p-4 border border-[var(--theme-accent-color)]/20 rounded-lg mb-4">
        
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">

                <li class="py-3" wire:click="updateMisure('Misura con taglia')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm {{ $currentMisure === 'Misura con taglia' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Misura da taglia standard</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateMisure('Misura il tuo corpo')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $currentMisure === 'Misura il tuo corpo' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Misura il tuo corpo</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateMisure('Misura la tua camicia')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $currentMisure === 'Misura la tua camicia' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Misura una camicia che ti va bene</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateMisure('Inviaci una camicia')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $currentMisure === 'Inviaci una camicia' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Inviaci una camicia per misurarla</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateMisure('SizeYou')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $currentMisure === 'SizeYou' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Misurati con l'App SizeYou</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateMisure('Servizio su misura a Milano')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $currentMisure === 'Servizio su misura a Milano' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Servizio su misura a Milano</p>
                        </div>
                    </div>
                </li>


            </ul>
        </div>
    </div>


    <div class="w-full p-4 border border-[var(--theme-accent-color)]/20 rounded-lg">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-bold leading-none text-gray-900 ">Unità di misura</h5>

        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 ">

                <li class="py-3" wire:click="updateUnitaMisure('cm')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm {{ $unitaMisure === 'cm' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Centimetri</p>
                        </div>
                    </div>
                </li>

                <li class="py-3" wire:click="updateUnitaMisure('in')">
                    <div class="flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-sm {{ $unitaMisure === 'in' ? 'text-[var(--theme-accent-color)] font-bold' : 'text-gray-900 font-medium cursor-pointer' }}">Pollici</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</aside>