<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            'No Thanks',
            'By Email',
            'By Phone',

         ];

         foreach ($notifications as $d) {
            Notification::create(['notification_name' => $d]);
         }
    }
}
