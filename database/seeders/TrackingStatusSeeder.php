<?php

namespace Database\Seeders;

use App\Models\TrackingStatus;
use Illuminate\Database\Seeder;

class TrackingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'Accepted',
            'Preparing',
            'Picked',
            'In Transit',
            'Delivered',
            'Failed',
            'Reversed',

          ];

          foreach ($status as $st) {
               TrackingStatus::create(['name' => $st]);
          }
    }
}
