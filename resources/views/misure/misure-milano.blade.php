<div class="p-4 border border-[var(--theme-accent-color)]/20 rounded-lg space-y-4">
    <p>Se risiedi nella zona di Milano, puoi prenotare una visita a domicilio del nostro sarto per prendere insieme le misure e ricevere una consulenza personalizzata.</p>
    <p>Contattaci per maggiori informazioni o per fissare un appuntamento.</p>
    
    <div class="border border-gray-300 rounded-lg bg-white p-6 mb-6 space-y-2">
        
                                    <div
                                        class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start ">
                                        <div
                                            class="h-12 w-12 rounded-full bg-[#646b2c]/10 flex items-center justify-center">
                                            <x-heroicon-o-phone class="h-7 text-[#646b2c]" />
                                        </div>
                                        <div>
                                            <h5 class="text-base text-muted font-medium mb-1">+39 02 85687 613
                                            </h5>
                                            
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-6">
                                        <div
                                            class="h-12 w-12 rounded-full bg-[#646b2c]/10 flex items-center justify-center">
                                            <x-heroicon-o-envelope class="h-7 text-[#646b2c]" />
                                        </div>
                                        <div>
                                            <h5 class="text-base text-muted font-medium mb-1">lab@camiceria1871.com
                                            </h5>
                                            
                                        </div>
                                    </div>
                                
    </div>

    

    <button
        wire:click="updateMisureMilano()"
        class="text-white bg-[var(--theme-accent-color)] hover:bg-[var(--theme-accent-color)]/80 font-medium rounded-lg text-sm px-4 py-2 cursor-pointer">
        Applica
    </button>

</div>