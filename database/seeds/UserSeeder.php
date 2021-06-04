<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    

    public function run()
    {
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
            $user->password= bcrypt('123456');
            $user->city = $faker->state;
            $user->country = $faker->country;
            $user->block = 0;
            $user->latitude = 30.1630622;
            $user->longitude = 31.4761462;
            $user->role_id = rand(1,2);
            $user->save();
        }
    }
}
