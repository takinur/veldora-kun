<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        //Seed all Seeders
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            Service_Table_Seeder::class,
            DeliverySeeder::class,
            NotificationSeeder::class,
            PackageTypeSeeder::class,
            RoleSeeder::class,
            BookingStatusSeeder::class,
            TrackingStatusSeeder::class,


        ]);
    }
}
