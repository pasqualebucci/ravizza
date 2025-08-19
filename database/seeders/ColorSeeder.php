<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create([
            'nome' => [
                'en' => 'White',
                'it' => 'Bianco'
            ],
            'codice' => '#FFFFFF'
        ]);
        Color::create([
            'nome' => [
                'en' => 'Red',
                'it' => 'Rosso'
            ],
            'codice' => '#FF0000'
        ]);
        Color::create([
            'nome' => [
                'en' => 'Blue',
                'it' => 'Blu'
            ],
            'codice' => '#0000FF'
        ]);
    }
}
