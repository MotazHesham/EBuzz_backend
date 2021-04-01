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
        $i = 1;

        $reports = [
            [
                'id'    => $i++,
                'reason' => 'Noisy',
            ],
            [
                'id'    => $i++,
                'reason' => 'Fakings',
            ],
            [
                'id'    => $i++,
                'reason' => 'others',
            ],
        ];
        Report::insert($reports); 
    }
}
