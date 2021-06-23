<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $cities = ['Giza','6th of October','helwan'];


        for ($i = 1 ; $i <= 20 ; $i++) {
        $city=new City();
        $city->name=$cities[rand(0,1,2)];

    }
}
}
