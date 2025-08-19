<x-sito.main-layout>
    <x-slot:title>
        Home - Shirtly
    </x-slot>
    <!-- Navbar Start -->
    @include('components.sito.nav-light')
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="relative pt-44 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900" id="home">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-center justify-center">
                <div class="text-sm max-w-3xl mx-auto text-center">
                    <h1
                        class="text-3xl md:text-5xl/tight lg:text-6xl/tight text-white tracking-normal leading-normal font-semibold max-w-2xl">
                        Configuratore <span
                            class="bg-linear-to-r from-pink-500 to-violet-500 bg-clip-text font-extrabold text-transparent">3D</span><br />per
                        Sartorie Artigianali</h1>
                    <div class="max-w-xl mx-auto">
                        <p class="text-base text-white leading-7 mt-4">Scopri <b>Shirtly</b> il configuratore 3D per
                            camicie su misura che rispetta la tua arte, elimina gli errori e ti fa risparmiare ore
                            preziose.</p>
                    </div>
                    <div class="flex flex-wrap items-center justify-center mt-9 text-center gap-3">

                        <a href="/fabric/{{$firstTessuto->slug }}"
                            class="focus:outline-none text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-900 font-medium rounded-lg text-base px-5 py-2 transition-all duration-300 cursor-pointer">Prova
                            il Configuratore</a>
                        <a href="#contact"
                            class="focus:outline-none py-2 px-5 text-white rounded-lg border border-white text-base hover:border-white hover:bg-slate-800 hover:text-purple-500 transition-all duration-300 cursor-pointer">Contattaci</a>
                    </div>
                </div>

                <div class="bg-white/40 px-4 pt-4 mt-16 rounded-t-xl mx-auto max-w-full relative">
                    <img src={{ asset('sito/images/hero-image.webp') }}
                        class="rounded-t-lg mx-auto w-full lg:min-w-[950px]" alt="">
                    <model-viewer id="modelloCamicia"
                        camera-orbit="calc(30.5rad + env(window-scroll-y) * 16rad) calc(54deg + env(window-scroll-y) * 180deg) calc(17m - env(window-scroll-y) * 16m)"
                        src="{{ asset('modelli/camicia-semplice.glb') }}" alt="Una camicia in 3D"
                        class="absolute inset-0 w-full h-full object-cover object-center" tone-mapping="commerce"
                        exposure="0.69">

                    </model-viewer>
                </div>
            </div>

        </div>
    </section>
    <!-- Hero End -->

    <!-- Services Start -->
    <section id="services" class="py-20">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <span
                    class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950">Caratteristiche</span>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Elegante con i
                    Clienti.<br />Semplice per i Sarti.</h2>
                <p class="text-base font-medium mt-4 text-muted">Tutto quello che ti serve è già incluso.</p>
            </div>

            <div
                class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-x-3 gap-y-6 md:gap-y-12 lg:gap-y-24 md:pt-20 pt-12">

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-o-users class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Area Clienti</h1>
                    <p class="text-base text-gray-600 mt-2">Ogni cliente ha il suo profilo: può salvare le misure, le
                        configurazioni
                        preferite e consultare lo storico ordini.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-o-shopping-cart class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">E-commerce integrato</h1>
                    <p class="text-base text-gray-600 mt-2">Nei piani che lo includono, l’e-commerce integrato ti
                        consente di vendere anche gli accessori sartoriali.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-c-adjustments-vertical class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Backend per Sartorie</h1>
                    <p class="text-base text-gray-600 mt-2">Inserisci i tuoi tessuti e modifica i dettagli direttamente
                        da un pannello
                        intuitivo.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-c-device-phone-mobile class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Mobile-friendly</h1>
                    <p class="text-base text-gray-600 mt-2">Funziona su ogni dispositivo, anche il backend è ottimizzato
                        per l’uso da smartphone o tablet.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-c-language class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Bilingue (ITA/ENG)</h1>
                    <p class="text-base text-gray-600 mt-2">Interfaccia multilingua per accogliere clienti italiani e
                        internazionali.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="items-center justify-center flex bg-purple-100 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20">
                            <x-heroicon-o-banknotes class="h-10 text-purple-500" />
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Pagamenti integrati</h1>
                    <p class="text-base text-gray-600 mt-2">Vendi direttamente dal configuratore grazie a Snipcart:
                        supporta Stripe, PayPal e molti altri gateway. Checkout sicuro, già pronto all’uso.
                    </p>
                </div>


            </div>

        </div>
    </section>
    <!-- Services End -->

    <!-- Feature Start -->
    <section id="features" class="py-20">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="flex items-center">
                    <img src="{{ asset('sito/images/businessman.webp') }}" class="max-h-[650px] h-auto rounded-xl mx-auto"
                        alt="Sarto al lavoro">
                </div>

                <div class="">
                    <span class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950">Come
                        funziona</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Il cliente personalizza la
                        camicia in 3 semplici step</h2>

                    <hr class="border-gray-200 my-6">
                    </hr>

                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div
                                class="w-12 h-12 rounded-full border border-dashed border-purple-500 bg-purple-100 flex items-center justify-center">
                                <span class="text-xl text-purple-600">1</span>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Sceglie il Tessuto</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Seleziona il tessuto da una collezione
                                con immagine, descrizione e prezzo.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div
                                class="w-12 h-12 rounded-full border border-dashed  border-purple-500 bg-purple-100 flex items-center justify-center">
                                <span class="text-xl text-purple-600">2</span>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Personalizza i dettagli</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Colletto, polsini, bottoni, iniziali…
                                tutto selezionabile con preview in tempo reale.</p>
                        </div>

                    </div>

                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div
                                class="w-12 h-12 rounded-full border border-dashed  border-purple-500 bg-purple-100 flex items-center justify-center">
                                <span class="text-xl text-purple-600">3</span>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Invia l'ordine</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Ricevi l’ordine via email o da pannello
                                amministratore, già pronto per la creazione.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->



    <!-- About Start -->
    <section id="about" class="py-20">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="">
                    <div>
                        <span
                            class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950">Perchè
                            Shirtly</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Il tuo lavoro diventa più
                        preciso, veloce e redditizio fin da subito. </h2>
                    <hr class="border-gray-200 my-6">
                    </hr>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 mt-4">



                        <div class="">

                            <h1 class="text-xl font-semibold  pt-6"><span class="text-5xl">1<span
                                        class="text-purple-500">.</span></span> Personalizzazione</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Gestisci ogni dettaglio che offri: tipi
                                di collo, polsini, bottoni, iniziali, vestibilità... Tutto in un unico posto.</p>
                        </div>

                        <div class="">

                            <h1 class="text-xl font-semibold pt-6"><span class="text-5xl">2<span
                                        class="text-purple-500">.</span></span> Meno Errori</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Il software verifica la compatibilità
                                delle misure inserite e organizza i dati in modo chiaro.</p>
                        </div>


                        <div class="">

                            <h1 class="text-xl font-semibold  pt-6"><span class="text-5xl">3<span
                                        class="text-purple-500">.</span></span> Cliente soddisfatto</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Offri una esperienza moderna e
                                coinvolgente che renderà i tuoi clienti entusiasti e li farà tornare.</p>
                        </div>

                        <div class="">

                            <h1 class="text-xl font-semibold pt-6"><span class="text-5xl">4<span
                                        class="text-purple-500">.</span></span> Organizzazione</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Tutti gli ordini sono digitali, facili
                                da trovare, organizzati per data o cliente.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <img src="{{ asset('sito/images/male-tailor.webp') }}" class="max-h-[650px] h-auto rounded-xl mx-auto"
                        alt="feature-image">
                </div>

            </div>
        </div>
    </section>
    <!-- About End -->

    <section class="relative py-20 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="pb-10 lg:pb-0 flex flex-col items-center justify-center">
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-white text-center">Tecnologia semplice,
                    supporto reale</h2>
                <p class="text-base font-normal max-w-xl text-center mx-auto text-white mt-6">Realizzato con tecnologie
                    moderne, pensato per funzionare su tutti i dispositivi. E se hai bisogno di aiuto, ci siamo noi.</p>
                <div class="flex flex-wrap items-center justify-center mt-9 text-center gap-3">

                    <a href="/fabric/{{$firstTessuto->slug }}"
                        class="focus:outline-none text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-900 font-medium rounded-lg text-base px-5 py-2 transition-all duration-300 cursor-pointer">Prova
                        il Configuratore</a>
                    <a href="#contact"
                        class="focus:outline-none py-2 px-5 text-white rounded-lg border border-white text-base hover:border-white hover:bg-slate-800 hover:text-purple-500 transition-all duration-300 cursor-pointer">Contattaci</a>
                </div>
            </div>
        </div>
    </section>



    <!-- Pricing Start -->
    <section id="pricing" class="py-20">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <div>
                    <span
                        class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950">Pricing</span>
                </div>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Prezzi Chiari.<br />Nessun costo
                    nascosto.<br />Nessuna sorpresa.</h2>
            </div>





            <div class="grid md:grid-cols-3 gap-8 mt-18">


                <!-- Starter Plan -->
                <div class="bg-white rounded-2xl p-8  flex flex-col h-full shadow-xl">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Starter</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">€2.900<span class="text-gray-600">*</span>
                        </div>
                        <p class="text-gray-600">Licenza a vita.<br />Niente abbonamenti.</p>
                    </div>
                    <div class="mb-8 flex-1">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Configuratore Shirtly per camicie</strong></span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Colori personalizzati</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Il tuo logo</span>
                        </div>

                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Aggiornamenti e manutenzione inclusi per 12 mesi</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Inserimento di 30 tessuti a scelta</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Pagamento personalizzato</span>
                        </div>
                    </div>
                    <a href="#contact"
                        class="w-full bg-purple-500 hover:bg-purple-600 text-white py-3 rounded-lg font-semibold transition-colors text-center">
                        Contattaci
                    </a>
                </div>

                <!-- Professional Plan -->
                <div
                    class="bg-white rounded-2xl p-8 border-2 border-purple-500 relative flex flex-col h-full shadow-xl">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-purple-500 text-white px-4 py-1 rounded-full text-sm font-medium">Offerta
                            Migliore</span>
                    </div>
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Professional</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">€4.900<span class="text-gray-600">*</span>
                        </div>
                        <p class="text-gray-600">Licenza a vita.<br />Niente abbonamenti.</p>
                    </div>
                    <div class="mb-8 flex-1">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Configuratore Shirtly per camicie</strong></span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Colori personalizzati</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Il tuo logo</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>E-commerce integrato per accessori sartoriali</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Aggiornamenti e manutenzione inclusi per 12 mesi</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Inserimento di 100 tessuti a scelta</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Pagamento personalizzato</span>
                        </div>

                    </div>
                    <a href="#contact"
                        class="w-full bg-purple-500 hover:bg-purple-600 text-white py-3 rounded-lg font-semibold transition-colors text-center">
                        Contattaci
                    </a>
                </div>

                <!-- Agency Plan -->
                <div class="bg-white rounded-2xl p-8  flex flex-col h-full shadow-xl">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                        <div class="text-4xl font-bold text-gray-900 mb-2">€6.900<span class="text-gray-600">*</span>
                        </div>
                        <p class="text-gray-600">Licenza a vita.<br />Niente abbonamenti.</p>
                    </div>
                    <div class="mb-8 flex-1">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 min-w-[1.25rem] text-purple-500 mr-3" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Configuratore Shirtly per camicie e per un altro capo a scelta tra camicia da
                                    donna, giacca
                                    uomo o t-shirt</strong></span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Colori personalizzati</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Il tuo logo</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>E-commerce integrato per accessori sartoriali</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Aggiornamenti e manutenzione inclusi per 12 mesi</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Inserimento di 200 tessuti a scelta</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Pagamento personalizzato</span>
                        </div>


                    </div>
                    <a href="#contact"
                        class="w-full bg-purple-500 hover:bg-purple-600 text-white py-3 rounded-lg font-semibold transition-colors text-center">
                        Contattaci
                    </a>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-600 mb-4"><span class="text-gray-600">*</span>I prezzi indicati non includono l’IVA.
                    Qualsiasi modifica sarà oggetto di accordo separato.<br />I servizi di aggiornamento e assistenza
                    sono inclusi per il primo anno. Dal secondo anno si applica un costo di 390 €/anno.</p>
            </div>
        </div>
        </div>
    </section>
    <!-- Pricing End-->

    <!-- Faqs Start -->
    <section id="faq" class="py-20 bg-gradient-to-r from-slate-200 via-slate-100 to-slate-200">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <div>
                        <span
                            class="text-sm text-purple-500 uppercase font-medium tracking-wider text-default-950 mb-6">FAQ</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Domande Frequenti</h2>
                </div>

                <div class="mt-14 bg-white rounded-xl p-6">
                    <div class="grid md:grid-cols-2 gap-6">

                        <!-- FAQ 1 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Cos'è Shirtly e a chi si rivolge?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Shirtly è un configuratore 3D per
                                        camicie su
                                        misura, progettato per digitalizzare e ottimizzare il processo di creazione e
                                        gestione degli ordini per sarti e aziende del settore. Si rivolge sia alle
                                        sartorie
                                        storiche che alle nuove realtà imprenditoriali che desiderano modernizzare la
                                        loro
                                        attività e migliorare l'esperienza del cliente.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Quali sono i principali vantaggi per le sartorie che adottano Shirtly?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Per le sartorie, Shirtly offre numerosi
                                        vantaggi: rende il lavoro più preciso, veloce e redditizio riducendo gli errori
                                        di
                                        produzione e il tempo dedicato alla burocrazia degli ordini. È intuitivo da
                                        usare,
                                        completamente personalizzabile nella gestione dei dettagli offerti e migliora la
                                        soddisfazione del cliente offrendo un'esperienza moderna e coinvolgente.
                                        Inoltre,
                                        organizza tutti gli ordini digitalmente per una facile consultazione.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Posso inserire i tessuti in autonomia?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Sì, con Shirtly hai pieno controllo
                                        sulla
                                        gestione dei tuoi tessuti.
                                        Grazie a un pannello di controllo semplice e intuitivo, pensato proprio per le
                                        sartorie, puoi inserire nuovi tessuti, modificarne i dettagli e organizzare la
                                        tua
                                        collezione come preferisci, in completa autonomia. In più, a seconda del piano
                                        scelto, Shirtly include l’inserimento iniziale di un numero di tessuti forniti
                                        da
                                        te, già incluso nel prezzo. In ogni momento, potrai aggiornare o ampliare la tua
                                        selezione in modo facile e veloce.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Il tema del configuratore si può personalizzare?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Si, lo personalizziamo noi per te prima
                                        della consegna!
                                        Quando scegli Shirtly, il configuratore ti viene fornito già adattato al tuo
                                        brand,
                                        in base alle indicazioni che ci fornisci. Le personalizzazioni incluse in tutti
                                        i
                                        piani (Starter, Professional ed Enterprise) comprendono l'utilizzo della palette
                                        che
                                        meglio rappresenta la tua sartoria e inseriamo il tuo logo all'interno del
                                        configuratore per rafforzare la tua identità visiva. Il risultato è
                                        un'interfaccia
                                        elegante per i tuoi clienti, perfettamente coordinata con la tua immagine.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Posso vendere anche accessori sartoriali, come gemelli o polsini sostitutivi?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Si, a partire dal piano Professional,
                                        Shirtly ti permette di aggiungere e vendere accessori sartoriali direttamente
                                        dal configuratore. Potrai inserire prodotti come gemelli, polsini sostitutivi,
                                        colli extra e altri accessori opzionali, offrendo ai tuoi clienti una esperienza
                                        d'acquisto completa e su misura. Gestisci tutto comodamente dal pannello di
                                        controllo, con immagini, descrizioni e prezzi personalizzabili.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="divide-y divide-gray-100">
                            <div class="relative">
                                <h2 class="text-base px-5 py-4 w-full font-semibold text-lg">
                                    Posso configurare un altro capo di abbigliamento oltre alla camicia da uomo?
                                </h2>
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">Sì, con il piano Enterprise puoi
                                        aggiungere un secondo capo configurabile in 3D, scegliendo tra Camicia da donna,
                                        Giacca da uomo o T-shirt. Questa opzione ti permette di ampliare la tua offerta
                                        e offrire ai clienti una esperienza di personalizzazione completa anche su altri
                                        capi. Inoltre, è possibile aggiungere altri capi su richiesta in un secondo
                                        momento, per crescere insieme al tuo brand e alle esigenze della tua sartoria.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Faqs End -->


    <!-- Testimonial Start -->
    <section id="testimonial" class="py-20">
        <div class="w-full max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <span
                        class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950">Partner</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">I nostri Partner</h2>
                </div>
            </div>

            <div class="mt-14 items-center border border-dotted border-purple-500 rounded-lg p-8 bg-white p-10">
                <div class="md:columns-2 gap-8 text-justify text-gray-800">
                    <p
                        class="first-letter:text-6xl first-letter:font-bold first-letter:text-purple-500 first-letter:mr-2 first-letter:float-left">
                        Shirtly è un progetto nato in sinergia con esperti
                        professionisti
                        del settore, per rispondere con completezza ed efficacia ad esigenze concrete. Sartorie storiche
                        e
                        nuove
                        dinamiche realtà imprenditoriali si avvalgono di Shirtly per potenziare e consolidare le loro
                        attività.
                    </p>
                </div>

                <blockquote>
                    <p class="text-2xl font-medium text-gray-900"></p>
                </blockquote>


                <div class="flex items-center justify-center divide-x-2 rtl:divide-x-reverse divide-gray-300 mt-8">
                    <cite class="pe-3 font-medium text-gray-900">Pietro Turrisi</cite>
                    <cite class="ps-3 text-gray-600">CEO Sartoria Turrisi</cite>
                </div>
            </div>
            <div
                class="grid md:grid-cols-5 grid-cols-3 justify-center items-center gap-8 mt-14 max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

                <img src="{{ asset('sito/images/partners/sartorie.webp') }}" alt="Partner 1"
                    class="h-auto w-48 grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition">
                {{-- Logo Partner 2 --}}
                <img src="{{ asset('sito/images/partners/turrisi.webp') }}" alt="Partner 2"
                    class="h-auto w-48 grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition">
                {{-- Logo Partner 3 --}}
                <img src="{{ asset('sito/images/partners/sumisura.webp') }}" alt="Partner 3"
                    class="h-auto w-48 grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition">
                {{-- Logo Partner 4 --}}
                <img src="{{ asset('sito/images/partners/midena.webp') }}" alt="Partner 4"
                    class="h-auto w-48 grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition">
                {{-- Logo Partner 5 --}}
                <img src="{{ asset('sito/images/partners/gransarto.webp') }}" alt="Partner 5"
                    class="h-auto w-48 grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition col-span-2 md:col-span-1 lg:col-span-1">

            </div>

        </div>

    </section>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <section id="contact" class="py-20 bg-gradient-to-r from-slate-200 via-slate-100 to-slate-200">
        <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-6 items-center">
                <div>
                    <div>
                        <span
                            class="text-sm text-purple-500 uppercase font-semibold tracking-wider text-default-950 mb-6">Contattaci</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Hai bisogno di informazioni?<br /><span
                            class="text-purple-500">Siamo
                            qui per te.</span></h2>



                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <x-heroicon-o-envelope class="h-7 text-purple-500" />
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">info@digitall.uno</h5>
                            <a href="#" class="text-xs text-purple-500 font-bold uppercase">Scrivici</a>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center">
                            <x-heroicon-o-phone class="h-7 text-purple-500" />
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">(+39) 393 253 7526</h5>
                            <a href="#" class="text-xs text-purple-500 font-bold uppercase">Chiamaci</a>
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
                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                        name="name" id="name" required placeholder="Nome e cognome...">
                                </div>

                                <div>
                                    <label for="company"
                                        class="block text-sm/normal font-semibold text-black mb-2">Azienda</label>
                                    <input type="text"
                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                        name="company" id="company" required placeholder="La tua azienda...">
                                </div>

                                <div>
                                    <label for="email"
                                        class="block text-sm/normal font-semibold text-black mb-2">Email</label>
                                    <input type="email"
                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                        name="email" id="email" required placeholder="La tua email...">
                                </div>

                                <div>
                                    <label for="phone"
                                        class="block text-sm/normal font-semibold text-black mb-2">Telefono</label>
                                    <input type="text"
                                        class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                        name="phone" id="phone" required placeholder="Il tuo telefono...">
                                </div>

                                <div class="sm:col-span-2">
                                    <div class="mb-4">
                                        <label for="message"
                                            class="block text-sm/normal font-semibold text-black mb-2">Messaggio</label>
                                        <textarea
                                            class="block w-full text-sm rounded-md py-3 px-4 border border-gray-200 focus:border-purple-500 focus:ring-transparent"
                                            id="message" rows="4" name="message" placeholder="Scrivi un messaggio..."
                                            required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit"
                                    class="ocus:outline-none text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-900 font-medium rounded-lg text-base px-5 py-2 transition-all duration-300 cursor-pointer">Invia
                                    il messaggio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.sito.footer')
    <!-- Contact End -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const nav = document.getElementById('navbar');
            const logoWhite = document.getElementById('logo-white');
            const logoDark = document.getElementById('logo-dark');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            // Funzione scroll: cambia stile navbar
            const handleScroll = () => {
                const isScrolled = window.scrollY > 50;

                nav.classList.toggle('bg-white', isScrolled);
                nav.classList.toggle('shadow-md', isScrolled);
                nav.classList.toggle('lg:bg-transparent', !isScrolled);

                logoWhite.classList.toggle('hidden', isScrolled);
                logoDark.classList.toggle('hidden', !isScrolled);

                navLinks.forEach(link => {
                    if (link.classList.contains('text-purple-500')) return;
                    // Rimuovi tutti i colori
                    link.classList.remove('text-white', 'text-gray-900', 'text-purple-600');
                    // Applica solo quello corretto
                    if (isScrolled) {
                        link.classList.add('text-gray-900');
                    } else {
                        link.classList.add('text-white');
                    }
                });
            };

            window.addEventListener('scroll', handleScroll);
            handleScroll(); // Per caricare lo stato corretto se l'utente ricarica scrollato

            // Intersection Observer per link attivi
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute('id');
                    const navLink = document.querySelector(`nav a[href="#${id}"]`);

                    if (entry.isIntersecting) {
                        navLinks.forEach(link => {
                            // Rimuovi classi colore e attive da tutti
                            link.classList.remove('text-purple-500');

                            // Riassegna colore base a tutti
                            if (window.scrollY > 50) {
                                link.classList.remove('text-white');
                                link.classList.add('text-gray-900');
                            } else {
                                link.classList.remove('text-gray-900');
                                link.classList.add('text-white');
                            }
                        });

                        // Colora solo il link attivo
                        navLink?.classList.remove('text-white', 'text-gray-900');
                        navLink?.classList.add('text-purple-500');
                    }
                });
            }, {
                rootMargin: '-20% 0px -80% 0px'
            });

            // Observe all sections
            document.querySelectorAll('section[id], div[id]').forEach((section) => {
                observer.observe(section);
            });


            // Smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth' });

                        // Aggiungi classe attiva subito
                        navLinks.forEach(link => {
                            link.classList.remove('text-purple-500', 'font-semibold');
                        });
                        this.classList.add('text-purple-500', 'font-semibold');
                    }
                });
            });

        });
    </script>

</x-sito.main-layout>