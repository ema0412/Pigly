<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\WeightLog;
=======
use App\Models\WeightLogs;
>>>>>>> origin/main
use Illuminate\Database\Seeder;

class WeightLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        WeightLog::factory()->count(35)->create();
=======
        Logs::factory()->count(35)->create();
>>>>>>> origin/main
    }
}
