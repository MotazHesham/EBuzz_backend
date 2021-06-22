<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        for ($i = 1 ; $i <= 20 ; $i++) {

            $Post=new post();
            $Post->user_id=rand(1,20);
            $Post->description='there is an accedent in 6th of october and There are a number of victims and injured people who need ambulances and utmost help ';
            $Post->city_id = rand(1,20);
            $Post->status = rand(0,1);
            $Post->save();

    }
}
}
