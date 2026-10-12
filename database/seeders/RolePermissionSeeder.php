<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions List
        $permissions = [
            'view dashboard',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view products',
            'create products',
            'edit products',
            'delete products',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view contacts',
            'create contacts',
            'edit contacts',
            'delete contacts',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdminRole->syncPermissions(Permission::all());

        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions([
            'view dashboard',
            'view products', 'create products', 'edit products', 'delete products',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view contacts', 'create contacts', 'edit contacts', 'delete contacts',
            'view users', 'create users', 'edit users',
        ]);

        $managerRole = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
        $managerRole->syncPermissions([
            'view dashboard',
            'view products', 'create products', 'edit products',
            'view categories', 'create categories', 'edit categories',
            'view contacts', 'edit contacts',
        ]);

        $editorRole = Role::firstOrCreate(['name' => 'Editor', 'guard_name' => 'web']);
        $editorRole->syncPermissions([
            'view dashboard',
            'view products', 'create products', 'edit products',
            'view categories',
        ]);

        $supportRole = Role::firstOrCreate(['name' => 'Support', 'guard_name' => 'web']);
        $supportRole->syncPermissions([
            'view dashboard',
            'view contacts', 'edit contacts',
        ]);

        // Assign Super Admin role to existing users or create default admin if none
        $users = User::all();
        if ($users->isEmpty()) {
            $user = User::create([
                'name' => 'Developer',
                'email' => 'developer@gmail.com',
                'password' => Hash::make('password123'),
                'type' => 'admin',
                'status' => 1,
            ]);
            $user->assignRole('Super Admin');
        } else {
            foreach ($users as $u) {
                if (!$u->hasRole('Super Admin')) {
                    $u->assignRole('Super Admin');
                }
            }
        }
    }
}
