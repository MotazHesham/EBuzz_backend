<?php

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 20 ; $i++) {
            $notification = new Notification();
            $notification->user_id = rand(1,20);
            $notification->emergency_id = rand(1,20);
            $notification->save();
        }
    }
}
