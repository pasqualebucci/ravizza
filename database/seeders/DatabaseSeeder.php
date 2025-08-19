<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Pasquale Bucci',
            'email' => 'paky.bucci@gmail.com',
            'password' => "password"
        ]);
        User::create([
            'name' => 'Titti Filomeno',
            'email' => 'titti@titti.it',
            'password' => "password"
        ]);
        User::create([
            'name' => 'Simona D\'Ignazio',
            'email' => 'simo@simo.it',
            'password' => "password"
        ]);
        User::create([
            'name' => 'Rita Quarta',
            'email' => 'rita@rita.it',
            'password' => "password"
        ]);

        $this->call([
            ArmorSeeder::class,
            BrandSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            DesignSeeder::class,
            TextureSeeder::class,
            CollarSeeder::class,
            ButtonSeeder::class,
            ButtonholeSeeder::class,
            SleeveSeeder::class,
            CuffSeeder::class,
            FrontSeeder::class,
            BackSeeder::class,
            PocketSeeder::class,
            McolorSeeder::class,
            MpositionSeeder::class,
            MstyleSeeder::class,
            SettingSeeder::class,
            ProductBrandSeeder::class,
            ProductCategorySeeder::class,
            ProductSizeSeeder::class,
        ]);
    }
}
