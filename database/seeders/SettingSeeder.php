<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'company_name' => 'Shirtly',
            'address' => 'Via Anfiteatro 176',
            'citta' => 'Taranto',
            'provincia' => 'TA',
            'cap' => '74123',
        ]);
    }
}
