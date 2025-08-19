<?php

namespace Database\Seeders;

use App\Models\Back;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Back::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Classic Back',
                'it' => 'Dietro Classico',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'backs/dietro_1.jpg',
            'material' => 'dietro_1',
        ]);
        Back::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Back 1 pleat',
                'it' => 'Dietro 1 piega',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'backs/dietro_2.jpg',
            'material' => 'dietro_2',
        ]);
        Back::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Back 2 pleat',
                'it' => 'Dietro 2 pieghe',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'backs/dietro_3.jpg',
            'material' => 'dietro_3',
        ]);
    }
}
