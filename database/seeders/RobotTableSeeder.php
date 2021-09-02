<?php

namespace Database\Seeders;

use App\Models\Robot;
use Illuminate\Database\Seeder;

class RobotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Robot::factory()
            ->count(100)
            ->create();
    }
}
