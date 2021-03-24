<?php

use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 20 ; $i++) {
            $feedback = new Feedback();
            $feedback->response = rand(0,1);
            $feedback->status = rand(0,1);
            $feedback->emergency_id = rand(1,20);
            $feedback->save();
        }
    }
}
