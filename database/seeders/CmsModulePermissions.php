<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsModulePermission;
use App\Models\CmsModule;
use Spatie\Permission\Models\Role;

class CmsModulePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        CmsModulePermission::truncate();

        // Get modules by route_name to avoid hard-coded IDs
        $adminRole = Role::firstOrCreate(['name' => config('roles.admin')]);
        $userRole = Role::firstOrCreate(['name' => config('roles.user')]);
        $hostRole = Role::firstOrCreate(['name' => config('roles.host')]);
        $modules = [
            'dashboard' => CmsModule::where('route_name', 'admin.dashboard')->first(),
            'users' => CmsModule::where('route_name', 'users-module')->first(),
            'gyms' => CmsModule::where('route_name', 'gyms-module')->first(),
        ];

        // Get submenus by route_name
        $submenus = [
            'users.index' => CmsModule::where('route_name', 'users.index')->first(),
            'users.create' => CmsModule::where('route_name', 'users.create')->first(),
            'hosts.index' => CmsModule::where('route_name', 'hosts.index')->first(),
            'gyms.index' => CmsModule::where('route_name', 'gyms.index')->first(),
        ];

        $permissions = [
            // admin modules
            ['role_id' => $adminRole->id, 'module_id' => $modules['dashboard']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Dashboard
            ['role_id' => $adminRole->id, 'module_id' => $modules['users']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Users
            ['role_id' => $adminRole->id, 'module_id' => $modules['gyms']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // gyms
            // Submenus
            ['role_id' => $adminRole->id, 'module_id' => $submenus['users.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 1, 'is_delete' => 0], // All Users (users.index)
            ['role_id' => $adminRole->id, 'module_id' => $submenus['users.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Add User (users.create)
            ['role_id' => $adminRole->id, 'module_id' => $submenus['hosts.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0],
            ['role_id' => $adminRole->id, 'module_id' => $submenus['hosts.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0],
            ['role_id' => $adminRole->id, 'module_id' => $submenus['gyms.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // all gyms 
            ['role_id' => $adminRole->id, 'module_id' => $submenus['gyms.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // add gyms

            // user modules
            ['role_id' => $userRole->id, 'module_id' => $modules['dashboard']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Dashboard
            ['role_id' => $userRole->id, 'module_id' => $modules['users']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Users
            ['role_id' => $userRole->id, 'module_id' => $modules['hosts']->id ?? null, 'is_add' => 1, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $userRole->id, 'module_id' => $modules['gyms']->id ?? null, 'is_add' => 1, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // gyms
            // Submenus
            ['role_id' => $userRole->id, 'module_id' => $submenus['users.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 1, 'is_delete' => 0], // All Users (users.index)
            ['role_id' => $userRole->id, 'module_id' => $submenus['users.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Add User (users.create)
            ['role_id' => $userRole->id, 'module_id' => $submenus['hosts.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $userRole->id, 'module_id' => $submenus['hosts.create']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $userRole->id, 'module_id' => $submenus['gyms.index']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // all gyms 
            ['role_id' => $userRole->id, 'module_id' => $submenus['gyms.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // add gyms


            // Host role modules
            ['role_id' => $hostRole->id, 'module_id' => $modules['dashboard']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Dashboard
            ['role_id' => $hostRole->id, 'module_id' => $modules['users']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Users
            ['role_id' => $hostRole->id, 'module_id' => $modules['hosts']->id ?? null, 'is_add' => 1, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $hostRole->id, 'module_id' => $modules['gyms']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // gyms
            // Submenus
            ['role_id' => $hostRole->id, 'module_id' => $submenus['users.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 1, 'is_delete' => 0], // All Users (users.index)
            ['role_id' => $hostRole->id, 'module_id' => $submenus['users.create']->id ?? null, 'is_add' => 0, 'is_view' => 0, 'is_update' => 0, 'is_delete' => 0], // Add User (users.create)
            ['role_id' => $hostRole->id, 'module_id' => $submenus['hosts.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $hostRole->id, 'module_id' => $submenus['hosts.create']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // Hosts
            ['role_id' => $hostRole->id, 'module_id' => $submenus['gyms.index']->id ?? null, 'is_add' => 0, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // all gyms 
            ['role_id' => $hostRole->id, 'module_id' => $submenus['gyms.create']->id ?? null, 'is_add' => 1, 'is_view' => 1, 'is_update' => 0, 'is_delete' => 0], // add gyms
        ];

        foreach ($permissions as $perm) {
            // Skip if module not found
            if ($perm['module_id'] === null) {
                continue;
            }

            CmsModulePermission::firstOrCreate(
                [
                    'role_id' => $perm['role_id'],
                    'module_id' => $perm['module_id']
                ],
                $perm
            );
        }
    }
}
