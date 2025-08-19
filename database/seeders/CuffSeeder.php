<?php

namespace Database\Seeders;
use App\Models\Cuff;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Straight Cuff',
                'it' => 'Polsino Dritto',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_1.jpg',
            'material' => 'polsino_1',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Rounded Cuff',
                'it' => 'Polsino Arrotondato',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_2.jpg',
            'material' => 'polsino_2',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Beveled Cuff',
                'it' => 'Polsino Smussato',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_3.jpg',
            'material' => 'polsino_3',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Straight Cuff 2 buttons',
                'it' => 'Polsino Dritto 2 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_4.jpg',
            'material' => 'polsino_4',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Rounded Cuff 2 buttons',
                'it' => 'Polsino Arrotondato 2 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_5.jpg',
            'material' => 'polsino_5',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Beveled Cuff 2 buttons',
                'it' => 'Polsino Smussato 2 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_6.jpg',
            'material' => 'polsino_6',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Straight Cuff 3 buttons',
                'it' => 'Polsino Dritto 3 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_7.jpg',
            'material' => 'polsino_7',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Rounded Cuff 3 buttons',
                'it' => 'Polsino Arrotondato 3 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_8.jpg',
            'material' => 'polsino_8',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Beveled Cuff 3 buttons',
                'it' => 'Polsino Smussato 3 bottoni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_9.jpg',
            'material' => 'polsino_9',
        ]);
        Cuff::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Cufflinks Cuff',
                'it' => 'Polsino Gemelli',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'cuffs/polsino_10.jpg',
            'material' => 'polsino_10',
        ]);
    }
}
