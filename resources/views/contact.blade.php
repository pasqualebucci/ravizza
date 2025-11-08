<x-sito.main-layout>

    <x-slot:title>
        Contatti - Ravizza Lab
        </x-slot>

        <section class="relative pt-20 bg-[#fff9ea]">
            <div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 items-center justify-center">

                    <div class="text-sm max-w-3xl mx-auto text-center">
                        @include('components.sito.nav')

                    </div>

                    <div class="h-96 mt-12 ">
                        <gmp-map center="45.49833679199219,9.141593933105469" zoom="14" map-id="DEMO_MAP_ID">
                            <gmp-advanced-marker position="45.49833679199219,9.141593933105469"
                                title="My location"></gmp-advanced-marker>
                        </gmp-map>
                    </div>

                    <!-- Contact Start -->
                    <section id="contact" class="py-20">
                        <div class="w-full max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid lg:grid-cols-3 gap-6 items-center">
                                <div>

                                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Hai bisogno di
                                        informazioni?<br /><span class="text-[#646b2c]">Siamo
                                            qui per te.</span></h2>



                                    <div
                                        class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start ">
                                        <div
                                            class="h-12 w-12 rounded-full bg-[#646b2c]/10 flex items-center justify-center">
                                            <x-heroicon-o-phone class="h-7 text-[#646b2c]" />
                                        </div>
                                        <div>
                                            <h5 class="text-base text-muted font-medium mb-1">02 30836 82
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

                                <div class="lg:col-span-2 lg:ms-24">
                                    <div class="p-6 md:p-12 rounded-md shadow-xl bg-white">
                                        <form method="POST" action="https://formspree.io/f/mldnzyez">
                                            <div class="grid sm:grid-cols-2 gap-6">
                                                <div>
                                                    <label for="name"
                                                        class="block text-sm/normal font-semibold text-black mb-2">Nome</label>
                                                    <input type="text"
                                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-[#646b2c] focus:ring-transparent"
                                                        name="name" id="name" required placeholder="Nome e cognome...">
                                                </div>



                                                <div>
                                                    <label for="email"
                                                        class="block text-sm/normal font-semibold text-black mb-2">Email</label>
                                                    <input type="email"
                                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-[#646b2c] focus:ring-transparent"
                                                        name="email" id="email" required placeholder="La tua email...">
                                                </div>



                                                <div class="sm:col-span-2">
                                                    <div class="mb-4">
                                                        <label for="message"
                                                            class="block text-sm/normal font-semibold text-black mb-2">Messaggio</label>
                                                        <textarea
                                                            class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                                            id="message" rows="4" name="message"
                                                            placeholder="Scrivi un messaggio..." required=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-[#646b2c] hover:bg-[#193820] font-medium rounded-lg text-base px-5 py-2 transition-all duration-300 cursor-pointer">Invia
                                                    il messaggio</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                </div>

                @include('components.sito.footer')

            </div>
        </section>


</x-sito.main-layout>