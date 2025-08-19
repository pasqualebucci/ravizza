<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Button;

class ButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'White buttons',
                'it' => 'Bottoni bianchi',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_bianco.jpg',
            'colore' => '#dfdfdf',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Blue buttons',
                'it' => 'Bottoni blu',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_blu.jpg',
            'colore' => '#153069',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Light blue buttons',
                'it' => 'Bottoni celesti',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_celeste.jpg',
            'colore' => '#63829a',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Gray buttons',
                'it' => 'Bottoni grigi',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_grigio.jpg',
            'colore' => '#919396',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Black buttons',
                'it' => 'Bottoni neri',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_nero.jpg',
            'colore' => '#323232',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Red buttons',
                'it' => 'Bottoni rossi',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_rosso.jpg',
            'colore' => '#d83a34',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Orange buttons',
                'it' => 'Bottoni arancioni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_arancio.jpg',
            'colore' => '#e47d00',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Green buttons',
                'it' => 'Bottoni verdi',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_verde.jpg',
            'colore' => '#008c00',
        ]);
        Button::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pink buttons',
                'it' => 'Bottoni rosa',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttons/bottone_rosa.jpg',
            'colore' => '#c45579',
        ]);
    }
}
