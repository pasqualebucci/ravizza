<?php

namespace Database\Seeders;
use App\Models\Mcolor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class McolorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mcolor::create([
            'nome' => [
                'en' => 'White',
                'it' => 'Bianco'
            ],
            'codice' => '#FFFFFF',
        ]);
        Mcolor::create([
            'nome' => [
                'en' => 'Red',
                'it' => 'Rosso'
            ],
            'codice' => '#d83a34',
        ]);
        Mcolor::create([
            'nome' => [
                'en' => 'Blue',
                'it' => 'Blu'
            ],
            'codice' => '#153069',
        ]);
    }
}
