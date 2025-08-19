<?php

namespace Database\Seeders;
use App\Models\Collar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Narrow Collar',
                'it' => 'Colletto Stretto',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/stretto.jpg',
            'material' => 'colletto_stretto',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Classic Collar',
                'it' => 'Colletto Classico',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/classico.jpg',
            'material' => 'colletto_classico',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'High Classic Collar',
                'it' => 'Colletto Classico Alto',
            ],
            'prezzo' => 10.00,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => 'Two buttons',
                'it' => 'Due bottoni'
            ],
            'image' => 'collars/classico_alto.jpg',
            'material' => 'colletto_classico_alto',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Cutaway Collar',
                'it' => 'Colletto Spaccato',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/spaccato.jpg',
            'material' => 'colletto_spezzato',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Button Down Collar',
                'it' => 'Colletto Button Down',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/button_down.jpg',
            'material' => 'colletto_botton_down',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Tuxedo Collar',
                'it' => 'Colletto Diplomatico',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/diplomatico.jpg',
            'material' => 'colletto_diplomatico',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Korean Collar',
                'it' => 'Colletto Coreano',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'collars/coreano.jpg',
            'material' => 'colletto_base',
        ]);
        Collar::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'High Korean Collar',
                'it' => 'Colletto Coreano Alto',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => 'Two buttons',
                'it' => 'Due bottoni'
            ],
            'image' => 'collars/coreano_alto.jpg',
            'material' => 'colletto_base_alta',
        ]);
    }
}
