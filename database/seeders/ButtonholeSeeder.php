<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buttonhole;

class ButtonholeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'White buttonholes',
                'it' => 'Asole bianche',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_bianca.jpg',
            'colore' => '#dfdfdf',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Blue buttonholes',
                'it' => 'Asole blu',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_blu.jpg',
            'colore' => '#153069',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Light blue buttonholes',
                'it' => 'Asole celesti',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_celeste.jpg',
            'colore' => '#63829a',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Gray buttonholes',
                'it' => 'Asole grigie',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_grigia.jpg',
            'colore' => '#919396',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Black buttonholes',
                'it' => 'Asole nere',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_nera.jpg',
            'colore' => '#323232',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Red buttonholes',
                'it' => 'Asole rosse',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_rossa.jpg',
            'colore' => '#d83a34',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Orange buttonholes',
                'it' => 'Asole arancioni',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_arancio.jpg',
            'colore' => '#e47d00',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Green buttonholes',
                'it' => 'Asole verdi',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_verde.jpg',
            'colore' => '#008c00',
        ]);
        Buttonhole::create([
            'attivo' => 1,
            'nome' => [
                'en' => 'Pink buttonholes',
                'it' => 'Asole rosa',
            ],
            'prezzo' => 0,
            'prezzo_scontato' => null,
            'descrizione' => [
                'en' => '',
                'it' => ''
            ],
            'image' => 'buttonholes/asola_rosa.jpg',
            'colore' => '#c45579',
        ]);
    }
}
