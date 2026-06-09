<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage users',
            'manage departments',
            'manage categories',
            'view all tickets',
            'view department tickets',
            'view own tickets',
            'create tickets',
            'assign tickets',
            'update ticket status',
            'comment tickets',
            'add internal notes',
            'upload attachments',
            'view reports',
            'manage settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin'
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'Admin'
        ]);

        $departmentManager = Role::firstOrCreate([
            'name' => 'Department Manager'
        ]);

        $departmentAgent = Role::firstOrCreate([
            'name' => 'Department Agent'
        ]);

        $employee = Role::firstOrCreate([
            'name' => 'Employee'
        ]);

        $superAdmin->syncPermissions(Permission::all());

        $admin->syncPermissions([
            'manage users',
            'manage departments',
            'manage categories',
            'view all tickets',
            'assign tickets',
            'update ticket status',
            'comment tickets',
            'add internal notes',
            'upload attachments',
            'view reports',
        ]);

        $departmentManager->syncPermissions([
            'view department tickets',
            'assign tickets',
            'update ticket status',
            'comment tickets',
            'add internal notes',
            'upload attachments',
            'view reports',
        ]);

        $departmentAgent->syncPermissions([
            'view department tickets',
            'update ticket status',
            'comment tickets',
            'add internal notes',
            'upload attachments',
        ]);

        $employee->syncPermissions([
            'create tickets',
            'view own tickets',
            'comment tickets',
            'upload attachments',
        ]);
    }
}
