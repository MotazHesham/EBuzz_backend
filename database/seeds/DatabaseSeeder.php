<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ReportSeeder::class,
            // UserSeeder::class,
            // EmergencySeeder::class,
            // FeedbackSeeder::class,
            // NotificationSeeder::class,
            // ContactSeeder::class,
        ]);
    }
}
