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
                        <p>REALIZZIAMO CAMICIE DAL 1897</p>
                        <br />
                        <p>La storia della Fossati Camicie Milano, ora ENNEVI SRL, ha inizio nel 1897 quando il sig.
                            Ciceri fondò la camiceria artigianale specializzata nella confezione delle "camicie da
                            società" di alto livello.</p>
                        <br />
                        <p>Allora le camicie da frack-tight-smoking avevano un uso quotidiano nella vita degli uomini
                            eleganti.</p>
                        <br />
                        <p>L'azienda crebbe e fu acquisita dalla fam.Baracco che la portò a diventare una "società
                            anonima" con più di 60 dipendenti fino alla seconda guerra mondiale. La fabbrica, situata in
                            corso Sempione a Milano, subì un bombardamento ma si rimise al lavoro in una nuova sede, in
                            Via Lomazzo dove produceva tutto ciò che rientrava nella definizione di "biancheria da
                            uomo": camicie da giorno e da sera -pigiami e vestaglie-boxer-fazzoletti-pochettes e
                            cravatte.</p>
                        <br />
                        <p>Luigi Fossati la rappresentava in Italia e negli anni 50 fu affiancato dal figlio Leopoldo
                            che rilevò l'attività alla fine del decennio.</p>
                        <br />
                        <p>Si aprì ai mercati esteri dagli anni 70, a partire dal Giappone. Poi Europa, Stati Uniti,
                            Paesi Arabi e Africani arrivando, negli anni 80, a produrre il 76% per l'esportazione.</p>
                        <br />
                        <p>In questi anni entrarono nella compagine aziendale i figli che mantennero comunque la
                            tradizionale confezione delle camicie su misura e delle camicie da società, con processi
                            produttivi come le plissettature a mano o l'inamidatura con amido di riso, che
                            rappresentavano un indiscusso biglietto da visita nel mondo dei negozi di alta gamma.</p>
                        <br />
                        <p>Proprio per queste caratteristiche alcuni clienti di punta mostrarono interesse
                            all'acquisizione della Ciceri e Fossati cedette l'azienda a un marchio che riteneva capace
                            di valorizzare il prodotto. "Brioni" era una firma di assoluto prestigio e forza e lavorava
                            in tutti i negozi dove Ciceri era già presente.</p>
                        <br />
                        <p>Per questo fu scelto come partner perfetto per consolidare la linea e il prodotto.</p>
                        <br />
                        <p>Silvia Fossati, che in Ciceri seguiva soprattutto la produzione e la vendita dei prodotti di
                            punta e l'MTM, creò a quel punto la Fossati Camicie, continuando a livello artigianale la
                            tradizione famigliare.</p>
                        <br />
                        <p>In 30 anni di attività la Fossati Camicie ha sviluppato la capacità di affiancare alcune
                            linee dei marchi più prestigiosi sia per la prototipia sia per la produzione di progetti
                            particolari.</p>
                        <br />
                        <p>Sono state introdotte tecnologie come Cad e taglio automatico a foglio singolo, per
                            migliorare ulteriormente la qualità del prodotto finito e per garantire nel tempo le
                            caratteristiche di confezione.</p>
                        <br />
                        <p>È stata ampliata la gamma dei prodotti che oggi, oltre alla camiceria elegante, classica o
                            sportiva, alla linea di pigiameria e vestaglieria e al donna presenta la linea T-shirts e
                            Polo, declinata in diversi modelli e confezionata con i jersey e i fili di Scozia delle
                            migliori qualità.</p>
                        <br />
                        <p>I clienti "su misura" trovano in sede l'eccellenza nella qualità dei materiali, nelle
                            lavorazioni e nei dettagli che donano ai capi confezionati quella unicità di stile non
                            riscontrabile nei capi industriali.</p>
                        <br />
                        <p>Questo metodo di "cura personalizzata" del cliente crea un rapporto che si mantiene nel tempo
                            e crea reciproca soddisfazione e fiducia.</p>
                    </div>
                </div>

                @include('components.sito.footer')

            </div>
        </section>


</x-sito.main-layout>