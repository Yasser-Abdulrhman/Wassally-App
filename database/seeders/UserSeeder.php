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
        $user= User::create([
            'name' => 'superadmin',
            'email' => "superadmin@gmail.com",
            'email_verified_at' => now(),
            'phone' => '01092886654',
            'identity_card' => '01092886654',
            'address' => 'Assuit',
            'role' => 'superAdmin',
            'password' => bcrypt("yasser01092886654"),
            // 'remember_token' => Str::random(10),
        ]);

        $superAdmin = Role::where('name' ,'like' , 'superAdmin')->get();
        $user->assignRole($superAdmin);

    }
}
