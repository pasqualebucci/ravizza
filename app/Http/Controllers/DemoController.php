<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texture;
use App\Models\Collar;
use App\Models\Button;
use App\Models\Buttonhole;
use App\Models\Sleeve;
use App\Models\Cuff;
use App\Models\Pocket;
use App\Models\Front;
use App\Models\Back;

use App\Models\Mcolor;
use App\Models\Mposition;
use App\Models\Mstyle;

use App\Models\Setting;

use App\Models\Material;
use App\Models\Design;
use App\Models\Color;
use App\Models\Armor;
use App\Models\Brand;

class DemoController extends Controller
{
    public function __construct()
    {
        $locale = session('locale', 'it');
        app()->setLocale($locale);
    }
    public function index()
    {
        return view('welcome');
    }

    public function show(Request $request)
    {
        session(['previous_fabric_url' => '/fabric/' . $request->slug]);

        $viewData = array_merge(
            $this->getTessuti($request->slug),
            $this->getComponentiBase(),
            $this->getOpzioniIniziali(),
            $this->getElencoFiltri(),
            $this->getSettings()
        );

        $viewData['locale'] = app()->getLocale();

        return view('demo', $viewData);
    }

    private function getTessuti(string $slug): array
    {
        return [
            'tessuto' => Texture::where('slug', $slug)->first(),
            'tessuti' => Texture::where('attivo', true)->orderBy('created_at', 'desc')->get(),
        ];
    }

    private function getComponentiBase(): array
    {
        return [
            'colletti' => Collar::where('attivo', true)->get(),
            'bottoni' => Button::where('attivo', true)->get(),
            'asole' => Buttonhole::where('attivo', true)->get(),
            'maniche' => Sleeve::where('attivo', true)->get(),
            'polsini' => Cuff::where('attivo', true)->get(),
            'taschini' => Pocket::where('attivo', true)->get(),
            'fronte' => Front::where('attivo', true)->get(),
            'dietro' => Back::where('attivo', true)->get(),
        ];
    }

    private function getOpzioniIniziali(): array
    {
        return [
            'inicolor' => Mcolor::all(),
            'iniposition' => Mposition::all(),
            'inistyle' => Mstyle::all(),
        ];
    }

    private function getElencoFiltri(): array
    {
        return [
            'elenco' => [
                'materiali' => Material::all(),
                'disegni' => Design::all(),
                'colori' => Color::all(),
                'brands' => Brand::all(),
                'armature' => Armor::all(),
            ]
        ];
    }

    private function getSettings(): array
    {
        return [
            'settings' => optional(Setting::first())->toArray()
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string',
            'message' => 'required|string',
        ]);

        // salva nel DB, manda email, ecc.
        // Mail::to('tuo@email.it')->send(new ShirtlyRequestMail($data));

        return back()->with('success', 'Richiesta inviata con successo!');
    }
}
