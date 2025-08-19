<div class="flex items-center lg:space-x-2" x-data="{ open: false }">

    <button type="button" class="snipcart-checkout relative inline-flex items-center rounded-lg justify-center p-2 hover:text-gray-600 transition-colors text-sm font-medium leading-none text-gray-900 cursor-pointer">
        <x-fas-bag-shopping class="w-4 h-3 me-1" />
        <span class="hidden md:block">Carrello</span>
        <div class="ml-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-[var(--theme-accent-color)] rounded-full " wire:ignore><span class="snipcart-items-count"></span></div>
    </button>

    <button x-on:click="open = ! open" class="relative inline-flex items-center rounded-lg justify-center p-2 hover:text-gray-500 transition-colors text-sm font-medium leading-none text-gray-900 cursor-pointer">
        <span :class="open ? 'text-[var(--theme-accent-color)]' : ''"><x-fas-user class="w-4 h-3 me-1" /></span>
        @auth
        <span :class="open ? 'text-[var(--theme-accent-color)] hidden md:block' : 'hidden md:block'">{{ auth()->user()->name }}</span>
        @else
        <span :class="open ? 'text-[var(--theme-accent-color)] hidden md:block' : 'hidden md:block'">Profilo</span>
        @endauth
        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg></button>


    <!-- Dropdown menu -->
    <div x-cloak x-show="open" @click.outside="open = false" x-transition class="z-20 absolute top-[56px] right-4 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-64">
        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
            <li>
                <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 ">Vai al profilo</a>
            </li>

        </ul>
        @auth
        @if(isset($wishesRecuperati) && count($wishesRecuperati) > 0)
        <div class="w-full p-4">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-base font-bold leading-none text-gray-900 ">Le tue creazioni</h5>
            </div>

            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 ">
                    @foreach($wishesRecuperati as $wish)
                    <li class="py-3">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img class="w-8 h-8 rounded-sm" src="{{ asset('storage/'.$wish->tessuto_image) }}" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate ">
                                    {{$wish->tessuto_nome}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    <button
                                        wire:click="riprendiWishes({{$wish}})"
                                        @click="open = false"
                                        class="text-sm font-normal text-[var(--theme-accent-color)] cursor-pointer">
                                        <u>Riprendi</u>
                                    </button>
                                </p>
                            </div>

                        </div>
                    </li>
                    @endforeach
            </div>
        </div>
        @endif
        @if(isset($misureRecuperate))
        <div class="w-full p-4">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-base font-bold leading-none text-gray-900 ">Le tue misure</h5>
            </div>

            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 ">
                    <li class="py-3">

                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 text-sm">{{$misureRecuperate->tipo_misura}}</p>
                            <button
                                wire:click="riprendiMisure({{$misureRecuperate}})"
                                @click="open = false"
                                class="text-sm font-normal text-[var(--theme-accent-color)] cursor-pointer"><u>Riprendi</u></button>
                        </div>

                    </li>

                </ul>
            </div>

        </div>
        @endif

        

        @endauth
    </div>



</div>