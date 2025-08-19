<?php

namespace Database\Seeders;
use App\Models\Mposition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MpositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mposition::create([
            'nome' => [
                'en' => 'Up',
                'it' => 'Sopra'
            ],
        ]);
        Mposition::create([
            'nome' => [
                'en' => 'Center',
                'it' => 'Centro'
            ],
        ]);
        Mposition::create([
            'nome' => [
                'en' => 'Down',
                'it' => 'Sotto'
            ],
        ]);
        Mposition::create([
            'nome' => [
                'en' => 'Cuff',
                'it' => 'Polsino'
            ],
        ]);
    }
}
