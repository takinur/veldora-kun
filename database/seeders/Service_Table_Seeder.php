<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class Service_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['service_name' => 'Regular', 'price' => 20 ],
            ['service_name' => 'Rush', 'price' => 35 ],
            ['service_name' => 'Hot Rush', 'price' => 50 ],

         ];

         foreach ($services as $service) {
            Service::create($service);
         }
    }
}
