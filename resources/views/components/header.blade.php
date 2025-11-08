<div x-data="{ open: false }">
  <nav class="fixed top-0 left-0 right-0 z-19 bg-[var(--theme-bg-color)] antialiased">
    <div class="px-4 py-2 lg:py-3">
      <div class="flex items-center justify-between">

        <div class="flex items-center justify-center sm:space-x-3 md:space-x-8">

          <div class="shrink-0">
            <a href="/">
              <img class="block w-auto h-12 " src="{{ asset('images/logo/logo_ravizza.webp') }}" alt="logo">

            </a>
          </div>

          <ul class="hidden lg:flex items-center gap-4  sm:justify-center">


            <li class="shrink-0">
              <button @click="
                $wire.setFase('tessuti');
                window.scrollTo({ top: 0, behavior: 'smooth' });
              "
                class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
                    {{ $fase === 'tessuti' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                {{ __('shirt.fabrics') }}
              </button>
            </li>
            <li class="shrink-0">
              <button @click="
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $wire.setFase('personalizzazione');
              "
                class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
              {{ $fase === 'personalizzazione' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                {{ __('shirt.customizations') }}
              </button>
            </li>
            <li class="shrink-0">
              <button @click="
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $wire.setFase('misure');
              "
                class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
                    {{ $fase === 'misure' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                {{ __('shirt.measurements') }}
              </button>
            </li>

            


          </ul>
        </div>

        <div class="flex items-center justify-end">
          @include('menu.profilo')

          <button class="text-gray-900 lg:hidden ml-6 cursor-pointer" type="button" x-on:click="open = ! open">
            <template x-if="open">
              <x-heroicon-c-x-mark class="w-7" />
            </template>
            <template x-if="!open">
              <x-heroicon-c-bars-3 class="w-7" />
            </template>
          </button>

        </div>


      </div>

    </div>
  </nav>





  @session('status')
    <div id="sticky-banner" x-init="setTimeout(() => $wire.resetStatus(), 3000)" tabindex="-1"
    class="fixed top-0 start-0 z-50 flex justify-between w-full p-4 border-b border-emerald-200 bg-emerald-100">
    <div class="flex items-center mx-auto">
      <p class="flex items-center text-sm font-normal text-emerald-600">
      <span class="inline-flex me-2 w-6 h-6 items-center justify-center shrink-0">
        <x-heroicon-o-check-badge />
      </span>
      <span>{{ $value }}</span>
      </p>
    </div>
    <div class="flex items-center">
      <button wire:click="resetStatus()" type="button"
      class="shrink-0 inline-flex justify-center w-7 h-7 items-center text-emerald-400 hover:bg-emerald-200 hover:text-emerald-500 rounded-lg text-sm p-1.5 cursor-pointer">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close banner</span>
      </button>
    </div>
    </div>

  @endsession


  <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak x-show="open"
    @click.outside="open = false">

    <div class="fixed inset-0 bg-gray-600/60 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

          <div class="pointer-events-auto relative w-screen max-w-md">

            <div class="flex h-full flex-col overflow-y-scroll bg-gray-100 py-6 mt-6 shadow-xl">

              <div class="relative mt-6 flex-1 px-4 ">


                <div class="relative">
                  <!-- Contenitore scrollabile -->
                  <ul
                    class="flex lg:hidden items-center gap-1 justify-start mb-4 overflow-x-auto whitespace-nowrap scrollbar-none pr-6">
                    <li class="shrink-0">
                      <button @click="
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $wire.setFase('tessuti');
              " class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
        {{ $fase === 'tessuti' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                        {{ __('shirt.fabrics') }}
                      </button>
                    </li>
                    <li class="shrink-0">
                      <button @click="
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $wire.setFase('personalizzazione');
              " class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
        {{ $fase === 'personalizzazione' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                        {{ __('shirt.customizations') }}
                      </button>
                    </li>
                    <li class="shrink-0">
                      <button @click="
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $wire.setFase('misure');
              " class="cursor-pointer px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 
        {{ $fase === 'misure' ? 'bg-[var(--theme-accent-color)] text-[var(--theme-accent-color-contrast)] font-bold' : 'text-gray-900 hover:bg-[var(--theme-accent-color)]/20' }}">
                        {{ __('shirt.measurements') }}
                      </button>
                    </li>
                    
                  </ul>

                  <!-- Fade destro -->
                  <div
                    class="pointer-events-none absolute top-0 right-0 h-full w-6 bg-gradient-to-l from-gray-100 to-transparent">
                  </div>
                </div>






                @include('kit.kit')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>