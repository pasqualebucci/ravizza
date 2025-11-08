<?php

namespace App\Livewire;

use Illuminate\Bus\UpdatedBatchJobCounts;
use Livewire\Component;
use Livewire\Attributes\Session;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

use App\Models\Measurement;
use App\Models\Texture;
use App\Models\Wish;
use App\Models\Sleeve;
use App\Models\Collar;
use App\Models\Cuff;
use App\Models\Front;
use App\Models\Back;
use App\Models\Pocket;
use App\Models\Button;
use App\Models\Buttonhole;

use App\Models\Armor;
use App\Models\Brand;
use App\Models\Material;
use App\Models\Design;
use App\Models\Color;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ShirtConfigurator extends Component
{
    public string $message = '';
    public array $messages = [];
    public $savedPath = null;
    public $tessuti;
    public $tessuto;
    public $colletti;
    public $bottoni;
    public $asole;
    public $maniche;
    public $polsini;
    public $taschini;
    public $fronte;
    public $dietro;

    public $ini_color;
    public $ini_position;
    public $ini_style;

    public $elenco;

    // filtri tessuto
    public $selectedMaterials = [];
    public $selectedDesigns = [];
    public $selectedColors = [];
    public $selectedArmature = [];
    public $selectedBrands = [];


    // inizializzazione variabili

    public $fase;

    public $currentView;

    public $currentCollar;

    public $currentCollarMaterial;

    public $currentButton;
    public $currentButtonColor;

    public $currentAsola;
    public $currentAsolaColor;

    public $currentManica;
    public $currentManicaMaterial;

    public $currentPolsino;
    public $currentPolsinoMaterial;

    public $currentTaschino;
    public $currentTaschinoMaterial;

    public $currentFronte;
    public $currentFronteMaterial;

    public $currentDietro;
    public $currentDietroMaterial;

    #[Session] // Aggiungi questo attributo
    public $initials = '';

    public $iniColor;
    public $iniPosition;
    public $iniStyle;

    public $applicaMisure;
    public $currentMisure;
    public $unitaMisure;
    public $misure;
    // valori form
    public $colloCorpo;
    public $toraceCorpo;
    public $girovitaCorpo;
    public $spalleCorpo;
    public $bracciaCorpo;
    public $polsoCorpo;
    public $lunghezzaCorpo;
    public $colloCamicia;
    public $toraceCamicia;
    public $girovitaCamicia;
    public $spalleCamicia;
    public $bracciaCamicia;
    public $polsoCamicia;
    public $lunghezzaCamicia;
    public $vestibilita;
    public $taglia;

    public $kit;
    public $misureRecuperate;
    public $wishesRecuperati;
    // Array per memorizzare gli errori di compatibilità
    #[Session]
    public $erroriCompatibilita = [];
    // Flag per indicare se mostrare i messaggi
    #[Session]
    public $showErrors = false;

    public $snipcartUrl;

    public $collars;
    public $fabrics;

    public $settings;

    // tryon
    public $photomodello;
    public $vistainterna;

    // Constants for unit conversion
    const CM_TO_INCH = 0.393701;
    const INCH_TO_CM = 2.54;

    // Constants for measurement validations
    const MIN_TAPER_CM = 5;
    const MAX_TAPER_CM = 30;
    const MIN_CHEST_VS_NECK_RATIO = 2.2;
    const MAX_CHEST_VS_NECK_RATIO = 3.0;
    const SHOULDER_HALF_CHEST_DIFF_CM = 5;
    const MAX_CUFF_VS_NECK_RATIO = 0.8;
    const MAX_SLEEVE_VS_SHOULDER_RATIO = 1.8;
    const MIN_SLEEVE_VS_CHEST_RATIO = 0.5;
    const MAX_SLEEVE_VS_CHEST_RATIO = 0.7;
    const MIN_CHEST_CM = 85;
    // Range di Valori Congrui (Indicativi in cm)
    const RANGE_COLLO_CM = ['min' => 35, 'max' => 50];
    const RANGE_BRACCIA_SPALLA_POLSO_CM = ['min' => 58, 'max' => 70]; // Nota: spalla-polso
    const RANGE_POLSO_CM = ['min' => 15, 'max' => 22];
    const RANGE_TORACE_CM = ['min' => 80, 'max' => 130];
    const RANGE_GIROVITA_CM = ['min' => 70, 'max' => 120];
    const RANGE_LUNGHEZZA_SCHIENA_CM = ['min' => 40, 'max' => 55]; // Base collo a vita
    const RANGE_SPALLE_CM = ['min' => 42, 'max' => 55]; // Larghezza schiena estremità spalla

    // Combinazioni di Validazione per Anomalie Corporee (Soglie in cm o Rapporti)

    // Anomalia: Girovita e Torace - Proporzione Inversa o Eccessiva Differenza
    const WAIST_VS_CHEST_LARGE_WAIST_RATIO = 1.2; // Girovita > Torace * 1.2
    const WAIST_VS_CHEST_SMALL_CHEST_RATIO = 0.8; // Torace < Girovita * 0.8
    const CHEST_WAIST_DIFF_CM = 30;               // Torace - Girovita > 30 cm

    // Anomalia: Collo e Torace - Sproporzione Evidente
    const NECK_VS_CHEST_LARGE_NECK_HALF_CHEST_RATIO = 0.5; // Collo > Torace / 2 -> Collo / Torace > 0.5 -> Collo > Torace * 0.5

    // Anomalia: Polso e Collo - Dimensioni Simili o Inverse
    const CUFF_VS_NECK_LARGE_CUFF_RATIO = 0.6; // Polso > Collo * 0.6

    // Anomalia: Spalle e Torace - Sproporzione Evidente
    const SHOULDER_VS_CHEST_LARGE_DIFF_CM = 10; // Spalle > (Torace / 2) + 10 cm
    const SHOULDER_VS_CHEST_SMALL_DIFF_CM = 15; // Spalle < (Torace / 2) - 15 cm

    // Anomalia: Braccia (Lunghezza) e Spalle/Torace - Sproporzione di Lunghezza
    const SLEEVE_VS_SHOULDER_SHORT_RATIO = 1.1; // Braccia < Spalle * 1.1
    const SLEEVE_VS_SHOULDER_LONG_RATIO = 1.7;  // Braccia > Spalle * 1.7

    // Nuove costanti per il controllo Braccia vs Torace (rapporti approssimativi)
    const MIN_BODY_ARM_VS_CHEST_RATIO = 0.5; // Basato su esempio proporzione Manica vs Torace (capo)
    const MAX_BODY_ARM_VS_CHEST_RATIO = 0.7; // Basato su esempio proporzione Manica vs Torace (capo)



    public function mount()
    {
        $this->snipcartUrl = session('snipcartUrl', env('SNIPCART_URL'));

        $this->messages[] = [
            'from' => 'bot',
            'text' => 'Ciao! 👋 Sono Shirtly, il tuo assistente per la personalizzazione. Come posso aiutarti oggi?',
        ];


        if (Auth::check()) {
            $this->recuperaWishes();
            $this->recuperaMisure();
        }

        ;
        $this->vistainterna = session('vistainterna', '3d');

        $this->currentView = session('currentView', 'colletti');
        $this->fase = session('fase', 'tessuti');

        $this->currentCollar = session('currentCollar', 2);
        $this->currentCollarMaterial = session('currentCollarMaterial', 'colletto_classico');

        $this->currentButton = session('currentButton', 1);
        $this->currentButtonColor = session('currentButtonColor', '#dfdfdf');

        $this->currentAsola = session('currentAsola', 1);
        $this->currentAsolaColor = session('currentAsolaColor', '#dfdfdf');

        $this->currentManica = session('currentManica', 1);
        $this->currentManicaMaterial = session('currentManicaMaterial', 'manica_lunga');

        $this->currentPolsino = session('currentPolsino', 1);
        $this->currentPolsinoMaterial = session('currentPolsinoMaterial', 'polsino_1');

        $this->currentTaschino = session('currentTaschino', 1);
        $this->currentTaschinoMaterial = session('currentTaschinoMaterial', '');

        $this->currentFronte = session('currentFronte', 1);
        $this->currentFronteMaterial = session('currentFronteMaterial', 'front');

        $this->currentDietro = session('currentDietro', 1);
        $this->currentDietroMaterial = session('currentDietroMaterial', 'dietro_1');

        //$this->initials = session('initials', '');
        $this->iniColor = session('iniColor', '');
        $this->iniPosition = session('iniPosition', '');
        $this->iniStyle = session('iniStyle', '');


        $this->vestibilita = session('vestibilita', 'Slim');
        $this->taglia = session('taglia', 'S');
        $this->unitaMisure = session('unitaMisure', 'cm');
        $this->currentMisure = session('currentMisure', 'Misura con taglia');
        $this->applicaMisure = session('applicaMisure', []);
        $this->colloCorpo = session('colloCorpo', ''); // oppure un valore di default
        $this->toraceCorpo = session('toraceCorpo', '');
        $this->girovitaCorpo = session('girovitaCorpo', '');
        $this->spalleCorpo = session('spalleCorpo', '');
        $this->bracciaCorpo = session('bracciaCorpo', '');
        $this->polsoCorpo = session('polsoCorpo', '');
        $this->lunghezzaCorpo = session('lunghezzaCorpo', '');
        $this->colloCamicia = session('colloCamicia', '');
        $this->toraceCamicia = session('toraceCamicia', '');
        $this->girovitaCamicia = session('girovitaCamicia', '');
        $this->spalleCamicia = session('spalleCamicia', '');
        $this->bracciaCamicia = session('bracciaCamicia', '');
        $this->polsoCamicia = session('polsoCamicia', '');
        $this->lunghezzaCamicia = session('lunghezzaCamicia', '');

        $this->kit = session('kit', 2);

        // Initialize filters from session
        $this->selectedMaterials = session('selectedMaterials', []);
        $this->selectedDesigns = session('selectedDesigns', []);
        $this->selectedColors = session('selectedColors', []);
        $this->selectedArmature = session('selectedArmature', []);
        $this->selectedBrands = session('selectedBrands', []);
        // Apply filters immediately after loading session values
        $this->applyFilters();
    }

    public function filterByMaterial($materialId)
    {
        if (in_array($materialId, $this->selectedMaterials)) {
            $this->selectedMaterials = array_diff($this->selectedMaterials, [$materialId]);
        } else {
            $this->selectedMaterials[] = $materialId;
        }
        session(['selectedMaterials' => $this->selectedMaterials]);
        $this->applyFilters();
    }

    public function filterByDesign($designId)
    {
        if (in_array($designId, $this->selectedDesigns)) {
            $this->selectedDesigns = array_diff($this->selectedDesigns, [$designId]);
        } else {
            $this->selectedDesigns[] = $designId;
        }
        session(['selectedDesigns' => $this->selectedDesigns]);
        $this->applyFilters();
    }

    public function filterByColor($colorId)
    {
        if (in_array($colorId, $this->selectedColors)) {
            $this->selectedColors = array_diff($this->selectedColors, [$colorId]);
        } else {
            $this->selectedColors[] = $colorId;
        }
        session(['selectedColors' => $this->selectedColors]);
        $this->applyFilters();
    }

    public function filterByArmature($armaturaId)
    {
        if (in_array($armaturaId, $this->selectedArmature)) {
            $this->selectedArmature = array_diff($this->selectedArmature, [$armaturaId]);
        } else {
            $this->selectedArmature[] = $armaturaId;
        }
        session(['selectedArmature' => $this->selectedArmature]);
        $this->applyFilters();
    }
    public function filterByBrands($brandId)
    {
        if (in_array($brandId, $this->selectedBrands)) {
            $this->selectedBrands = array_diff($this->selectedBrands, [$brandId]);
        } else {
            $this->selectedBrands[] = $brandId;
        }
        session(['selectedBrands' => $this->selectedBrands]);
        $this->applyFilters();
    }

    protected function applyFilters()
    {
        $query = Texture::query()->where('attivo', true);

        if (!empty($this->selectedMaterials)) {
            $query->whereIn('material_id', $this->selectedMaterials);
        }

        if (!empty($this->selectedDesigns)) {
            $query->whereIn('design_id', $this->selectedDesigns);
        }

        if (!empty($this->selectedColors)) {
            $query->whereHas('colori', function ($q) {
                $q->whereIn('colors.id', $this->selectedColors);
            });
        }

        if (!empty($this->selectedArmature)) {
            $query->whereIn('armor_id', $this->selectedArmature);
        }

        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }

        $this->tessuti = $query->get();
    }
    // Add a method to reset filters
    public function resetFilters()
    {
        $this->selectedMaterials = [];
        $this->selectedDesigns = [];
        $this->selectedColors = [];
        $this->selectedArmature = [];
        $this->selectedBrands = [];

        session()->forget([
            'selectedMaterials',
            'selectedDesigns',
            'selectedColors',
            'selectedArmature',
            'selectedBrands'
        ]);

        $this->applyFilters();
    }

    public function saveWishes()
    {
        // Save to database if user is logged in
        if (Auth::check()) {
            Wish::create([
                'user_id' => Auth::id(),
                'tessuto_id' => $this->tessuto->id,
                'tessuto_nome' => $this->tessuto->nome,
                'tessuto_slug' => $this->tessuto->slug,
                'tessuto_image' => $this->tessuto->image,
                'colletto_id' => $this->currentCollar,
                'manica_id' => $this->currentManica,
                'polsino_id' => $this->currentPolsino,
                'fronte_id' => $this->currentFronte,
                'dietro_id' => $this->currentDietro,
                'taschino_id' => $this->currentTaschino,
                'bottone_id' => $this->currentButton,
                'asola_id' => $this->currentAsola,
                'iniziali' => $this->initials,
                'iniz_colore' => $this->iniColor,
                'iniz_stile' => $this->iniStyle,
                'iniz_posizione' => $this->iniPosition,
            ]);

            session(['status' => 'Le tue scelte sono state salvate con successo!']);
        }
    }

    public function resetStatus()
    {
        session(['status' => null]);
    }

    public function aggiuntoCarrello($item)
    {
        session(['status' => 'Il prodotto ' . $item . ' è stato aggiunto al carrello con successo!']);
    }
    public function updateView($view)
    {
        $this->currentView = $view;
        session(['currentView' => $view]);
        $this->updateKit(2);
    }
    public function recuperaWishes()
    {
        $this->wishesRecuperati = null;
        if (Auth::check()) {
            $this->wishesRecuperati = Wish::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        }
    }
    public function recuperaMisure()
    {
        $this->misureRecuperate = null;
        if (Auth::check()) {
            $this->misureRecuperate = Measurement::where('user_id', Auth::id())->first();
        }
    }
    public function resetMisure()
    {
        // Reset body measurements
        $this->colloCorpo = '';
        $this->toraceCorpo = '';
        $this->girovitaCorpo = '';
        $this->spalleCorpo = '';
        $this->bracciaCorpo = '';
        $this->polsoCorpo = '';
        $this->lunghezzaCorpo = '';

        // Reset shirt measurements
        $this->colloCamicia = '';
        $this->toraceCamicia = '';
        $this->girovitaCamicia = '';
        $this->spalleCamicia = '';
        $this->bracciaCamicia = '';
        $this->polsoCamicia = '';
        $this->lunghezzaCamicia = '';

        // Reset other measurement related properties
        $this->vestibilita = 'Slim';
        $this->taglia = 'S';
        $this->currentMisure = 'Misura con taglia';
        $this->unitaMisure = 'cm';
        $this->misure = [];

        // Reset session variables
        session()->forget([
            'colloCorpo',
            'toraceCorpo',
            'girovitaCorpo',
            'spalleCorpo',
            'bracciaCorpo',
            'polsoCorpo',
            'lunghezzaCorpo',
            'colloCamicia',
            'toraceCamicia',
            'girovitaCamicia',
            'spalleCamicia',
            'bracciaCamicia',
            'polsoCamicia',
            'lunghezzaCamicia',
            'vestibilita',
            'taglia',
            'currentMisure',
            'unitaMisure',
            'misure'
        ]);

        // Reset error states
        $this->erroriCompatibilita = [];
        $this->showErrors = false;
    }
    public function riprendiWishes($wish)
    {
        // Set the current values based on the wish
        if (Auth::check()) {
            $this->currentCollar = $wish['colletto_id'];
            $collar = Collar::find($wish['colletto_id']);
            $this->currentCollarMaterial = $collar ? $collar->material : 'colletto_classico';

            $this->currentManica = $wish['manica_id'];
            $manica = Sleeve::find($wish['manica_id']);
            $this->currentManicaMaterial = $manica ? $manica->material : 'manica_lunga';

            $this->currentPolsino = $wish['polsino_id'];
            $polsino = Cuff::find($wish['polsino_id']);
            $this->currentPolsinoMaterial = $polsino ? $polsino->material : 'polsino_1';

            $this->currentFronte = $wish['fronte_id'];
            $fronte = Front::find($wish['fronte_id']);
            $this->currentFronteMaterial = $fronte ? $fronte->material : 'front';

            $this->currentDietro = $wish['dietro_id'];
            $dietro = Back::find($wish['dietro_id']);
            $this->currentDietroMaterial = $dietro ? $dietro->material : 'dietro_1';

            $this->currentTaschino = $wish['taschino_id'];
            $taschino = Pocket::find($wish['taschino_id']);
            $this->currentTaschinoMaterial = $taschino ? $taschino->material : '';

            $this->currentButton = $wish['bottone_id'];
            $bottone = Button::find($wish['bottone_id']);
            $this->currentButtonColor = $bottone ? $bottone->colore : '#dfdfdf';

            $this->currentAsola = $wish['asola_id'];
            $asola = Buttonhole::find($wish['asola_id']);
            $this->currentAsolaColor = $asola ? $asola->colore : '#dfdfdf';

            $this->initials = $wish['iniziali'];
            $this->iniColor = $wish['iniz_colore'];
            $this->iniPosition = $wish['iniz_posizione'];
            $this->iniStyle = $wish['iniz_stile'];


            session([
                'currentCollar' => $this->currentCollar,
                'currentCollarMaterial' => $this->currentCollarMaterial,
                'currentManica' => $this->currentManica,
                'currentManicaMaterial' => $this->currentManicaMaterial,
                'currentPolsino' => $this->currentPolsino,
                'currentPolsinoMaterial' => $this->currentPolsinoMaterial,
                'currentFronte' => $this->currentFronte,
                'currentFronteMaterial' => $this->currentFronteMaterial,
                'currentDietro' => $this->currentDietro,
                'currentDietroMaterial' => $this->currentDietroMaterial,
                'currentTaschino' => $this->currentTaschino,
                'currentTaschinoMaterial' => $this->currentTaschinoMaterial,
                'currentButton' => $this->currentButton,
                'currentButtonColor' => $this->currentButtonColor,
                'currentAsola' => $this->currentAsola,
                'currentAsolaColor' => $this->currentAsolaColor,
                'initials' => $this->initials,
                'iniColor' => $this->iniColor,
                'iniPosition' => $this->iniPosition,
                'iniStyle' => $this->iniStyle,
                'status' => 'Creazione recuperata con successo'
            ]);

            if ($this->tessuto && $this->tessuto->id !== $wish['tessuto_id']) {
                return redirect()->route('demo.show', ['slug' => $wish['tessuto_slug']]);
            }
        }
    }
    public function riprendiMisure($misure)
    {

        if (Auth::check()) {

            // reset misure
            $this->resetMisure();

            if ($misure['tipo_misura'] === 'Misura con taglia') {
                $this->currentMisure = $misure['tipo_misura'];
                $this->taglia = $misure['taglia'];
                $this->vestibilita = $misure['fit_preference'];

                // Update measurements using the existing method
                $this->updateMisureTaglia();
            } elseif ($misure['tipo_misura'] === 'Misura il tuo corpo') {
                $this->currentMisure = $misure['tipo_misura'];
                $this->unitaMisure = $misure['unita_misura'];
                $this->vestibilita = $misure['fit_preference'];

                // Set body measurements from database
                $this->colloCorpo = $misure['collo'];
                $this->toraceCorpo = $misure['torace'];
                $this->girovitaCorpo = $misure['girovita'];
                $this->spalleCorpo = $misure['spalle'];
                $this->bracciaCorpo = $misure['braccia'];
                $this->polsoCorpo = $misure['polso'];
                $this->lunghezzaCorpo = $misure['lunghezza'];

                // Update measurements using the existing method
                $this->updateMisureCorpo(true);
            } elseif ($misure['tipo_misura'] === 'Misura la tua camicia') {
                $this->currentMisure = $misure['tipo_misura'];
                $this->unitaMisure = $misure['unita_misura'];
                $this->vestibilita = $misure['fit_preference'];

                // Set shirt measurements from database
                $this->colloCamicia = $misure['collo'];
                $this->toraceCamicia = $misure['torace'];
                $this->girovitaCamicia = $misure['girovita'];
                $this->spalleCamicia = $misure['spalle'];
                $this->bracciaCamicia = $misure['braccia'];
                $this->polsoCamicia = $misure['polso'];
                $this->lunghezzaCamicia = $misure['lunghezza'];

                // Update measurements using the existing method
                $this->updateMisureDaCamicia(true);
            }
        }
    }
    public function updateMisure($mis)
    {
        $this->erroriCompatibilita = [];
        $this->showErrors = false;
        $this->currentMisure = $mis;
        session(['currentMisure' => $mis]);
        $this->updateKit(2);
    }
    public function updateUnitaMisure($unita)
    {
        $this->unitaMisure = $unita;
        session(['unitaMisure' => $unita]);
    }

    public function updateKit($kit)
    {
        $this->kit = $kit;
        session(['kit' => $kit]);
    }
    public function updateMisureDaInviare()
    {

        $this->currentMisure = 'Inviaci una camicia';
        $this->misure = ['Tipo misura' => $this->currentMisure];
        session([
            'currentMisure' => $this->currentMisure,
            'misure' => $this->misure,
            'status' => 'Misure applicate con successo',
        ]);
    }
    public function updateMisureMilano()
    {

        $this->currentMisure = 'Servizio su misura a Milano';
        $this->misure = ['Tipo misura' => $this->currentMisure];
        session([
            'currentMisure' => $this->currentMisure,
            'misure' => $this->misure,
            'status' => 'Misure applicate con successo',
        ]);
    }
    public function updateMisureTaglia()
    {
        // Save to database if user is logged in
        if (Auth::check()) {
            Measurement::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                ],
                [
                    'tipo_misura' => $this->currentMisure,
                    'taglia' => $this->taglia,
                    'unita_misura' => null,
                    'collo' => null,
                    'torace' => null,
                    'girovita' => null,
                    'spalle' => null,
                    'braccia' => null,
                    'polso' => null,
                    'lunghezza' => null,
                    'fit_preference' => $this->vestibilita
                ]
            );
        }
        $this->misure = [
            'Tipo misura' => $this->currentMisure,
            'Taglia' => $this->taglia,
            'Vestibilità' => $this->vestibilita
        ];
        session([
            'taglia' => $this->taglia,
            'vestibilita' => $this->vestibilita,
            'misure' => $this->misure,
            'status' => 'Misure applicate con successo',
        ]);
    }

    protected function convertToCm(float $value): float
    {
        if ($this->unitaMisure === 'in') {
            return $value * 2.54;
        }
        return $value; // Se è già cm, restituisci il valore originale
    }

    public function verificaCompatibilita($collo, $torace, $girovita, $spalle, $braccia, $polso, $lunghezza)
    {
        $this->erroriCompatibilita = [];
        $this->showErrors = false;
        $unit = $this->unitaMisure;

        // Converti tutte le misure in CM per i controlli
        $colloCm = $this->convertToCm($collo);
        $bracciaCm = $this->convertToCm($braccia); // Misura spalla-polso
        $polsoCm = $this->convertToCm($polso);
        $toraceCm = $this->convertToCm($torace);
        $girovitaCm = $this->convertToCm($girovita);
        $lunghezzaSchienaCm = $this->convertToCm($lunghezza);
        $spalleCm = $this->convertToCm($spalle);

        // Anomalia: Misure Estremamente Fuori Range:
        if ($colloCm < self::RANGE_COLLO_CM['min'] || $colloCm > self::RANGE_COLLO_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Collo (" . round($collo, 1) . $unit . ") fuori range plausibile (" . self::RANGE_COLLO_CM['min'] . "-" . self::RANGE_COLLO_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($bracciaCm < self::RANGE_BRACCIA_SPALLA_POLSO_CM['min'] || $bracciaCm > self::RANGE_BRACCIA_SPALLA_POLSO_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Braccia (spalla-polso) (" . round($braccia, 1) . $unit . ") fuori range plausibile (" . self::RANGE_BRACCIA_SPALLA_POLSO_CM['min'] . "-" . self::RANGE_BRACCIA_SPALLA_POLSO_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($polsoCm < self::RANGE_POLSO_CM['min'] || $polsoCm > self::RANGE_POLSO_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Polso (" . round($polso, 1) . $unit . ") fuori range plausibile (" . self::RANGE_POLSO_CM['min'] . "-" . self::RANGE_POLSO_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($toraceCm < self::RANGE_TORACE_CM['min'] || $toraceCm > self::RANGE_TORACE_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Torace (" . round($torace, 1) . $unit . ") fuori range plausibile (" . self::RANGE_TORACE_CM['min'] . "-" . self::RANGE_TORACE_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($girovitaCm < self::RANGE_GIROVITA_CM['min'] || $girovitaCm > self::RANGE_GIROVITA_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Girovita (" . round($girovita, 1) . $unit . ") fuori range plausibile (" . self::RANGE_GIROVITA_CM['min'] . "-" . self::RANGE_GIROVITA_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($lunghezzaSchienaCm < self::RANGE_LUNGHEZZA_SCHIENA_CM['min'] || $lunghezzaSchienaCm > self::RANGE_LUNGHEZZA_SCHIENA_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Lunghezza Schiena (" . round($lunghezza, 1) . $unit . ") fuori range plausibile (" . self::RANGE_LUNGHEZZA_SCHIENA_CM['min'] . "-" . self::RANGE_LUNGHEZZA_SCHIENA_CM['max'] . "cm).";
            $this->showErrors = true;
        }
        if ($spalleCm < self::RANGE_SPALLE_CM['min'] || $spalleCm > self::RANGE_SPALLE_CM['max']) {
            $this->erroriCompatibilita[] = "Anomalia Range: Spalle (" . round($spalle, 1) . $unit . ") fuori range plausibile (" . self::RANGE_SPALLE_CM['min'] . "-" . self::RANGE_SPALLE_CM['max'] . "cm).";
            $this->showErrors = true;
        }

        // Anomalia: Girovita e Torace - Proporzione Inversa o Eccessiva Differenza:
        if ($toraceCm > 0) { // Evita divisione per zero
            if ($girovitaCm > $toraceCm * self::WAIST_VS_CHEST_LARGE_WAIST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Girovita/Torace: Girovita (" . round($girovita, 1) . $unit . ") significativamente più grande del Torace (" . round($torace, 1) . $unit . "). Rapporto Girovita/Torace: " . round($girovitaCm / $toraceCm, 2);
                $this->showErrors = true;
            }
            if ($toraceCm < $girovitaCm * self::WAIST_VS_CHEST_SMALL_CHEST_RATIO && $girovitaCm > 0) { // Evita divisione per zero
                $this->erroriCompatibilita[] = "Anomalia Girovita/Torace: Torace (" . round($torace, 1) . $unit . ") significativamente più piccolo del Girovita (" . round($girovita, 1) . $unit . "). Rapporto Torace/Girovita: " . round($toraceCm / $girovitaCm, 2) . ".";
                $this->showErrors = true;
            }
        }
        if ($toraceCm - $girovitaCm > self::CHEST_WAIST_DIFF_CM) {
            $this->erroriCompatibilita[] = "Anomalia Girovita/Torace: Differenza Torace - Girovita (" . round(($toraceCm - $girovitaCm) * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ") eccessivamente alta (maggiore di " . self::CHEST_WAIST_DIFF_CM . "cm).";
            $this->showErrors = true;
        }


        // Anomalia: Collo e Torace - Sproporzione Evidente:
        if ($toraceCm > 0) { // Evita divisione per zero
            if ($colloCm > $toraceCm * self::NECK_VS_CHEST_LARGE_NECK_HALF_CHEST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Collo/Torace: Collo (" . round($collo, 1) . $unit . ") troppo grande rispetto a metà Torace (" . round($toraceCm / 2 * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . "). Rapporto Collo/(Torace/2): " . round($colloCm / ($toraceCm / 2), 2) . ".";
                $this->showErrors = true;
            }
        }

        // Anomalia: Polso e Collo - Dimensioni Simili o Inverse:
        if ($colloCm > 0) { // Evita divisione per zero
            if ($polsoCm >= $colloCm) {
                $this->erroriCompatibilita[] = "Anomalia Polso/Collo: Polso (" . round($polso, 1) . $unit . ") è uguale o maggiore del Collo (" . round($collo, 1) . $unit . "). Impossibile.";
                $this->showErrors = true;
            } elseif ($polsoCm > $colloCm * self::CUFF_VS_NECK_LARGE_CUFF_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Polso/Collo: Polso (" . round($polso, 1) . $unit . ") troppo grande rispetto al Collo (" . round($collo, 1) . $unit . "). Rapporto Polso/Collo: " . round($polsoCm / $colloCm, 2) . ".";
                $this->showErrors = true;
            }
        }

        // Anomalia: Spalle e Torace - Sproporzione Evidente:
        if ($toraceCm > 0) { // Evita divisione per zero
            $halfChestCm = $toraceCm / 2;
            if ($spalleCm > $halfChestCm + self::SHOULDER_VS_CHEST_LARGE_DIFF_CM) {
                $this->erroriCompatibilita[] = "Anomalia Spalle/Torace: Spalle (" . round($spalle, 1) . $unit . ") troppo larghe rispetto a metà Torace (" . round($halfChestCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . "). Differenza: +" . round(($spalleCm - $halfChestCm) * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ".";
                $this->showErrors = true;
            } elseif ($spalleCm < $halfChestCm - self::SHOULDER_VS_CHEST_SMALL_DIFF_CM) {
                $this->erroriCompatibilita[] = "Anomalia Spalle/Torace: Spalle (" . round($spalle, 1) . $unit . ") troppo strette rispetto a metà Torace (" . round($halfChestCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . "). Differenza: " . round(($spalleCm - $halfChestCm) * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ".";
                $this->showErrors = true;
            }
        }


        // Anomalia: Braccia (Lunghezza) e Spalle/Torace - Sproporzione di Lunghezza:
        if ($spalleCm > 0) { // Evita divisione per zero
            if ($bracciaCm < $spalleCm * self::SLEEVE_VS_SHOULDER_SHORT_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Braccia/Spalle: Lunghezza braccio (" . round($braccia, 1) . $unit . ") troppo corta rispetto alle Spalle (" . round($spalle, 1) . $unit . "). Rapporto Braccia/Spalle: " . round($bracciaCm / $spalleCm, 2) . ".";
                $this->showErrors = true;
            }
            if ($bracciaCm > $spalleCm * self::SLEEVE_VS_SHOULDER_LONG_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Braccia/Spalle: Lunghezza braccio (" . round($braccia, 1) . $unit . ") eccessiva rispetto alle Spalle (" . round($spalle, 1) . $unit . "). Rapporto Braccia/Spalle: " . round($bracciaCm / $spalleCm, 2) . ".";
                $this->showErrors = true;
            }
        }

        // Controllo Braccia vs Torace (basato su rapporti approssimativi) **
        if ($toraceCm > 0) { // Evita divisione per zero
            $armChestRatio = $bracciaCm / $toraceCm;
            if ($armChestRatio < self::MIN_BODY_ARM_VS_CHEST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Braccia/Torace: Rapporto Braccia/Torace (" . round($armChestRatio, 2) . ") è basso (minimo atteso " . self::MIN_BODY_ARM_VS_CHEST_RATIO . "). Lunghezza braccio troppo corta per la dimensione del Torace.";
                $this->showErrors = true;
            }
            if ($armChestRatio > self::MAX_BODY_ARM_VS_CHEST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Braccia/Torace: Rapporto Braccia/Torace (" . round($armChestRatio, 2) . ") è alto (massimo atteso " . self::MAX_BODY_ARM_VS_CHEST_RATIO . "). Lunghezza braccio troppo lunga per la dimensione del Torace.";
                $this->showErrors = true;
            }
        }
    }

    public function verificaCompatibilitaCamicia($collo, $torace, $girovita, $spalle, $braccia, $polso, $lunghezza)
    {
        $this->erroriCompatibilita = [];
        $this->showErrors = false;
        $unit = $this->unitaMisure;

        // Converti tutte le misure in CM per i controlli
        $toraceCm = $this->convertToCm($torace);
        $girovitaCm = $this->convertToCm($girovita);
        $colloCm = $this->convertToCm($collo);
        $spalleCm = $this->convertToCm($spalle);
        $polsinoCm = $this->convertToCm($polso);
        $manicaCm = $this->convertToCm($braccia);

        // Anomalia: Torace Camicia e Girovita Camicia - Proporzione Inversa o Taper Eccessivo/Assente:
        if ($girovitaCm >= $toraceCm) {
            $this->erroriCompatibilita[] = "Anomalia Torace/Girovita: Girovita (" . round($girovita, 1) . $unit . ") è uguale o maggiore del Torace (" . round($torace, 1) . $unit . "). Taper non positivo.";
            $this->showErrors = true;
        } else {
            $taperCm = $toraceCm - $girovitaCm;
            if ($taperCm < self::MIN_TAPER_CM) {
                $this->erroriCompatibilita[] = "Anomalia Torace/Girovita: Taper (Torace - Girovita) (" . round($taperCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ") è troppo piccolo (minimo " . self::MIN_TAPER_CM . "cm).";
                $this->showErrors = true;
            }
            if ($taperCm > self::MAX_TAPER_CM) {
                $this->erroriCompatibilita[] = "Anomalia Torace/Girovita: Taper (Torace - Girovita) (" . round($taperCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ") è eccessivo (massimo " . self::MAX_TAPER_CM . "cm).";
                $this->showErrors = true;
            }
        }

        // Anomalia: Collo Camicia e Torace Camicia - Sproporzione:
        // Controlla che ColloCm sia > 0 per evitare divisioni per zero nei rapporti
        if ($colloCm > 0) {
            $chestNeckRatio = $toraceCm / $colloCm;
            if ($chestNeckRatio < self::MIN_CHEST_VS_NECK_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Collo/Torace: Rapporto Torace/Collo (" . round($chestNeckRatio, 2) . ") è basso (minimo atteso " . self::MIN_CHEST_VS_NECK_RATIO . "). Torace non significativamente più grande del Collo.";
                $this->showErrors = true;
            }
            if ($chestNeckRatio > self::MAX_CHEST_VS_NECK_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Collo/Torace: Rapporto Torace/Collo (" . round($chestNeckRatio, 2) . ") è eccessivamente alto (massimo atteso " . self::MAX_CHEST_VS_NECK_RATIO . ").";
                $this->showErrors = true;
            }
        } else {
            $this->erroriCompatibilita[] = "Anomalia Collo: Il valore del Collo Camicia è zero, il che non è valido per i controlli di proporzione.";
            $this->showErrors = true;
        }


        // Anomalia: Spalle Camicia e Torace Camicia - Sproporzione:
        $halfChestCm = $toraceCm / 2;
        if ($spalleCm > $halfChestCm + self::SHOULDER_HALF_CHEST_DIFF_CM) {
            $this->erroriCompatibilita[] = "Anomalia Spalle/Torace: Spalle (" . round($spalle, 1) . $unit . ") eccessivamente larghe rispetto a metà Torace (" . round($halfChestCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ").";
            $this->showErrors = true;
        } elseif ($spalleCm < $halfChestCm - self::SHOULDER_HALF_CHEST_DIFF_CM) {
            $this->erroriCompatibilita[] = "Anomalia Spalle/Torace: Spalle (" . round($spalle, 1) . $unit . ") eccessivamente strette rispetto a metà Torace (" . round($halfChestCm * ($unit === 'in' ? self::CM_TO_INCH : 1), 1) . $unit . ").";
            $this->showErrors = true;
        }

        // Anomalia: Polsino Camicia e Collo Camicia - Dimensioni Simili o Inverse:
        if ($colloCm > 0) { // Controlla che ColloCm sia > 0 per il rapporto
            if ($polsinoCm >= $colloCm) {
                $this->erroriCompatibilita[] = "Anomalia Polsino/Collo: Polsino (" . round($polso, 1) . $unit . ") è uguale o maggiore del Collo (" . round($collo, 1) . $unit . "). Impossibile.";
                $this->showErrors = true;
            } elseif ($polsinoCm > $colloCm * self::MAX_CUFF_VS_NECK_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Polsino/Collo: Rapporto Polsino/Collo (" . round($polsinoCm / $colloCm, 2) . ") è alto (massimo atteso " . self::MAX_CUFF_VS_NECK_RATIO . "). Polsino troppo grande rispetto al Collo.";
                $this->showErrors = true;
            }
        } // Se ColloCm è 0, l'anomalia del Collo 0 è già stata segnalata


        // Anomalia: Manica Camicia e Spalle Camicia - Lunghezza Incongrua:
        if ($manicaCm <= $spalleCm) {
            $this->erroriCompatibilita[] = "Anomalia Manica/Spalle: Lunghezza Manica (" . round($braccia, 1) . $unit . ") è uguale o inferiore alla Larghezza Spalle (" . round($spalle, 1) . $unit . "). La manica dovrebbe essere più lunga.";
            $this->showErrors = true;
        } elseif ($spalleCm > 0) { // Controlla che SpalleCm sia > 0 per il rapporto
            if ($manicaCm > $spalleCm * self::MAX_SLEEVE_VS_SHOULDER_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Manica/Spalle: Rapporto Manica/Spalle (" . round($manicaCm / $spalleCm, 2) . ") è eccessivo (massimo atteso " . self::MAX_SLEEVE_VS_SHOULDER_RATIO . "). Manica eccessivamente lunga rispetto alle Spalle.";
                $this->showErrors = true;
            }
        }


        // Anomalia: Manica Camicia e Torace Camicia - Sproporzione di Taglia:
        if ($toraceCm > 0) { // Controlla che ToraceCm sia > 0 per i rapporti
            $sleeveChestRatio = $manicaCm / $toraceCm;
            if ($sleeveChestRatio < self::MIN_SLEEVE_VS_CHEST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Manica/Torace: Rapporto Manica/Torace (" . round($sleeveChestRatio, 2) . ") è basso (minimo atteso " . self::MIN_SLEEVE_VS_CHEST_RATIO . "). Manica troppo corta per la dimensione del Torace.";
                $this->showErrors = true;
            }
            if ($sleeveChestRatio > self::MAX_SLEEVE_VS_CHEST_RATIO) {
                $this->erroriCompatibilita[] = "Anomalia Manica/Torace: Rapporto Manica/Torace (" . round($sleeveChestRatio, 2) . ") è alto (massimo atteso " . self::MAX_SLEEVE_VS_CHEST_RATIO . "). Manica troppo lunga per la dimensione del Torace.";
                $this->showErrors = true;
            }
        }


        // Anomalia: Misure del Capo Troppo Vicine o Inferiori alle Misure Corporee Minime Plausibili (Torace Minimo):
        if ($toraceCm < self::MIN_CHEST_CM) {
            $this->erroriCompatibilita[] = "Anomalia Misure Minime: Torace Camicia (" . round($torace, 1) . $unit . ") è troppo piccolo (minimo atteso per camicia standard adulta " . self::MIN_CHEST_CM . "cm). Misura probabilmente errata.";
            $this->showErrors = true;
        }
    }
    public function updateMisureCorpo($forza = false)
    {


        $validatedData = Validator::make([
            'collo' => $this->colloCorpo,
            'torace' => $this->toraceCorpo,
            'girovita' => $this->girovitaCorpo,
            'spalle' => $this->spalleCorpo,
            'braccia' => $this->bracciaCorpo,
            'polso' => $this->polsoCorpo,
            'lunghezza' => $this->lunghezzaCorpo,
            'vestibilita' => $this->vestibilita,
        ], [
            'collo' => 'required|numeric',
            'torace' => 'required|numeric',
            'girovita' => 'required|numeric',
            'spalle' => 'required|numeric',
            'braccia' => 'required|numeric',
            'polso' => 'required|numeric',
            'lunghezza' => 'required|numeric',
            'vestibilita' => 'required|in:Slim,Regular,Large',
        ])->validate();

        if ($forza == false) {

            $this->verificaCompatibilita($this->colloCorpo, $this->toraceCorpo, $this->girovitaCorpo, $this->spalleCorpo, $this->bracciaCorpo, $this->polsoCorpo, $this->lunghezzaCorpo);
        } else {
            $this->showErrors = false;
        }

        if ($this->showErrors) {
            return;
        }

        $data = [
            'tipo_misura' => $this->currentMisure,
            'taglia' => null,
            'unita_misura' => $this->unitaMisure,
            'collo' => $this->colloCorpo,
            'torace' => $this->toraceCorpo,
            'girovita' => $this->girovitaCorpo,
            'spalle' => $this->spalleCorpo,
            'braccia' => $this->bracciaCorpo,
            'polso' => $this->polsoCorpo,
            'lunghezza' => $this->lunghezzaCorpo,
            'fit_preference' => $this->vestibilita
        ];

        // Save to database if user is logged in
        if (Auth::check()) {
            Measurement::updateOrCreate(['user_id' => Auth::id()], $data);
        }

        $this->misure = [
            'Tipo misura' => $this->currentMisure,
            'Unità di misura' => $this->unitaMisure,
            'Collo' => $this->colloCorpo,
            'Torace' => $this->toraceCorpo,
            'Girovita' => $this->girovitaCorpo,
            'Spalle' => $this->spalleCorpo,
            'Braccia' => $this->bracciaCorpo,
            'Polso' => $this->polsoCorpo,
            'Lunghezza' => $this->lunghezzaCorpo,
            'Vestibilità' => $this->vestibilita
        ];
        session([
            'colloCorpo' => $this->colloCorpo,
            'toraceCorpo' => $this->toraceCorpo,
            'girovitaCorpo' => $this->girovitaCorpo,
            'spalleCorpo' => $this->spalleCorpo,
            'bracciaCorpo' => $this->bracciaCorpo,
            'polsoCorpo' => $this->polsoCorpo,
            'lunghezzaCorpo' => $this->lunghezzaCorpo,
            'vestibilita' => $this->vestibilita,
            'misure' => $this->misure,
            'status' => 'Misure applicate con successo'
        ]);
    }
    public function updateMisureDaCamicia($forza = false)
    {

        $validatedData = Validator::make([
            'collo' => $this->colloCamicia,
            'torace' => $this->toraceCamicia,
            'girovita' => $this->girovitaCamicia,
            'spalle' => $this->spalleCamicia,
            'braccia' => $this->bracciaCamicia,
            'polso' => $this->polsoCamicia,
            'lunghezza' => $this->lunghezzaCamicia,
            'vestibilita' => $this->vestibilita,
        ], [
            'collo' => 'required|numeric',
            'torace' => 'required|numeric',
            'girovita' => 'required|numeric',
            'spalle' => 'required|numeric',
            'braccia' => 'required|numeric',
            'polso' => 'required|numeric',
            'lunghezza' => 'required|numeric',
            'vestibilita' => 'required|in:Slim,Regular,Large',
        ])->validate();

        if ($forza == false) {
            $this->verificaCompatibilitaCamicia($this->colloCamicia, $this->toraceCamicia, $this->girovitaCamicia, $this->spalleCamicia, $this->bracciaCamicia, $this->polsoCamicia, $this->lunghezzaCamicia);
        } else {
            $this->showErrors = false;
        }

        if ($this->showErrors) {
            return;
        }

        // Save to database if user is logged in
        $data = [
            'tipo_misura' => $this->currentMisure,
            'taglia' => null,
            'unita_misura' => $this->unitaMisure,
            'collo' => $this->colloCamicia,
            'torace' => $this->toraceCamicia,
            'girovita' => $this->girovitaCamicia,
            'spalle' => $this->spalleCamicia,
            'braccia' => $this->bracciaCamicia,
            'polso' => $this->polsoCamicia,
            'lunghezza' => $this->lunghezzaCamicia,
            'fit_preference' => $this->vestibilita
        ];

        // Save to database if user is logged in
        if (Auth::check()) {
            Measurement::updateOrCreate(['user_id' => Auth::id()], $data);
        }

        $this->misure = [
            'Tipo misura' => $this->currentMisure,
            'Unità di misura' => $this->unitaMisure,
            'Collo' => $this->colloCamicia,
            'Torace' => $this->toraceCamicia,
            'Girovita' => $this->girovitaCamicia,
            'Spalle' => $this->spalleCamicia,
            'Manica' => $this->bracciaCamicia,
            'Polso' => $this->polsoCamicia,
            'Lunghezza' => $this->lunghezzaCamicia,
            'Vestibilità' => $this->vestibilita
        ];
        session([
            'colloCamicia' => $this->colloCamicia,
            'toraceCamicia' => $this->toraceCamicia,
            'girovitaCamicia' => $this->girovitaCamicia,
            'spalleCamicia' => $this->spalleCamicia,
            'bracciaCamicia' => $this->bracciaCamicia,
            'polsoCamicia' => $this->polsoCamicia,
            'lunghezzaCamicia' => $this->lunghezzaCamicia,
            'vestibilita' => $this->vestibilita,
            'misure' => $this->misure,
            'status' => 'Misure applicate con successo'
        ]);
    }

    public function setFase($newFase)
    {
        $this->fase = $newFase;
        $this->vistainterna = '3d';
        session(['fase' => $newFase, 'vistainterna' => '3d']);
        if ($newFase == 'tessuti' || $newFase == 'personalizzazione') {
            $this->updateKit(2);
        } else {
            $this->updateKit(1);
        }
    }

    public function updateCollar($collarId, $collarMaterial)
    {
        //dd($collarId, $collarMaterial);
        $this->currentCollar = $collarId;
        $this->currentCollarMaterial = $collarMaterial;
        session(['currentCollar' => $collarId, 'currentCollarMaterial' => $collarMaterial]);

    }
    public function updateManica($manicaId, $manicaMaterial)
    {
        $this->currentManica = $manicaId;
        $this->currentManicaMaterial = $manicaMaterial;
        session(['currentManica' => $manicaId, 'currentManicaMaterial' => $manicaMaterial]);
    }
    public function updatePolsino($polsinoId, $polsinoMaterial)
    {
        $this->currentPolsino = $polsinoId;
        $this->currentPolsinoMaterial = $polsinoMaterial;
        session(['currentPolsino' => $polsinoId, 'currentPolsinoMaterial' => $polsinoMaterial]);
    }
    public function updateTaschino($taschinoId, $taschinoMaterial)
    {
        $this->currentTaschino = $taschinoId;
        $this->currentTaschinoMaterial = $taschinoMaterial;
        session(['currentTaschino' => $taschinoId, 'currentTaschinoMaterial' => $taschinoMaterial]);
    }
    public function updateFronte($fronteId, $fronteMaterial)
    {
        $this->currentFronte = $fronteId;
        $this->currentFronteMaterial = $fronteMaterial;
        session(['currentFronte' => $fronteId, 'currentFronteMaterial' => $fronteMaterial]);
    }
    public function updateDietro($dietroId, $dietroMaterial)
    {
        $this->currentDietro = $dietroId;
        $this->currentDietroMaterial = $dietroMaterial;
        session(['currentDietro' => $dietroId, 'currentDietroMaterial' => $dietroMaterial]);
    }
    public function updateButton($buttonId, $buttonColor)
    {
        $this->currentButton = $buttonId;
        $this->currentButtonColor = $buttonColor;
        session(['currentButton' => $buttonId, 'currentButtonColor' => $buttonColor]);
    }
    public function updateAsola($buttonholeId, $buttonholeColor)
    {
        $this->currentAsola = $buttonholeId;
        $this->currentAsolaColor = $buttonholeColor;
        session(['currentAsola' => $buttonholeId, 'currentAsolaColor' => $buttonholeColor]);
    }

    public function saveInitials()
    {

        //$this->initials = (string) $this->initials;
        //$this->iniPosition = $this->iniPosition;
        //$this->iniColor = $this->iniColor;
        //$this->iniStyle = $this->iniStyle;

        //session(['initials' => $this->initials]);
        session(['iniPosition' => $this->iniPosition]);
        session(['iniColor' => $this->iniColor]);
        session(['iniStyle' => $this->iniStyle]);
    }

    public function setTrayon()
    {
        $this->vistainterna = 'tryon';
        session(['vistainterna' => 'tryon']);
        $this->savedPath = null;

    }
    public function salvaPoster($data, $foto)
    {



        // 1. Trova l'immagine del modello
        $modelImagePath = null;
        $photo = basename($foto);

        if (Str::contains($foto, 'user_photos')) {
            $modelImagePath = asset('storage/user_photos/' . $photo);
        } else {
            $modelImagePath = asset('tryon/' . $photo);
        }




        // 2. Verifica l'immagine del poster

        // Rimuove il prefisso 'data:image/png;base64,'
        $base64 = preg_replace('/^data:image\/webp;base64,/', '', $data);
        $decoded = base64_decode($base64);

        // Salva il file
        $filename = 'poster-' . time() . '.webp';
        $posterT = 'posters/' . $filename;

        Storage::disk('public')->put($posterT, $decoded);


        $filename = basename($filename); // Assicurati che $filename sia definito


        $clothImagePath = asset(('storage/posters/' . $filename));




        // 3. Effettua la richiesta HTTP
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.fashn.api_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.fashn.ai/v1/run', [
                    'model_name' => 'tryon-v1.6',
                    'inputs' => [
                        'model_image' => $modelImagePath,
                        'garment_image' => $clothImagePath,
                        'category' => 'tops',
                        'mode' => 'quality',
                    ]

                ]);

        $jobId = $response->json()['id'];

        $status = null;
        $maxAttempts = 10;
        $attempt = 0;

        do {
            sleep(4); // aspetta 2 secondi

            $check = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.fashn.api_key'),
            ])->get("https://api.fashn.ai/v1/status/{$jobId}");

            $data = $check->json();
            $status = $data['status'];
            $attempt++;

        } while ($status === 'processing' && $attempt < $maxAttempts);

        if ($status === 'completed') {
            $outputUrl = $data['output'][0]; // o altro campo se c'è
            // Do something with it
            //dd("Immagine pronta!", $outputUrl);
            $this->savedPath = $outputUrl;
        } elseif ($status === 'failed') {
            dd("Errore generazione immagine:", $data['error']);
        }


    }







    public function apriFiltra($categoria, $filtri)
    {

        if ($categoria === 'colletti') {

            if (!empty($filtri['id'][0])) {
                $this->updateCollar($filtri['id']['0'], $filtri['materiale']['0']);
                $this->dispatch('clickColletto', $filtri['materiale']['0'], $this->currentButtonColor, $this->currentAsolaColor);
            }
        } elseif ($categoria === 'polsini') {
            if (!empty($filtri['id'][0])) {
                $this->updatePolsino($filtri['id']['0'], $filtri['materiale']['0']);
                $this->dispatch('clickPolsino', $filtri['materiale']['0'], $this->currentButtonColor, $this->currentAsolaColor);
            }
        } elseif ($categoria === 'maniche') {
            if (!empty($filtri['id'][0])) {
                $this->updateManica($filtri['id']['0'], $filtri['materiale']['0']);
                $this->dispatch('clickManica', $filtri['materiale']['0'], $this->currentButtonColor, $this->currentAsolaColor, $this->currentPolsinoMaterial);
            }
        } elseif ($categoria === 'fronte') {
            if (!empty($filtri['id'][0])) {
                $this->updateFronte($filtri['id']['0'], 'front');
                $this->dispatch('clickFronte', $filtri['id']['0']);
            }
        } elseif ($categoria === 'dietro') {
            if (!empty($filtri['id'][0])) {
                $this->updateDietro($filtri['id']['0'], $filtri['materiale']['0']);
                $this->dispatch('clickDietro', $filtri['id']['0']);
            }
        } elseif ($categoria === 'taschini') {
            if (!empty($filtri['id'][0])) {
                $this->updateTaschino($filtri['id']['0'], $filtri['materiale']['0']);
                $this->dispatch('clickTaschino', $filtri['id']['0']);
            }
        } elseif ($categoria === 'asole') {
            if (!empty($filtri['id'][0])) {
                $this->updateAsola($filtri['id']['0'], $filtri['colore']['0']);
                $this->dispatch('clickAsola', $filtri['colore']['0']);
            }
        } elseif ($categoria === 'bottoni') {
            if (!empty($filtri['id'][0])) {
                $this->updateButton($filtri['id']['0'], $filtri['colore']['0']);
                $this->dispatch('clickBottone', $filtri['colore']['0']);
            }
        } elseif ($categoria === 'iniziali') {
            $this->updateView('iniziali');
            if (!empty($filtri['testo'][0])) {
                $this->initials = $filtri['testo'][0];
            }
        }

    }
    public function filtraTessuti($filtri)
    {
        $this->resetFilters();

        if (!empty($filtri['materiale'])) {
            $this->selectedMaterials = $filtri['materiale'];
        }

        if (!empty($filtri['disegno'])) {
            $this->selectedDesigns = $filtri['disegno'];
        }

        if (!empty($filtri['colore'])) {
            $this->selectedColors = $filtri['colore'];
        }

        if (!empty($filtri['armatura'])) {
            $this->selectedArmature = $filtri['armatura'];
        }

        if (!empty($filtri['brand'])) {
            $this->selectedBrands = $filtri['brand'];
        }


        $this->applyFilters();
        $this->setFase('tessuti');
        $this->updateKit(2);
    }

    public function send()
    {

        if (trim($this->message) === '')
            return;

        // 1. Salvo subito il messaggio dell'utente
        $this->messages[] = [
            'from' => 'user',
            'text' => $this->message,
        ];

        // 2. Pulisco l'input per la UI
        $userMessage = $this->message;
        $this->message = '';

        // 3. Aggiungo le caratteristiche disponibili

        $collettiDisponibili = $this->colletti->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $manicheDisponibili = $this->maniche->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $polsiniDisponibili = $this->polsini->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $fronteDisponibili = $this->fronte->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $dietroDisponibili = $this->dietro->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $taschiniDisponibili = $this->taschini->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'materiale' => $c->material,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $bottoniDisponibili = $this->bottoni->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'colore' => $c->colore,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $asoleDisponibili = $this->asole->map(fn($c) => [
            'id' => $c->id,
            'nome' => $c->nome,
            'colore' => $c->colore,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $tessutiDisponibili = $this->tessuti->map(function ($t) {
            return [
                'id' => $t->id,
                'nome' => $t->nome,
                'slug' => $t->slug,
                'materiale' => optional($t->materiali)->nome,
                'disegno' => optional($t->disegni)->nome,
                'colori' => $t->colori->pluck('nome')->all(),
                'brand' => optional($t->brands)->nome,
                'armatura' => optional($t->armature)->nome,
                'immagine' => $t->image
            ];
        })->values()->toJson(JSON_UNESCAPED_UNICODE);

        $armatureDisponibili = Armor::all()->map(fn($a) => [
            'id' => $a->id,
            'nome' => $a->nome,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);


        $coloriDisponibili = Color::all()->map(fn($a) => [
            'id' => $a->id,
            'nome' => $a->nome,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $disegniDisponibili = Design::all()->map(fn($a) => [
            'id' => $a->id,
            'nome' => $a->nome,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $materialiDisponibili = Material::all()->map(fn($a) => [
            'id' => $a->id,
            'nome' => $a->nome,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);

        $brandsDisponibili = Brand::all()->map(fn($a) => [
            'id' => $a->id,
            'nome' => $a->nome,
        ])->values()->toJson(JSON_UNESCAPED_UNICODE);




        $template = file_get_contents(resource_path('prompts/parser.txt'));

        $prompt = str_replace([
            '<<< COMANDO UTENTE QUI >>>',
            '<<< COLLETTI DISPONIBILI >>>',
            '<<< MANICHE DISPONIBILI >>>',
            '<<< POLSINI DISPONIBILI >>>',
            '<<< FRONTE DISPONIBILI >>>',
            '<<< DIETRO DISPONIBILI >>>',
            '<<< TASCHINI DISPONIBILI >>>',
            '<<< ASOLE DISPONIBILI >>>',
            '<<< BOTTONI DISPONIBILI >>>',
            '<<< TESSUTI DISPONIBILI >>>',
            '<<< ARMATURE DISPONIBILI >>>',
            '<<< COLORI DISPONIBILI >>>',
            '<<< DISEGNI DISPONIBILI >>>',
            '<<< MATERIALI DISPONIBILI >>>',
            '<<< BRANDS DISPONIBILI >>>'
        ], [
            $userMessage,
            $collettiDisponibili,
            $manicheDisponibili,
            $polsiniDisponibili,
            $fronteDisponibili,
            $dietroDisponibili,
            $taschiniDisponibili,
            $asoleDisponibili,
            $bottoniDisponibili,
            $tessutiDisponibili,
            $armatureDisponibili,
            $coloriDisponibili,
            $disegniDisponibili,
            $materialiDisponibili,
            $brandsDisponibili
        ], $template);


        try {
            $response = Http::withToken(config('openai.api_key'))->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Sei un assistente UX per un configuratore 3D.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 0.2,
            ]);



            // risposta ai
            $json = $response->json();

            $aiText = json_decode($json['choices'][0]['message']['content'], true);

            //dd($aiText);


            if (!$aiText || !isset($aiText['azione'])) {
                // fallback o errore
                return;
            }


            if ($aiText['azione'] === 'apriScheda') {
                $scheda = $aiText['scheda'] ?? null;
                $categoria = $aiText['categoria'] ?? null;

                if ($scheda === 'tessuti' || ($scheda === 'personalizzazione' && $categoria === 'tessuti')) {
                    $this->setFase('tessuti');
                    //$this->updateView('tessuti');
                    $this->updateKit(2);
                } elseif ($scheda === 'misure' || ($scheda === 'personalizzazione' && $categoria === 'misure')) {
                    $this->setFase('misure');
                    //$this->updateView('tessuti');
                    $this->updateKit(1);
                } elseif ($scheda === 'tryon' || ($scheda === 'personalizzazione' && $categoria === 'tryon')) {
                    $this->setFase('tryon');
                    //$this->updateView('tessuti');
                    $this->updateKit(1);
                } elseif ($scheda === 'iniziali' || ($scheda === 'personalizzazione' && $categoria === 'iniziali')) {
                    $this->setFase('personalizzazione');
                    $this->updateView('iniziali');
                    $this->updateKit(2);

                } elseif ($scheda === 'personalizzazione' && isset($categoria)) {
                    $this->setFase('personalizzazione');
                    $this->updateView($categoria);
                    $this->updateKit(2);
                } else {
                    $this->setFase('personalizzazione');
                    $this->updateKit(1);
                }

            } elseif (($aiText['azione'] === 'filtra' || $aiText['azione'] === 'filtraTessuti') && isset($aiText['elementi'])) {
                foreach ($aiText['elementi'] as $elemento) {
                    $categoria = $elemento['categoria'] ?? null;
                    $filtri = $elemento['filtri'] ?? [];

                    match ($categoria) {
                        'tessuti' => $this->filtraTessuti($filtri),
                        'colletti' => $this->apriFiltra('colletti', $filtri),
                        'maniche' => $this->apriFiltra('maniche', $filtri),
                        'polsini' => $this->apriFiltra('polsini', $filtri),
                        'fronte' => $this->apriFiltra('fronte', $filtri),
                        'dietro' => $this->apriFiltra('dietro', $filtri),
                        'taschini' => $this->apriFiltra('taschini', $filtri),
                        'bottoni' => $this->apriFiltra('bottoni', $filtri),
                        'asole' => $this->apriFiltra('asole', $filtri),
                        'iniziali' => $this->apriFiltra('iniziali', $filtri),
                        default => null
                    };
                }
            } elseif ($aiText['azione'] === 'vaiTessuto') {
                $filtri = $elemento['filtri'] ?? [];
                dd($filtri['slug']);
                return redirect()->to($filtri['slug']); // oppure emit per JS redirect
            } elseif ($aiText['azione'] === 'redirect') {
                $redirect = $aiText['redirect'] ?? null;
                return redirect()->to($redirect); // oppure emit per JS redirect
            }


        } catch (\Exception $e) {
            $aiText = '⚠️ Errore nella richiesta AI.';
        }


    }




    public function render()
    {
        return view('livewire.shirt-configurator');
    }
}
