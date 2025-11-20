<x-sito.main-layout>
    <x-slot:title>
        Home - Ravizza Lab
        </x-slot>
        <!-- Navbar Start -->

        <!-- Navbar End -->
        <section class="relative pt-20 bg-[#fff9ea]">
            <div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 items-center justify-center">



                    <div class="text-sm max-w-3xl mx-auto text-center">
                        @include('components.sito.nav')

                    </div>

                    <div class="mt-6">

                        <video class="w-full aspect-video rounded-xl" autoplay muted loop playsinline
                            webkit-playsinline>
                            <source src="{{ asset('sito/videos/ravizza-lab.mp4') }}" type="video/mp4">
                            Il tuo browser non supporta il tag video.
                        </video>


                    </div>
                </div>

                @include('components.sito.footer')

            </div>
        </section>


</x-sito.main-layout>