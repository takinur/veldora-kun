<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery = [
            'One Way',
            'Return Service',

         ];

         foreach ($delivery as $d) {
            Delivery::create(['delivery_name' => $d]);
         }
    }
}
