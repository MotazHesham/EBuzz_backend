<?php

use Illuminate\Database\Seeder;
use App\Models\Emergency;

class EmergencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 20 ; $i++) {
            $emergency = new Emergency();
            $emergency->date = "2021/02/".rand(01,16) ." ". rand(10,23).":".rand(10,59).":00";
            $emergency->latitude = 30.1630622;
            $emergency->longitude = 31.4761462;
            $emergency->user_id = rand(1,20);
            $emergency->save();
        }
    }
}
