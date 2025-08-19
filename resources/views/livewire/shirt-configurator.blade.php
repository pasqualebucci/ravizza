<div class="pt-14" x-data="{ 
    updateCamera(orbit, fov) {
        const viewer = document.querySelector('#shirtViewer');
        viewer.cameraOrbit = orbit;
        viewer.cameraTarget = '0m 14.3m auto';
    }
}">
    @include('components.header')
    <div class="flex flex-col md:flex-row h-auto md:h-[calc(100vh-3.75rem)]">
        <div class="hidden lg:flex lg:flex-col lg:w-1/4 relative px-4 " wire:loading.class="opacity-50">
            @include('kit.kit')

            <!-- Input -->
            <form wire:submit="send"
                class="sticky bottom-0 left-0 z-50 w-full h-auto p-4 mt-4 rounded-md bg-[var(--theme-bg-model-color)]">

                <div x-data="{
    show: true,
    examples: [
        'Metti il colletto diplomatico',
        'Inserisci i bottoni rossi',
        'Mostrami i tessuti estivi a righe',
        'Aggiungi le iniziali PB',
        'Metti il colletto button down',
        'Mostrami i tessuti in lino',
        'Inserisci bottoni neri',
        'Metti la manica corta',
        'Voglio il polsino arrotondato',
        'Fammi vedere i colletti',
        'Usa il bottone celeste',
        'Metti la manica a pieghe',
        'Mostrami i polsini disponibili',
        'Elencami le maniche',
        'Imposta la schiena con 2 pieghe',
        'Voglio vedere le tasche',
        'Apri le misure',
        'Metti il colletto alla coreana',
        'Elencami le asole',
        'Mostrami la privacy',
        'Quali polsini ci sono?'
    ],
    start: 0,
    fading: false,
    get visible() {
        return this.examples.slice(this.start, this.start + 3);
    },
    autoScroll() {
        setInterval(() => {
            this.fading = true;
            setTimeout(() => {
                this.start = (this.start + 3) % this.examples.length;
                this.fading = false;
            }, 600); // tempo fade-out prima del cambio (ms)
        }, 4000); // cambia ogni secondo
    }

    
}" x-init="autoScroll()" x-show="show" class="flex flex-col p-4 mb-4 text-sm text-blue-400 rounded-lg bg-gray-800"
                    role="alert">

                    <div class="flex items-start gap-3">
                        <x-heroicon-s-sparkles class="w-6 h-6 mt-1" />
                        <div>
                            <span class="font-bold">Esempi per l'assistente AI:</span>
                            <ul class="mt-1.5 list-disc list-inside relative min-h-[4rem]">
                                <template x-for="item in visible" :key="item">
                                    <li x-text="item" x-show="!fading"
                                        x-transition:leave="transition-opacity duration-600"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        x-transition:enter="transition-opacity duration-600"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <button @click="show = false" type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-gray-800 text-blue-400 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-gray-700 inline-flex items-center justify-center h-8 w-8"
                            aria-label="Close">
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>



                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <x-heroicon-s-sparkles class="h-5 w-auto text-[var(--theme-accent-color)] animate-pulse" />
                    </div>
                    <input type="text" wire:model.lazy="message" autofocus
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[var(--theme-accent-color)] focus:border-[var(--theme-accent-color)] outline-4 outline-[var(--theme-accent-color)]/20 outline-offset-2"
                        placeholder="Come posso aiutarti?" />

                </div>
            </form>
        </div>

        <div class="relative flex-1 w-full md:w-2/3 lg:w-2/4 px-4  lg:px-0">

            <div class="sticky top-[56px] {{$vistainterna === '3d' ? '' : 'hidden'}}">
                @include('components.model')
            </div>

            <div class="sticky top-[56px] {{$vistainterna === 'tryon' ? '' : 'hidden'}}">
                @include('components.tryon')
            </div>

        </div>

        <div class="relative md:w-1/3 lg:w-1/4 min-w-[200px]  p-4 ">
            <div class="sticky top-[80px] ">
                @include('components.dettaglio')
            </div>

        </div>
    </div>
</div>