<?php

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
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
            $video = new Video();
            $video->video = $faker->realText(10,2);
            $video->emergency_id = rand(1,20);
            $video->save();
        }
    }
}
