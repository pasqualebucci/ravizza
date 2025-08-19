<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Documentazione - Shirtly</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon/favicon.png') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-slate-900 text-gray-300">
    <div class="flex flex-col md:flex-row">
        <div class="md:fixed md:inset-y-0 md:left-0 md:w-72 bg-gray-900 border-b md:border-b-0 md:border-r border-gray-800 overflow-y-auto" x-data="{ open: false }">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <a href="/" class="flex items-center space-x-1">
                        <img class="block w-auto h-7 " src="{{ asset('images/logo/shirtly_white.svg') }}" alt="logo">
                        <span class="text-xl font-semibold text-purple-500"><i>docs</i></span>
                    </a>
                    <button id="hamburger" class="text-white focus:outline-none md:hidden" x-on:click="open = ! open">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <nav class=" space-y-4">
                    <div :class="{'hidden md:block': !open, 'block': open}" class="mt-8 space-y-2">
                        <a href="#introduzione" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Introduzione</a>
                        <a href="#tessuti" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Tessuti</a>
                        <a href="#caratteristiche" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Caratteristiche dei tessuti</a>
                        <a href="#personalizzazioni" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Personalizzazioni</a>
                        <a href="#ordini" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Ordini</a>
                        <a href="#utenti" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Utenti</a>
                        <a href="#settings" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Settings</a>
                        <a href="#specifiche" class="block px-3 py-2 text-sm rounded-lg hover:bg-gray-800 hover:text-purple-400 transition-colors">Specifiche tecniche</a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="w-full md:ml-72">
            <main class="max-w-4xl mx-auto px-4 py-8 md:px-8">
                <article class="prose prose-invert max-w-none mt-20">
                    <div id="introduzione">

                        <h2 id="introduzione" class="text-4xl font-bold text-white mb-4">Introduzione</h2>

                        <p class="mb-3 text-gray-400">Benvenuto nella documentazione del backend di Shirtly, la piattaforma digitale per la gestione dei capi sartoriali su misura. Questa guida ti aiuterà a navigare e utilizzare le diverse sezioni per gestire la tua attività di camicie su misura.</p>
                    </div>
                    <div id="tessuti">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Tessuti</h2>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di definire e gestire l'elenco dei tessuti che i tuoi clienti potranno selezionare all'interno del configuratore 3D. Ogni tessuto ha diverse proprietà che ne definiscono l'aspetto, il prezzo e le caratteristiche.</p>



                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Accesso alla Sezione Tessuti</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Nel menu di navigazione laterale del backend, cerca l'icona di un pennello e l'etichetta "Tessuti". Il numero accanto indica quanti tessuti hai attualmente configurato nel sistema.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Elenco Tessuti</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">La tabella principale in questa sezione mostra un riepilogo dei tessuti esistenti. Le colonne includono:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Attivo:</strong> Indica se il tessuto è visibile e selezionabile dai clienti nel configuratore (ON) o se è nascosto (OFF). Puoi attivare/disattivare rapidamente un tessuto cliccando sull'interruttore.</li>
                            <li class="mb-1"><strong>SKU (codice_interno):</strong> Un codice interno o identificativo breve per il tessuto. Utile per la ricerca nel backend. Puoi cercare per SKU.</li>
                            <li class="mb-1"><strong>Navigazione (Immagine):</strong> Una piccola immagine quadrata (100x100px) utilizzata nel configuratore per rappresentare visivamente il tessuto nell'elenco di selezione.</li>
                            <li class="mb-1"><strong>Nome:</strong> Il nome completo del tessuto mostrato ai clienti. Puoi cercare per nome.</li>
                            <li class="mb-1"><strong>Descrizione Breve:</strong> Una breve descrizione testuale del tessuto, utile nei riepiloghi. Puoi cercare anche per descrizione breve.</li>
                            <li class="mb-1"><strong>Prezzo:</strong> Il prezzo base del tessuto, indicato con il simbolo €.</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">La tabella è ordinata di default in base alla data di creazione (il più recente per primo). Puoi modificare o eliminare i tessuti usando le azioni nella colonna finale.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Aggiungere / Modificare un Tessuto</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Cliccando su "Nuovo Tessuto" o selezionando un tessuto esistente per modificarlo, accederai al form di configurazione. Il form è diviso in sezioni:</p>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Dettagli Base e Descrizione</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione contiene i dati identificativi e descrittivi del tessuto.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Nome:</strong> Il nome completo del tessuto da mostrare nel configuratore. È obbligatorio.<br>

                            </li>
                            <li class="mb-1"><strong>Slug:</strong> Un identificativo web univoco e leggibile per il tessuto (es. "cotone-twill-blu"). Viene generato automaticamente dal Nome, ma è obbligatorio e deve essere unico.

                                <div class="bg-purple-900/30 border border-purple-500/20 rounded-lg p-4 my-6">
                                    <div class="flex items-center text-purple-400 mb-2">
                                        <span class="font-semibold">Suggerimento</span>
                                    </div>
                                    <p class="text-purple-300">Modificando il Nome, lo "Slug" viene generato automaticamente..</p>
                                </div>

                            </li>
                            <li class="mb-1"><strong>SKU (codice_interno):</strong> Un codice interno opzionale per la tua gestione. Utile per la ricerca.</li>
                            <li class="mb-1"><strong>Descrizione Breve:</strong> Una breve descrizione (obbligatoria) per il riepilogo.</li>
                            <li class="mb-1"><strong>Descrizione:</strong> Una descrizione completa del tessuto. Questo campo supporta formattazione Rich Editor (grassetto, corsivo, liste). È obbligatorio.<br>

                            </li>
                        </ul>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Prezzo</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Configura qui i dettagli economici del tessuto.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Prezzo:</strong> Il prezzo base obbligatorio del tessuto. Inserisci solo numeri; il simbolo dell'Euro (€) viene aggiunto automaticamente. Accetta valori decimali.</li>
                            <li class="mb-1"><strong>Prezzo Scontato:</strong> Un campo opzionale per indicare un prezzo scontato per il tessuto. Inserisci solo numeri decimali; il simbolo dell'Euro (€) viene aggiunto automaticamente.</li>
                        </ul>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Immagini</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Gestisci le risorse visive del tessuto.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Texture del tessuto (fabric):</strong> Carica il file immagine (obbligatorio) che rappresenta la texture del tessuto in modo che possa essere applicata al modello 3D nel configuratore. Supporta l'Image Editor per semplici modifiche. I file vengono salvati nella cartella 'fabrics'.<br>

                                <div class="bg-purple-900/30 border border-purple-500/20 rounded-lg p-4 my-6">
                                    <div class="flex items-center text-purple-400 mb-2">
                                        <span class="font-semibold">Suggerimento</span>
                                    </div>
                                    <p class="text-purple-300">Carica una texture che si possa ripetere senza interruzioni per il "Magic Texturing Engine".</p>
                                </div>

                            </li>
                            <li class="mb-1"><strong>Immagine di navigazione (image):</strong> Carica un file immagine (obbligatorio) da usare nell'elenco dei tessuti nel configuratore. Supporta l'Image Editor. I file vengono salvati nella cartella 'navigation'.

                            </li>
                        </ul>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Caratteristiche</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Associa il tessuto a diverse categorie o attributi.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Armatura (armor_id):</strong> Seleziona l'armatura del tessuto (es. Twill, Popeline, Oxford). Questo campo carica i valori da una relazione ('armature') e permette la selezione rapida (preload).</li>
                            <li class="mb-1"><strong>Materiale (material_id):</strong> Seleziona il materiale principale (es. Cotone, Lino, Seta). Questo campo carica i valori da una relazione ('materiali') e permette la selezione rapida (preload).</li>
                            <li class="mb-1"><strong>Brand (brand_id):</strong> Seleziona il brand del tessuto. Questo campo carica i valori da una relazione ('brands') e permette la selezione rapida (preload).</li>
                            <li class="mb-1"><strong>Colori (colori):</strong> Seleziona uno o più colori predominanti del tessuto. Questo campo permette selezioni multiple, carica i valori da una relazione ('colori') e permette la selezione rapida (preload).</li>
                        </ul>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Stato</h4>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Tessuto attivo (attivo):</strong> Un interruttore (Toggle) che determina se il tessuto è attivo (spento/acceso). Di default è attivo quando crei un nuovo tessuto. È obbligatorio impostare questo stato.</li>
                        </ul>

                    </div>


                    <div id="caratteristiche">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Caratteristiche dei tessuti</h2>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di gestire le liste di attributi e categorie (come Materiali, Armature, Brands e Colori) che utilizzi per descrivere e classificare i tuoi tessuti nel catalogo. Definire queste caratteristiche qui ti consente di selezionarle facilmente quando crei o modifichi un tessuto.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Tutte queste sezioni si trovano raggruppate sotto la voce "Caratteristiche" nel menu di navigazione laterale del backend, identificate da un'icona comune</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Materiali</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Qui puoi gestire l'elenco dei materiali (es. Cotone, Lino, Seta, Lana, ecc.) che puoi associare ai tuoi tessuti.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella mostra una lista dei materiali esistenti con la colonna "Nome". Puoi cercare e ordinare l'elenco per nome.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare un materiale è molto semplice e richiede solo l'inserimento del <strong>Nome</strong> del materiale (campo obbligatorio).</li>
                            <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singoli materiali direttamente dalla tabella. È disponibile anche l'eliminazione di più materiali contemporaneamente.</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Armature</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di gestire i tipi di armatura (struttura del tessuto, es. Twill, Popeline, Oxford, Piquet, ecc.) che puoi associare ai tuoi tessuti.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella mostra una lista delle armature esistenti con la colonna "Nome". Puoi cercare e ordinare l'elenco per nome.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare un'armatura è molto semplice e richiede solo l'inserimento del <strong>Nome</strong> dell'armatura (campo obbligatorio).</li>
                            <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singole armature direttamente dalla tabella. È disponibile anche l'eliminazione di più armature contemporaneamente.</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Brands</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Utilizza questa sezione per gestire l'elenco dei brand (marchi) a cui appartengono i tessuti o altri materiali che offri.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella mostra una lista dei brand esistenti con la colonna "Nome". Puoi cercare e ordinare l'elenco per nome.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare un brand richiede l'inserimento del <strong>Nome</strong> del brand (campo obbligatorio, massimo 255 caratteri).</li>
                            <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singoli brand direttamente dalla tabella. È disponibile anche l'eliminazione di più brand contemporaneamente.</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Colori</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di definire i colori che potrai associare ai tuoi tessuti per facilitare la ricerca e il filtraggio nel configuratore.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella mostra una lista dei colori esistenti con la colonna "Nome". Puoi cercare e ordinare l'elenco per nome.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare un colore richiede:
                                <ul>
                                    <li class="mb-0.5"><strong>Nome:</strong> Il nome del colore (es. "Rosso", "Blu Navy"). Obbligatorio.</li>
                                    <li class="mb-0.5"><strong>Codice:</strong> Il codice esadecimale del colore (es. #FF0000 per il rosso). Puoi usare un selettore di colore grafico (Color Picker) per sceglierlo facilmente. Obbligatorio.</li>
                                </ul>
                            </li>
                            <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singoli colori direttamente dalla tabella. È disponibile anche l'eliminazione di più colori contemporaneamente.</li>

                        </ul>
                    </div>

                    <div id="personalizzazioni">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Personalizzazioni delle camicie</h2>

                        <p class="leading-relaxed mb-4 text-gray-400">Questa è la sezione dove gestisci tutte le opzioni specifiche che un cliente può personalizzare sulla propria camicia su misura: colletti, polsini, bottoni, ecc. Ogni tipo di personalizzazione ha una sua area dedicata nel backend, tutte raggruppate sotto la voce "Personalizzazioni" nel menu di navigazione laterale.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Sono ordinate nel menu per facilità d'uso:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1">Colletti</li>
                            <li class="mb-1">Maniche</li>
                            <li class="mb-1">Polsini</li>
                            <li class="mb-1">Fronte</li>
                            <li class="mb-1">Dietro</li>
                            <li class="mb-1">Taschini</li>
                            <li class="mb-1">Bottoni</li>
                            <li class="mb-1">Asole</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">Tutte queste sezioni hanno una struttura di base simile per l'aggiunta e la gestione delle opzioni.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Colletti</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Gestisci i diversi stili di colletto disponibili per le tue camicie.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca i colletti con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, Descrizione, Prezzo (€). Puoi cercare per Nome o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>

                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Maniche</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione gestisce i diversi stili di manica disponibili (es. manica lunga, manica corta).</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elencherà le opzioni per le maniche.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form ti permetterà di definire le proprietà di ogni opzione manica.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>
                        </ul>


                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Polsini</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Definisci i diversi stili di polsino che i clienti possono scegliere.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca i polsini con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, Descrizione, Prezzo (€). Puoi cercare per Nome o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Fronte</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Gestisci le opzioni relative al fronte della camicia (es. tipo di abbottonatura).</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca le opzioni per il fronte con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, Descrizione, Prezzo (€). Puoi cercare per Nome o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Dietro</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Configura le opzioni per il dietro della camicia (es. con/senza pieghe, con/senza cannoncino).</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca le opzioni per il dietro con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, Descrizione, Prezzo (€). Puoi cercare per Nome o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Taschini</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Gestisci i tipi di taschino disponibili (es. senza taschino, con taschino applicato).</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca le opzioni per i taschini con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, Descrizione, Prezzo (€). Puoi cercare per Nome o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Bottoni</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Configura i diversi materiali o colori di bottoni disponibili.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca i bottoni con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, <strong>Colore</strong>, Descrizione, Prezzo (€). Puoi cercare per Nome, Colore o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria), un selettore <strong>Colore</strong> (obbligatorio) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Asole</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Gestisci le opzioni relative al colore o stile delle asole.</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Gestione:</strong> La tabella elenca le opzioni per le asole con le colonne: Attivo (interruttore), Immagine (Navigazione), Nome, <strong>Colore</strong>, Descrizione, Prezzo (€). Puoi cercare per Nome, Colore o Descrizione.</li>
                            <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form richiede: Nome (obbligatorio), Descrizione (opzionale), un blocco Prezzo con Prezzo (obbligatorio, €) e Prezzo Scontato (opzionale, €), un'Immagine di navigazione (obbligatoria), un selettore <strong>Colore</strong> (obbligatorio) e l'interruttore Attivo (obbligatorio, preimpostato su ON).</li>

                        </ul>


                        <div class="bg-purple-900/30 border border-purple-500/20 rounded-lg p-4 my-6">
                            <div class="flex items-center text-purple-400 mb-2">
                                <span class="font-semibold">Suggerimento</span>
                            </div>
                            <p class="text-purple-300">Per tutte queste sezioni di personalizzazione, puoi aggiungere nuove opzioni cliccando sul tasto "Nuovo [Nome Personalizzazione]" nella rispettiva pagina, e modificare o eliminare le opzioni esistenti direttamente dalla tabella.</p>
                        </div>




                        <h3 id="iniziali" class="text-xl font-semibold mt-6 mb-3 text-white">Iniziali / Monogrammi</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di gestire le opzioni specifiche che i clienti possono scegliere per personalizzare le camicie con le iniziali ricamate: i colori del ricamo, le posizioni dove possono essere applicate e gli stili dei caratteri disponibili. Queste opzioni sono raggruppate sotto la voce "Iniziali" nel menu di navigazione laterale.</p>
                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Colori Iniziali</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Qui gestisci i colori del filo che i clienti possono selezionare per il ricamo delle iniziali.</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Gestione:</strong> La tabella elenca i colori disponibili con le colonne "Nome" e "Codice". Puoi cercare per nome o codice colore. Vengono mostrate anche le date di creazione e ultimo aggiornamento (nascoste di default, puoi renderle visibili).</li>
                                <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare un colore iniziale richiede:
                                    <ul>
                                        <li class="mb-0.5"><strong>Nome:</strong> Il nome del colore (es. "Blu Ricamo", "Oro"). Obbligatorio.</li>
                                        <li class="mb-0.5"><strong>Codice:</strong> Il codice esadecimale del colore del filo. Puoi usare un selettore di colore grafico per sceglierlo. Obbligatorio.</li>
                                    </ul>
                                </li>
                                <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singoli colori direttamente dalla tabella. È disponibile anche l'eliminazione di più colori contemporaneamente.</li>

                            </ul>
                            <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Posizioni Iniziali</h3>
                                <p class="leading-relaxed mb-4 text-gray-400">Definisci qui le posizioni sulla camicia dove il cliente può scegliere di ricamare le iniziali (es. Polsino Sinistro, Fronte Sinistro, ecc.).</p>
                                <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                    <li class="mb-1"><strong>Gestione:</strong> La tabella elenca le posizioni disponibili con la colonna "Nome". Puoi cercare per nome. Vengono mostrate anche le date di creazione e ultimo aggiornamento (nascoste di default).</li>
                                    <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare una posizione richiede solo l'inserimento del <strong>Nome</strong> della posizione (campo obbligatorio, es. "Polsino sinistro (indossato)").</li>
                                    <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singole posizioni direttamente dalla tabella. È disponibile anche l'eliminazione di più posizioni contemporaneamente.</li>

                                </ul>
                                <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Stili Iniziali</h3>
                                    <p class="leading-relaxed mb-4 text-gray-400">Gestisci i diversi stili di carattere (font) disponibili per il ricamo delle iniziali.</p>
                                    <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                        <li class="mb-1"><strong>Gestione:</strong> La tabella elenca gli stili disponibili con le colonne "Nome" e "Font Family". Puoi cercare per nome o Font Family. Vengono mostrate anche le date di creazione e ultimo aggiornamento (nascoste di default).</li>
                                        <li class="mb-1"><strong>Aggiungere/Modificare:</strong> Il form per aggiungere o modificare uno stile richiede:
                                            <ul>
                                                <li class="mb-0.5"><strong>Nome:</strong> Un nome descrittivo per lo stile (es. "Corsivo Elegante", "Stampatello"). Obbligatorio.</li>
                                                <li class="mb-0.5"><strong>Font Family:</strong> Il nome tecnico del font utilizzato per questo stile. Obbligatorio (massimo 255 caratteri).</li>
                                            </ul>
                                        </li>
                                        <li class="mb-1"><strong>Azioni:</strong> Puoi modificare o eliminare singoli stili direttamente dalla tabella. È disponibile anche l'eliminazione di più stili contemporaneamente.</li>

                                    </ul>

                                    <div class="bg-purple-900/30 border border-purple-500/20 rounded-lg p-4 my-6">
                                        <div class="flex items-center text-purple-400 mb-2">
                                            <span class="font-semibold">Suggerimento</span>
                                        </div>
                                        <p class="text-purple-300">I prezzi per il servizio di iniziali (se applicato per lettera o fisso) si configurano nella sezione <strong>Settings > Iniziali</strong>, come descritto più avanti. Le opzioni gestite qui definiscono solo cosa il cliente può scegliere in termini di colore, posizione e stile del carattere.</p>
                                    </div>




                    </div>

                    <div id="ordini">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Ordini</h2>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa è la sezione principale per gestire gli ordini ricevuti. Ogni ordine completato sul tuo sito web tramite Snipcart viene automaticamente sincronizzato e reso visibile qui. Puoi accedervi dal menu di navigazione laterale cercando l'icona del sacchetto della spesa e l'etichetta "Ordini". Il numero accanto all'etichetta nel menu indica quanti ordini totali sono presenti nel sistema.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Elenco Ordini</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">La tabella principale nella sezione Ordini ti offre una panoramica di tutti gli ordini. Per ogni ordine vengono mostrate le seguenti colonne:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>ID Ordine Snipcart:</strong> L'identificativo univoco dell'ordine proveniente da Snipcart. Puoi cercare gli ordini usando questo ID.</li>
                            <li class="mb-1"><strong>Email:</strong> L'email del cliente che ha effettuato l'ordine. Puoi cercare gli ordini per email del cliente.</li>
                            <li class="mb-1"><strong>Totale:</strong> L'importo totale dell'ordine, visualizzato con il prefisso €.</li>
                            <li class="mb-1"><strong>Status:</strong> Lo stato attuale dell'ordine (es. 'Processed', 'Completed'). Viene visualizzato come un 'badge' colorato per una rapida identificazione.</li>
                            <li class="mb-1"><strong>Data Ordine (created_at):</strong> La data e l'ora in cui l'ordine è stato creato. Puoi ordinare la tabella per data. Questa colonna è nascosta di default nella visualizzazione iniziale, ma puoi attivarla.</li>
                            <li class="mb-1"><strong>Ultimo Aggiornamento (updated_at):</strong> La data e l'ora dell'ultimo aggiornamento dell'ordine. Puoi ordinare la tabella per questa data. Anche questa colonna è nascosta di default e puoi attivarla.</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">Nella colonna finale, per ogni ordine, troverai le <strong>Azioni</strong> disponibili. Al momento, l'unica azione diretta qui è "Visualizza", che ti porta alla schermata dei dettagli completi dell'ordine.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Puoi anche selezionare più ordini (Bulk Actions) per eseguire azioni di gruppo, come l'eliminazione.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Dettagli Ordine</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Cliccando su "Visualizza" per un ordine specifico, accederai a una schermata completa che presenta tutti i dati dell'ordine in modo dettagliato. La maggior parte dei campi in questa schermata sono di sola lettura, poiché riflettono i dati sincronizzati da Snipcart al momento dell'acquisto.</p>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Riepilogo e Dati Cliente</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Nella parte superiore della schermata, trovi un riepilogo generale dell'ordine:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Ordine ID:</strong> L'ID univoco dell'ordine da Snipcart (non modificabile).</li>
                            <li class="mb-1"><strong>Status:</strong> Lo stato dell'ordine da Snipcart (non modificabile qui).</li>
                            <li class="mb-1"><strong>Email:</strong> L'email del cliente (non modificabile).</li>
                            <li class="mb-1"><strong>Data Ordine:</strong> La data in cui l'ordine è stato effettuato (non modificabile).</li>
                            <li class="mb-1"><strong>Totale Ordine:</strong> Il totale pagato (non modificabile).</li>
                        </ul>

                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Indirizzi</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Troverai due sezioni dedicate agli indirizzi, entrambe collapsible (clicca sull'intestazione per espanderle o comprimerle) per una migliore organizzazione:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Indirizzo di fatturazione:</strong> Contiene i dettagli dell'indirizzo fornito per la fattura (Nome, Indirizzo, Indirizzo (continua), Città, Paese, CAP). Questi dati vengono estratti dai dati originali di Snipcart e visualizzati in campi separati.</li>
                            <li class="mb-1"><strong>Indirizzo di spedizione:</strong> Contiene i dettagli dell'indirizzo dove spedire la camicia finita (Nome, Indirizzo, Indirizzo (continua), Città, Paese, CAP). Anche questi dati vengono estratti da Snipcart.</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">Questi campi indirizzo sono di sola lettura.</p>
                        <h4 class="text-lg font-semibold mt-4 mb-2 text-white">Articoli Ordinati</h4>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione è anch'essa collapsible . È qui che trovi i dettagli delle camicie specifiche che sono state configurate e acquistate.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Il contenuto di questa sezione è gestito da una visualizzazione personalizzata (definita separatamente dal codice principale del backend) e conterrà:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1">Un riepilogo per ogni camicia ordinata (Nome, Quantità, Prezzo).</li>
                            <li class="mb-1">L'elenco dettagliato di tutte le personalizzazioni scelte per quella camicia specifica (tessuto, tipo di collo, tipo di polsini, bottoni, iniziali - con testo e posizione, ecc.).</li>
                            <li class="mb-1">Le misure del cliente associate a quella camicia (sia che siano corporee o della camicia, come inserito dal cliente nel configuratore). Qui vedrai i valori numerici esatti.</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa visualizzazione personalizzata è il punto cruciale dove reperire tutte le istruzioni sartoriali per la realizzazione del capo.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Aggiornamento Manuale dello Stato</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Sebbene lo stato principale venga da Snipcart, il backend Shirtly potrebbe offrire (a seconda della configurazione) la possibilità di avere un proprio stato interno dell'ordine per tracciare il progresso nella tua sartoria (es. "In Taglio", "In Confezione", ecc.). Se questa funzionalità è presente, troverai un campo o un'azione dedicata per aggiornare lo stato interno dell'ordine.</p>
                    </div>

                    <div id="utenti">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Utenti</h2>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa sezione ti permette di visualizzare e gestire gli account degli utenti che si registrano sulla tua piattaforma Shirtly. Anche se la gestione principale dei clienti avviene tramite gli ordini (specialmente se usano checkout ospite via Snipcart), qui trovi i profili registrati e, cosa importante, un accesso diretto ai loro dati storici (ordini e misure).</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Puoi accedere a questa sezione dal menu di navigazione laterale, si trova sotto le Personalizzazioni ed è identificata dall'icona di un utente e l'etichetta "Utenti".</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Elenco Utenti</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">La tabella principale in questa sezione mostra un elenco di tutti gli utenti registrati sulla piattaforma. Le colonne includono:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Nome:</strong> Il nome dell'utente. Puoi cercare utenti per nome.</li>
                            <li class="mb-1"><strong>Email:</strong> L'indirizzo email dell'utente. Puoi cercare utenti per email.</li>
                            <li class="mb-1"><strong>Data Registrazione (created_at):</strong> La data e l'ora in cui l'utente si è registrato. Puoi ordinare la tabella per questa data. Questa colonna è nascosta di default nella visualizzazione iniziale, ma puoi attivarla.</li>
                            <li class="mb-1"><strong>Ultimo Aggiornamento (updated_at):</strong> La data e l'ora dell'ultimo aggiornamento del profilo utente. Puoi ordinare la tabella per questa data. Anche questa colonna è nascosta di default e puoi attivarla.</li>
                        </ul>
                        <p class="leading-relaxed mb-4 text-gray-400">Per ogni utente, nella colonna finale delle <strong>Azioni</strong>, troverai l'opzione "Modifica" per accedere alla sua scheda completa.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Puoi anche selezionare più utenti (Bulk Actions) per eseguire azioni di gruppo, come l'eliminazione.</p>
                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Aggiungere / Modificare un Utente</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Quando crei un nuovo utente o clicchi su "Modifica" per un utente esistente, vedrai un semplice form con i dati base dell'account:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Nome:</strong> Il nome dell'utente (obbligatorio, max 255 caratteri).</li>
                            <li class="mb-1"><strong>Email:</strong> L'indirizzo email dell'utente (obbligatorio, deve essere un formato email valido, max 255 caratteri).</li>
                            <li class="mb-1"><strong>Password:</strong> Il campo password. È obbligatorio quando crei un nuovo utente. Quando modifichi un utente esistente, puoi lasciare questo campo vuoto se non desideri cambiare la password.</li>
                        </ul>

                        <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Dati Associati al Cliente (Ordini e Misure)</h3>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa è una funzionalità molto utile. Quando sei nella schermata "Modifica Utente" (anche se i campi utente sono semplici), sotto il form principale, troverai delle sezioni aggiuntive sotto forma di schede o pannelli.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">Queste sezioni ti permettono di vedere in modo centralizzato tutti i dati collegati a questo specifico utente:</p>
                        <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                            <li class="mb-1"><strong>Misure del Cliente:</strong> Una tabella che elenca tutte le misure che questo utente ha salvato nel sistema tramite il configuratore (sia misure corporee che altri tipi di misurazione).</li>
                            <li class="mb-1"><strong>Ordini del Cliente:</strong> Una tabella che elenca tutti gli ordini che questo utente registrato ha effettuato tramite Shirtly/Snipcart. Da qui potresti avere un link rapido per visualizzare i dettagli completi di ciascun ordine (come descritto nella sezione Ordini).</li>
                        </ul>
                        <p class="leading-relaxed text-gray-400">Questa vista consolidata utente-centrica è preziosa per avere un quadro completo di un cliente abituale, vedere le sue misure e lo storico dei suoi acquisti.</p>
                    </div>

                    <div id="settings">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Settings</h2>
                        <p class="leading-relaxed mb-4 text-gray-400">Questa è la pagina centrale per configurare le impostazioni generali della tua sartoria e personalizzare l'esperienza nel configuratore per i tuoi clienti. Trovi questa sezione nel menu di navigazione laterale, identificata dall'icona di una chiave inglese e l'etichetta "Settings". È la prima voce nel menu.</p>
                        <p class="leading-relaxed mb-4 text-gray-400">La pagina "Settings" è organizzata in schede (Tabs) per raggruppare le impostazioni per aree tematiche:</p>
                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Scheda: Generale</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Qui inserisci i dati principali della tua attività. Questi potrebbero essere usati per la fatturazione, contatti o visualizzati sul tuo sito.</p>
                            <p class="leading-relaxed mb-4 text-gray-400">I campi in questa scheda sono disposti su 2 colonne:</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Azienda:</strong> Il nome della tua attività.</li>
                                <li class="mb-1"><strong>Indirizzo:</strong> L'indirizzo della tua sede principale.</li>
                                <li class="mb-1"><strong>Città:</strong> La città della sede.</li>
                                <li class="mb-1"><strong>Provincia:</strong> La provincia della sede.</li>
                                <li class="mb-1"><strong>CAP:</strong> Il codice di avviamento postale.</li>
                                <li class="mb-1"><strong>Partita IVA:</strong> Il tuo numero di Partita IVA o codice fiscale.</li>
                                <li class="mb-1"><strong>Telefono:</strong> Un numero di contatto.</li>
                                <li class="mb-1"><strong>Email:</strong> Un indirizzo email di contatto.</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Scheda: Branding</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Personalizza l'aspetto del configuratore 3D per allinearlo alla tua identità visiva.</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Logo su sfondo chiaro:</strong> Carica il file immagine del tuo logo (es. .png, .jpg) ottimizzato per essere visualizzato su sfondi chiari nel configuratore.</li>
                                <li class="mb-1"><strong>Logo su sfondo scuro:</strong> Carica il file immagine del tuo logo ottimizzato per essere visualizzato su sfondi scuri nel configuratore.</li>
                                
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Scheda: Scripts</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Se hai bisogno di integrare servizi esterni (come Google Analytics, Facebook Pixel, ecc.) che richiedono l'inserimento di codice JavaScript, puoi farlo qui.</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Header:</strong> Inserisci script che devono essere caricati nella sezione <code>&lt;head&gt;</code> della pagina del configuratore (es. codici di verifica, script di analisi).</li>
                                <li class="mb-1"><strong>Body:</strong> Inserisci script che devono essere caricati all'interno della sezione <code>&lt;body&gt;</code>.</li>
                                <li class="mb-1"><strong>Footer:</strong> Inserisci script che devono essere caricati alla fine della sezione <code>&lt;body&gt;</code>, prima della chiusura del tag.</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Scheda: Iniziali</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Configura il modello di prezzo per il servizio di personalizzazione con iniziali. I campi sono disposti su 3 colonne.</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Prezzo iniziali:</strong> Inserisci il prezzo fisso se offri il ricamo di iniziali con un costo unico, indipendentemente dal numero di lettere.</li>
                                <li class="mb-1"><strong>Prezzo iniziali per lettera:</strong> Inserisci il prezzo da applicare per ogni singola lettera ricamata.</li>
                                <li class="mb-1"><strong>Tipo prezzo iniziali:</strong> Seleziona quale dei due modelli di prezzo vuoi utilizzare ('Prezzo iniziali' per un costo fisso totale, o 'Prezzo iniziali per lettera' per un costo per ogni singola lettera).</li>
                            </ul>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold mt-6 mb-3 text-white">Salvataggio delle Impostazioni</h3>
                            <p class="leading-relaxed mb-4 text-gray-400">Dopo aver apportato qualsiasi modifica in una delle schede, è fondamentale cliccare sul bottone <strong>Salva</strong> che trovi nella parte inferiore della pagina (o nell'header, a seconda della configurazione specifica del layout Filament). Questo bottone esegue l'azione di salvataggio.</p>
                            <p class="leading-relaxed mb-4 text-gray-400">Una volta salvate le impostazioni con successo, comparirà una notifica verde con il messaggio "Salvato!" nell'angolo in alto a destra dello schermo.</p>
                        </div>
                    </div>

                    <div id="specifiche">

                        <h2 class="text-4xl font-bold mt-8 mb-4 text-white mt-12">Specifiche Tecniche</h1>

                            <p class="leading-relaxed mb-4 text-gray-400">Questo documento fornisce una panoramica tecnica dell'architettura e dei principali componenti del backend di Shirtly, il configuratore 3D per camicie su misura integrato con Snipcart.</p>



                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Architettura Generale</h2>
                            <p class="leading-relaxed mb-4 text-gray-400">L'applicazione Shirtly adotta un'architettura che separa nettamente il backend (amministrazione e gestione dati) dal frontend/configuratore (l'interfaccia utente 3D per la configurazione). La comunicazione per gli ordini avviene principalmente tramite webhook .</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Backend:</strong> Un'applicazione basata su framework per la gestione dei dati, degli ordini, degli utenti e delle impostazioni tramite un pannello di amministrazione.</li>
                                <li class="mb-1"><strong>Frontend (Configuratore 3D):</strong> Un'applicazione separata, orientata al client, che gestisce la visualizzazione 3D, l'interazione con l'utente per la personalizzazione e l'invio dei dati di configurazione e di ordine.</li>
                                <li class="mb-1"><strong>Database:</strong> Un database relazionale per la persistenza di tutti i dati gestiti dal backend.</li>
                                <li class="mb-1"><strong>Integrazione E-commerce:</strong> Basata principalmente sulla comunicazione server-to-server (webhook).</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Stack Tecnologico del Backend</h2>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Framework:</strong> Laravel (versioni compatibili con Filament v3+).</li>
                                <li class="mb-1"><strong>Pannello di Amministrazione:</strong> FilamentPHP (utilizzato per generare le interfacce di gestione dati).</li>
                                <li class="mb-1"><strong>Linguaggio:</strong> PHP (versione compatibile con Laravel/Filament, v8+).</li>
                                <li class="mb-1"><strong>Database:</strong> Qualsiasi database supportato da Laravel (es. MySQL, PostgreSQL).</li>
                                <li class="mb-1"><strong>ORM:</strong> Eloquent (integrato in Laravel).</li>
                                <li class="mb-1"><strong>Styling (Backend UI):</strong> TailwindCSS (utilizzato da Filament).</li>
                                <li class="mb-1"><strong>Linguaggi UI (Backend):</strong> Blade Templates (Laravel), Livewire (Filament).</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Stack Tecnologico del Frontend (Configuratore)</h2>

                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Tecnologia 3D:</strong> Libreria model-viewer di Google per il rendering del modello 3D della camicia.</li>
                                <li class="mb-1"><strong>Framework JS:</strong> Utilizza due framework JavaScript moderni Livewire e AlpineJs e JavaScript puro.</li>
                                <li class="mb-1"><strong>Comunicazione Backend (Configuratore):</strong> API RESTful per recuperare dati del catalogo (tessuti, opzioni, ecc.) e per inviare i dati finali di configurazione e misurazioni prima del checkout.</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Integrazione E-commerce: Snipcart</h2>
                            <p class="leading-relaxed mb-4 text-gray-400">L'integrazione con Snipcart è un punto chiave dell'applicazione:</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Checkout:</strong> Snipcart gestisce il carrello, il checkout e il processo di pagamento sul frontend. I dati degli articoli nel carrello includono la configurazione specifica della camicia e le misure.</li>
                                <li class="mb-1"><strong>Webhook:</strong> Dopo un acquisto completato, Snipcart invia i dettagli dell'ordine al backend Shirtly tramite un webhook configurato. Il backend riceve questi dati e li salva nel proprio database.</li>
                                <li class="mb-1"><strong>Sincronizzazione Dati:</strong> I dati dell'ordine (ID Snipcart, stato, totale, email, indirizzi) sono salvati nell'entità <code>Order</code> del backend. I dettagli degli articoli e le misure sono associati a questo ordine.</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Principali Moduli e Componenti del Backend</h2>
                            <p class="leading-relaxed mb-4 text-gray-400">Il backend è strutturato attorno ai concetti di Laravel e Filament:</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1"><strong>Modelli (Eloquent Models):</strong> Entità PHP che rappresentano le tabelle del database (<code>User</code>, <code>Order</code>, <code>Texture</code>, <code>Material</code>, <code>Armor</code>, <code>Brand</code>, <code>Color</code>, <code>Back</code>, <code>Buttonhole</code>, <code>Button</code>, <code>Collar</code>, <code>Cuff</code>, <code>Front</code>, <code>Pocket</code>, <code>Sleeve</code>, <code>Mcolor</code>, <code>Mposition</code>, <code>Mstyle</code>, <code>Setting</code>, e <code>Measurement</code>.</li>
                                <li class="mb-1"><strong>Filament Resources:</strong> Definizioni (come quelle analizzate) che creano automaticamente le interfacce CRUD (Create, Read, Update, Delete) nel pannello di amministrazione per i Modelli associati (es. <code>TextureResource</code> per gestire i Tessuti).</li>
                                <li class="mb-1"><strong>Filament Pages:</strong> Pagine personalizzate non direttamente legate a un singolo Modello CRUD (es. la pagina <code>Settings</code>).</li>
                                <li class="mb-1"><strong>Filament Forms & Tables:</strong> Componenti riutilizzabili utilizzati all'interno delle Resources e Pages per costruire i layout dei form (campi di input, select, upload, toggle, sezioni, tabs) e delle tabelle (colonne di testo, immagini, toggle, badge).</li>
                                <li class="mb-1"><strong>Relazioni tra Modelli:</strong> Definizione delle associazioni tra i dati (es. un Utente ha molti Ordini, un Ordine ha molti Articoli, un Articolo è associato a un Tessuto e varie Personalizzazioni, un Utente ha molte Misure). Queste relazioni sono usate anche in Filament (es. Relation Managers in <code>UserResource</code> per mostrare Ordini e Misure associate).</li>
                                <li class="mb-1"><strong>Gestione File:</strong> Implementata tramite i componenti <code>FileUpload</code> di Filament, che gestiscono l'upload e lo storage dei file (immagini, texture) in directory configurabili (es. 'fabrics', 'navigation', 'customer', 'buttons', 'collars').</li>
                                <li class="mb-1"><strong>Configurazioni Globali:</strong> Gestite tramite un singolo record nel database (Modello <code>Setting</code>) e accessibili tramite la pagina <code>Settings</code>, che utilizza un form a schede per organizzare i vari parametri (dati aziendali, configuratore, script, prezzi iniziali).</li>
                                <li class="mb-1"><strong>Internazionalizzazione (i18n):</strong> Implementata utilizzando il trait <code>Translatable</code> in diverse Resources, consentendo di gestire nomi e descrizioni in più lingue.</li>
                                <li class="mb-1"><strong>Validazione Dati:</strong> I form di Filament includono regole di validazione (es. <code>required</code>, <code>maxLength</code>, <code>unique</code>, <code>email</code>, <code>numeric</code>) per garantire l'integrità dei dati inseriti dagli utenti del backend.</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-8 mb-4 text-white">Considerazioni sul Deployment</h2>
                            <p class="leading-relaxed mb-4 text-gray-400">Il backend richiede un ambiente di hosting standard compatibile con Laravel:</p>
                            <ul class="list-disc list-inside mb-4 pl-4 text-gray-400">
                                <li class="mb-1">Server Web (es. Nginx, Apache).</li>
                                <li class="mb-1">Installazione PHP con estensioni richieste da Laravel e Filament.</li>
                                <li class="mb-1">Accesso a un database supportato.</li>
                                <li class="mb-1">Configurazione per la gestione dei file caricati.</li>
                                <li class="mb-1">Accessibilità via URL per il webhook di Snipcart.</li>
                            </ul>


                    </div>


                </article>
            </main>
        </div>
    </div>

    <script>
        // Add smooth scrolling to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const id = entry.target.getAttribute('id');
                    const navLink = document.querySelector(`nav a[href="#${id}"]`);

                    if (entry.isIntersecting) {
                        // Remove active class from all links
                        navLinks.forEach(link => link.classList.remove('text-purple-400', 'bg-gray-800'));
                        // Add active class to current link
                        navLink?.classList.add('text-purple-400', 'bg-gray-800');
                    }
                });
            }, {
                rootMargin: '-20% 0px -80% 0px'
            });

            // Observe all sections
            document.querySelectorAll('section[id], div[id]').forEach((section) => {
                observer.observe(section);
            });


        });
    </script>
</body>

</html>