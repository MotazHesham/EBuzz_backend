<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        $cities = ['Giza','6th of October'];
    
        $roads = ['Al Wahat Road', 'Side Mohamed Naguib Axis'];

        $GENDER =  [
            'male',
            'female',
        ];

        $faker = Faker\Factory::create();
        for ($i = 1 ; $i <= 20 ; $i++) {
            $user = new User();
            $user->first_name= $faker->firstName;
            $user->last_name= $faker->lastName;
            $user->phone = $faker->phoneNumber;
            $user->address= $faker->address;
            $user->age= rand(10,30);
            $user->gender= $GENDER[rand(0,1)];
            $user->sms_alert = $faker->realText(10,2);
            $user->country = 'Egypt';
            $user->country_code = 'eg';
            $user->state = 'Giza Governorate';
            $user->city = $cities[rand(0,1)];
            $user->road = $roads[rand(0,1)];
            $user->password= bcrypt('123456');
            $user->block = 0;
            $user->latitude = 30.1630622;
            $user->longitude = 31.4761462;
            $user->role_id = rand(1,2);
            $user->save();
        }
    }
}
