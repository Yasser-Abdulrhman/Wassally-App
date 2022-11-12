<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superAdminPermissions=[
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'assign-role-to-user',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'give-permissions-to-user',
            'user-list',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',
            'shipment-list',
            'shipment-create',
            'shipment-edit',
            'shipment-delete',
            'show-shipment-status',
            'edit-shipment-status',
        ];
        $adminPermissions=[
            'shipment-list',
            'shipment-create',
            'shipment-edit',
            'shipment-delete',
            'show-shipment-status',
            'edit-shipment-status',
        ];

        $userPermissions=[
            'show-shipment-status',
            'shipment-list',
            'shipment-create',
            'shipment-edit',
            'shipment-delete',

        ];

        $superAdmin= Role::create(['guard_name' => 'api','name' => 'superAdmin']);
        $superAdmin->givePermissionTo(Permission::whereIn('name', $superAdminPermissions)->get());

        $admin= Role::create(['guard_name' => 'api','name' => 'admin']);
        $admin->givePermissionTo(Permission::whereIn('name', $adminPermissions)->get());

        $user= Role::create(['guard_name' => 'api','name' => 'user']);
        $user->givePermissionTo(Permission::whereIn('name', $userPermissions)->get());

    }
}
