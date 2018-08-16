<?php

//namespace App\database\seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
         \LaptopsTableSeeder::class,
         \DeskTopsTableSeeder::class,
         \MonitorsTableSeeder::class,
        ]);
    }
}
