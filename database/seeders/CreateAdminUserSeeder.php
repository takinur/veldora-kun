<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',    //admin@admin.com  12345
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'approved_at' => now(),
        ]);


        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // Blogger/Writer
        $user = User::create([
            'name' => 'Writer',
            'email' => 'writer@courierinmoscow.com',    //writer@courierinmoscow.com  $12345writer@courierinmoscow
            'password' => bcrypt('$12345writer@courierinmoscow.com'),
            'email_verified_at' => now(),
            'approved_at' => now(),
        ]);

    }
}
