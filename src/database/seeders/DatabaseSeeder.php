<?php

namespace Database\Seeders;

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
<<<<<<< HEAD
        $this->call(WeightTargetsTableSeeder::class);
        $this->call(WeightLogsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
=======
        $this->call(WeightTargetTableSeeder::class);
        $this->call(WeightLogsTableSeeder::class);
>>>>>>> origin/main
    }
}
