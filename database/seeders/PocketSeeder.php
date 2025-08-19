<?php

namespace Database\Seeders;

use App\Models\Pocket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'No Pocket',
                'it' => 'No Taschino',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_0.jpg',
            'material' => '',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 1',
                'it' => 'Taschino 1',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_1.jpg',
            'material' => 'tasca_1',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 1 double',
                'it' => 'Taschino 1 doppio',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_2.jpg',
            'material' => 'tasca_1',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 2',
                'it' => 'Taschino 2',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_3.jpg',
            'material' => 'tasca_2',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 2 double',
                'it' => 'Taschino 2 doppio',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_4.jpg',
            'material' => 'tasca_2',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 3',
                'it' => 'Taschino 3',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_5.jpg',
            'material' => 'tasca_3',
        ]);
        Pocket::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pocket 3 double',
                'it' => 'Taschino 3 doppio',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'pockets/taschino_6.jpg',
            'material' => 'tasca_3',
        ]);
        
    }
}
