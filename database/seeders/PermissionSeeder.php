<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'role-list' , 'description' => 'Show all roles','guard_name'  =>  'api'],
            ['name' => 'role-create' , 'description' => 'Create new role','guard_name'  =>  'api'],
            ['name' => 'role-edit' , 'description' => 'Edit role','guard_name'  =>  'api'],
            ['name' => 'role-delete' , 'description' => 'Delete role','guard_name'  =>  'api'],
            ['name' => 'permission-list' , 'description' => 'Show all permissions','guard_name'  =>  'api'],
            ['name' => 'permission-create' , 'description' => 'Create new permissions','guard_name'  =>  'api'],
            ['name' => 'permission-edit' , 'description' => 'Edit permission','guard_name'  =>  'api'],
            ['name' => 'permission-delete' , 'description' => 'Delete permission','guard_name'  =>  'api'],
            ['name' => 'user-list' , 'description' => 'Show all users','guard_name'  =>  'api'],
            ['name' => 'user-show' , 'description' => 'Show user details','guard_name'  =>  'api'],
            ['name' => 'user-create' , 'description' => 'Create new user','guard_name'  =>  'api'],
            ['name' => 'user-edit' , 'description' => 'Edit user','guard_name'  =>  'api'],
            ['name' => 'user-delete' , 'description' => 'Delete user','guard_name'  =>  'api'],
            ['name' => 'shipment-list' , 'description' => 'Show all shipments','guard_name'  =>  'api'],
            ['name' => 'shipment-create' , 'description' => 'Create new shipment','guard_name'  =>  'api'],
            ['name' => 'shipment-edit' , 'description' => 'Edit shipment','guard_name'  =>  'api'],
            ['name' => 'shipment-delete' , 'description' => 'Delete shipment','guard_name'  =>  'api'],
            ['name' => 'show-shipment-status' , 'description' => 'Show shipment status','guard_name'  =>  'api'],
            ['name' => 'edit-shipment-status' , 'description' => 'Edit shipment status','guard_name'  =>  'api'],
        ];
        foreach($permissions as $permission)
        {
          Permission::create($permission);
        }
    }
}
