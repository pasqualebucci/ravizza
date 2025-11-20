<x-sito.main-layout>
    <x-slot:title>
        La nostra storia - Ravizza Lab
        </x-slot>

        <section class="relative pt-20 bg-[#fff9ea]">
            <div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 items-center justify-center">



                    <div class="text-sm max-w-3xl mx-auto text-center">
                        @include('components.sito.nav')

                    </div>

                    

                    <div
                        class="max-w-screen-lg mx-auto prose prose-lg mt-12 md:columns-2 gap-8 text-justify text-gray-800">
                        <div class="mb-12 flex justify-center">
                        <img class="aspect-3/2 object-cover rounded-xl" src={{ asset('sito/images/ravizza-lab.jpg') }} />
                    </div>
                        
                        <p>Ravizza dal 1871, marchio di lunga tradizione sartoriale, da via Hoepli è ora presso il laboratorio
artigianale Fossati che confeziona le camicie su misura.</p>
                        <br />
                        <p>La storia della Fossati Camicie Milano, ha inizio nel 1897 quando il sig. Ciceri fondò la camiceria
artigianale specializzata nella confezione delle "camicie da società" di alto livello.</p>
                        <br />
                        <p>Allora le camicie da frack-tight-smoking avevano un uso quotidiano nella vita degli uomini eleganti.</p>
                        <br />
                        <p>In 30 anni di attività la Fossati Camicie ha sviluppato la capacità di affiancare alcune linee dei marchi più prestigiosi sia per la prototipia sia per la produzione di progetti particolari.</p>
                        <br />
                        <p>Sono state introdotte tecnologie come Cad e taglio automatico a foglio singolo, per migliorare
ulteriormente la qualità del prodotto finito e per garantire nel tempo le caratteristiche di confezione.</p>
                        <br />
                        <p>È stata ampliata la gamma dei prodotti che oggi, oltre alla camiceria elegante, classica o sportiva, alla
linea di pigiameria e vestaglieria e al donna presenta la linea T-shirts e Polo, declinata in diversi modelli e
confezionata con i jersey e i fili di Scozia delle migliori qualità.</p>
                        <br />
                        <p>I clienti "su misura" trovano in sede l'eccellenza nella qualità dei materiali, nelle lavorazioni e nei dettagli
che donano ai capi confezionati quella unicità di stile non riscontrabile nei capi industriali.</p>
                        <br />
                        <p>Questo metodo di "cura personalizzata" del cliente crea un rapporto che si mantiene nel tempo e crea
reciproca soddisfazione e fiducia.</p>
                        
                    </div>
                </div>

                @include('components.sito.footer')

            </div>
        </section>


</x-sito.main-layout>