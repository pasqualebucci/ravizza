<?php

namespace Database\Seeders;

use App\Models\Texture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Texture::create([
            'attivo' => 1,
            'nome' => [
                'it' => 'tessuto quadri blu'
            ],
            'slug' => 'tessuto-quadri-blu',
            'codice_interno' => null,
            'label' => [
                'it' => null
            ],
            'prezzo' => 123.00,
            'prezzo_scontato' => null,
            'descrizione' => [
                'it' => '<p>Tessuto morbido 100% Cotone Titolo trama: 80/1 Ordito: 100/2 Fili/cm: 53 Pick/cm: 48 Spessore/cm: 148-150 Peso g/ml: 140&nbsp;</p>'
            ],
            'descrizione_breve' => [
                'it' => '100% Cotone Popeline Quadri Blu'
            ],
            'image' => 'navigation/01JP0NR7K0P2WAJ10V20G16GWC.jpg',
            'fabric' => 'fabrics/01JP0NPYZG443QZ26DV52YM8T5.jpg',
            'armor_id' => null,
            'design_id' => null,
            'material_id' => 3,
            'brand_id' => 1,
        ]);

        Texture::create([
            'attivo' => 1,
            'nome' => [
                'it' => 'tessuto righe rosse'
            ],
            'slug' => 'tessuto-righe-rosse',
            'codice_interno' => null,
            'label' => [
                'it' => null
            ],
            'prezzo' => 23.00,
            'prezzo_scontato' => null,
            'descrizione' => [
                'it' => '<p>&nbsp;100% Cotone Popeline Righe Rosse&nbsp;</p>'
            ],
            'descrizione_breve' => [
                'it' => '100% Cotone Popeline Righe Rosse'
            ],
            'image' => 'navigation/01JQ6JT0E68D748CGNR76C8VX8.jpg',
            'fabric' => 'fabrics/01JQ6JRX149W69WNYQR1EQK85F.jpg',
            'armor_id' => 1,
            'design_id' => 2,
            'material_id' => 2,
            'brand_id' => 1,
        ]);

        Texture::create([
            'attivo' => 1,
            'nome' => [
                'it' => 'Tessuto righe multicolore su fondo bianco'
            ],
            'slug' => 'tessuto-righe-multi-su-bianco',
            'codice_interno' => null,
            'label' => [
                'it' => null
            ],
            'prezzo' => 103.00,
            'prezzo_scontato' => null,
            'descrizione' => [
                'it' => '<p>&nbsp;100% Cotone - Twill leggero di 80/1 COM</p>'
            ],
            'descrizione_breve' => [
                'it' => '100% Cotone Popeline Twill leggero di 80/1 COM'
            ],
            'image' => 'navigation/imagegiallo.jpg',
            'fabric' => 'fabrics/imagegiallo1.png',
            'armor_id' => 1,
            'design_id' => 2,
            'material_id' => 2,
            'brand_id' => 1,
        ]);
    }
}
