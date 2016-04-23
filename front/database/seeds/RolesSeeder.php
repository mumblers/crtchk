<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'Default role for new users',
        ]);
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrators',
        ]);
        
        // Create permissions
        $viewSettingsPermission = Permission::create([
            'name' => 'View settings',
            'slug' => 'view.settings',
        ]);
        
        $editSettingsPermission = Permission::create([
            'name' => 'Edit settings',
            'slug' => 'edit.settings',
        ]);
        
        $viewProfilePermission = Permission::create([
            'name' => 'View profile',
            'slug' => 'view.profile',
        ]);
        
        $editProfilePermission = Permission::create([
            'name' => 'Edit profile',
            'slug' => 'edit.profile',
        ]);
        
        $viewDomainsPermission = Permission::create([
            'name' => 'View domains',
            'slug' => 'view.domains',
        ]);
        
        $editDomainsPermission = Permission::create([
            'name' => 'Edit domains',
            'slug' => 'edit.domains',
        ]);
        
        $viewUsersPermission = Permission::create([
            'name' => 'View users',
            'slug' => 'view.users',
        ]);
        
        $editUsersPermission = Permission::create([
            'name' => 'Edit users',
            'slug' => 'edit.users',
        ]);
        
        // Attach permissions to roles
        $userRole->attachPermission($viewSettingsPermission);
        $userRole->attachPermission($editSettingsPermission);
        $userRole->attachPermission($viewProfilePermission);
        $userRole->attachPermission($editProfilePermission);
        $userRole->attachPermission($viewDomainsPermission);
        $userRole->attachPermission($editDomainsPermission);
        
        $adminRole->attachPermission($viewSettingsPermission);
        $adminRole->attachPermission($editSettingsPermission);
        $adminRole->attachPermission($viewProfilePermission);
        $adminRole->attachPermission($editProfilePermission);
        $adminRole->attachPermission($viewDomainsPermission);
        $adminRole->attachPermission($editDomainsPermission);
        $adminRole->attachPermission($editProfilePermission);
        $adminRole->attachPermission($viewUsersPermission);
        $adminRole->attachPermission($editUsersPermission);
    }
}
