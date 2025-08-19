<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'nome' => [
                'en' => 'Belts',
                'it' => 'Cinte'
            ],
        ]);
        ProductCategory::create([
            'nome' => [
                'en' => 'Twins',
                'it' => 'Gemelli'
            ],
        ]);
    }
}
