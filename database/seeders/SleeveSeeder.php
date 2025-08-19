<?php

namespace Database\Seeders;

use App\Models\Sleeve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SleeveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sleeve::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Long Sleeve',
                'it' => 'Manica Lunga',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'sleeves/manica_1.jpg',
            'material' => 'manica_lunga',
        ]);
        Sleeve::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Short Sleeve',
                'it' => 'Manica Corta',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'sleeves/manica_2.jpg',
            'material' => 'manica_corta',
        ]);
        Sleeve::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pleated Sleeve',
                'it' => 'Manica a Pieghe',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'sleeves/manica_3.jpg',
            'material' => 'manica_pleated',
        ]);
    }
}
