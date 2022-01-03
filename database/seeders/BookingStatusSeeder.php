<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
           'Pending',
           'Booked',
           'Processing',
           'Complete',
           'Cancelled',
           'Returning',
           'Returned',

         ];

         foreach ($status as $st) {
              BookingStatus::create(['status' => $st]);
         }
    }
}
