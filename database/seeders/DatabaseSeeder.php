<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(shopifyApiSeed::class);
        // $this->call(googleApiSeed::class);
        $this->call(FBApiSeed::class);
    }

}
