<?php

namespace Database\Seeders;
use App\Models\Mstyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MstyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mstyle::create([
            'nome' => [
                'en' => 'Style 1',
                'it' => 'Stile 1'
            ],
            'font_family' => 'Tangerine',
        ]);
        Mstyle::create([
            'nome' => [
                'en' => 'Style 2',
                'it' => 'Stile 2'
            ],
            'font_family' => 'Yellowtail',
        ]);
        Mstyle::create([
            'nome' => [
                'en' => 'Style 3',
                'it' => 'Stile 3'
            ],
            'font_family' => 'DM Serif Text',
        ]);
        Mstyle::create([
            'nome' => [
                'en' => 'Style 4',
                'it' => 'Stile 4'
            ],
            'font_family' => 'Courier Prime',
        ]); 
    }
}
