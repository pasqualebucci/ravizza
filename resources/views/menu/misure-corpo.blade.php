<nav class="">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500">
    <li class="me-2">
            <button 
                wire:click="updateKit(1)"
                class="{{$kit == 1 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Tipo
            </button>
        </li>
        <li class="me-2">
            <button 
                wire:click="updateKit(2)"
                class="{{$kit == 2 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Misurazione
            </button>
        </li>
        <li class="me-2">
            <button 
                wire:click="updateKit(3)"
                class="{{$kit == 3 
                    ? 'inline-block p-4 text-gray-900 bg-[var(--theme-bg-customizer-color)] rounded-t-lg active' 
                    : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-[var(--theme-accent-color)]/20 cursor-pointer'}}">
                Tutorial
            </button>
        </li>
    </ul>
</nav>

<div class="p-4 bg-[var(--theme-bg-customizer-color)] rounded-lg">
    @if($kit == 1)
        @include('menu.filtri-misure')
    @elseif($kit == 2)
        @include('misure.misure-corpo')
    @elseif($kit == 3)
        @include('tutorial.misure-corpo')
    @endif
</div>

