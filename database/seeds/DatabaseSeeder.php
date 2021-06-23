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
            PermissionSeeder::class,
            RoleSeeder::class,
            PermissionRoleSeeder::class,
            CitySeeder::class,
            PostSeeder::class,
            // UserSeeder::class,
            // EmergencySeeder::class,
            // FeedbackSeeder::class,
            // NotificationSeeder::class,
            // ReportSeeder::class,
            // ContactSeeder::class,
            // VideoSeeder::class,
        ]);
    }
}
