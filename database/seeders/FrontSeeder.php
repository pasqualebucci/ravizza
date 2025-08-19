<?php

namespace Database\Seeders;

use App\Models\Front;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Front::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Classic Closing',
                'it' => 'Chiusura Classica',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'fronts/fronte_1.jpg',
            'material' => 'front',
        ]);
        Front::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Hidden Closing',
                'it' => 'Chiusura Nascosta',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'fronts/fronte_2.jpg',
            'material' => 'front',
        ]);
    }
}
