<?php

namespace Database\Seeders;

use App\Models\Armor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Armor::create([
            'nome' => [
                'en' => 'Chevron',
                'it' => 'Chevron'
            ],
        ]);
    }
}
