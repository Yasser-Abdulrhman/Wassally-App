<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin= User::create([
            'name' => 'superadmin',
            'email' => "superadmin@gmail.com",
            'email_verified_at' => now(),
            'phone' => '01092886654',
            'identity_card' => '01092886654',
            'address' => 'Assuit',
            'role' => 'superAdmin',
            'password' => bcrypt("yasser01092886654"),
            'area_id' => 1,
            // 'remember_token' => Str::random(10),
        ]);
        $superAdminRole = Role::where('name' ,'=' , 'superAdmin')->get();
        $superAdmin->assignRole($superAdminRole);

        $admin= User::create([
            'name' => 'Admin',
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'phone' => '01092886655',
            'identity_card' => '01092886655',
            'address' => 'Assuit',
            'role' => 'admin',
            'password' => bcrypt("yasser01092886655"),
            'area_id' => 1,
            // 'remember_token' => Str::random(10),
        ]);
        $adminRole = Role::where('name' ,'=' , 'admin')->get();
        $admin->assignRole($adminRole);

        $user= User::create([
            'name' => 'user',
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'phone' => '01092886656',
            'identity_card' => '01092886656',
            'address' => 'Assuit',
            'role' => 'user',
            'password' => bcrypt("yasser01092886656"),
            'area_id' => 2,
            // 'remember_token' => Str::random(10),
        ]);
        $userRole = Role::where('name' ,'=' , 'user')->get();
        $user->assignRole($userRole);

        $user= User::create([
            'name' => 'user2',
            'email' => "user2@gmail.com",
            'email_verified_at' => now(),
            'phone' => '0109288666',
            'identity_card' => '01092886666',
            'address' => 'Assuit',
            'role' => 'user',
            'password' => bcrypt("yasser01092886654"),
            'area_id' => 3,
            // 'remember_token' => Str::random(10),
        ]);
        $userRole = Role::where('name' ,'=' , 'user')->get();
        $user->assignRole($userRole);



    }
}
