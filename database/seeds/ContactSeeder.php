<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
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
            $contact = new Contact();
            $contact->first_name= $faker->firstName;
            $contact->last_name= $faker->lastName;
            $contact->phone = $faker->phoneNumber;
            $contact->user_id = rand(1,20);
            $contact->save();
        }
    }
}
