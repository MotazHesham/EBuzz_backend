<?php

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1 ; $i <= 20 ; $i++) {
            $report = new Report();
            $report->reason =$faker->realText(10,2);
            $report->save();
        }
    }
}
