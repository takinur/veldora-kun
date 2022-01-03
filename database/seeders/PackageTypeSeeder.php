<?php

namespace Database\Seeders;

use App\Models\PackageType;
use Illuminate\Database\Seeder;


class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            ['packageType_name' => 'Mail', 'price' => 0 ],
            ['packageType_name' => 'Document', 'price' => 0 ],
            ['packageType_name' => 'Private Document', 'price' => 10 ],
         ];

         foreach ($packages as $d) {
            PackageType::create($d);
         }


    }
}
