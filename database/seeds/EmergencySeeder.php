<?php

use Illuminate\Database\Seeder;
use App\Models\Emergency;

class EmergencySeeder extends Seeder
{

    public function run()
    {
    
        $cities = ['Giza','6th of October'];
    
        $roads = ['Al Wahat Road', 'Side Mohamed Naguib Axis'];

        for ($i = 1 ; $i <= 20 ; $i++) {
            $emergency = new Emergency();
            $emergency->date = "2021/02/".rand(01,16) ." ". rand(10,23).":".rand(10,59).":00";
            $emergency->latitude = 30.1630622;
            $emergency->longitude = 31.4761462;
            $emergency->country = 'Egypt';
            $emergency->country_code = 'eg';
            $emergency->state = 'Giza Governorate';
            $emergency->city = $cities[rand(0,1)];
            $emergency->road = $roads[rand(0,1)];
            $emergency->user_id = rand(1,20);
            $emergency->save();
        }
    }
}
