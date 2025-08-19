<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSize::create([
            'nome' => 'XS'
        ]);
        ProductSize::create([
            'nome' => 'S'
        ]);
        ProductSize::create([
            'nome' => 'M'
        ]);
        ProductSize::create([
            'nome' => 'L'
        ]);
        ProductSize::create([
            'nome' => 'XL'
        ]);
        ProductSize::create([
            'nome' => 'XXL'
        ]);
    }
}
