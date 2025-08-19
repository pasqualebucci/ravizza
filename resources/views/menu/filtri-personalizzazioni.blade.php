<aside x-data="{ 
    updateCamera(orbit, target) {
        const viewer = document.querySelector('#shirtViewer');
        viewer.cameraOrbit = orbit;
        viewer.cameraTarget = target;
       
    }
}">
    <div class="w-full p-4  border border-[var(--theme-accent-color)]/20 rounded-lg">

        <div class="flow-root">
            <ul role="list" class="divide-y divide-[var(--theme-accent-color)]/20 ">

                <li wire:click="updateView('colletti')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'colletti' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('-40deg 90deg 1.5m','0m 14.3m auto')">{{ __('shirt.collars') }}</li>

                <li wire:click="updateView('maniche')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'maniche' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('60deg 90deg 85%','0m 12.1m auto')">{{ __('shirt.sleeves') }}</li>

                @if($currentManicaMaterial === 'manica_lunga')
                <li wire:click="updateView('polsini')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'polsini' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('120deg 90deg -8m','0m 10m auto')">{{ __('shirt.cuffs') }}</li>
                @endif

                <li wire:click="updateView('fronte')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'fronte' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('0deg 90deg 105%')">{{ __('shirt.front') }}</li>

                <li wire:click="updateView('dietro')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'dietro' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('180deg 90deg 105%')">{{ __('shirt.back') }}</li>

                <li wire:click="updateView('taschini')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'taschini' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('0deg 90deg 1.5m','-0.2m 14.3m auto')">{{ __('shirt.pockets') }}</li>

                <li wire:click="updateView('bottoni')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'bottoni' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('0deg 90deg 105%')">{{ __('shirt.buttons') }}</li>

                <li wire:click="updateView('asole')"
                    class="w-full px-4 py-3 border-b border-[var(--theme-accent-color)]/20 cursor-pointer {{ $currentView === 'asole' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('0deg 90deg 105%')">{{ __('shirt.buttonholes') }}</li>

                <li wire:click="updateView('iniziali')"
                    class="w-full px-4 py-3 rounded-b-lg cursor-pointer {{ $currentView === 'iniziali' ? 'text-[var(--theme-accent-color)] font-bold' : '' }}"
                    x-on:click="updateCamera('0deg 90deg 105%')">{{ __('shirt.initials') }}</li>
            </ul>
        </div>
</aside>