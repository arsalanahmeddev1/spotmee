<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsModule;

class CmsModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CmsModule::truncate();

        // Parent modules
        $dashboard = CmsModule::firstOrCreate([
            'route_name' => 'admin.dashboard'
        ], [
            'name' => 'Dashboard',
            'icon' => 'fa-regular fa-house',
            'sort_order' => 1,
            'status' => 'active',
            'parent_id' => 0,
        ]);

        $users = CmsModule::firstOrCreate([
            'route_name' => 'users-module'
        ], [
            'name' => 'Users',
            'icon' => 'fa-solid fa-users',
            'sort_order' => 2,
            'status' => 'active',
            'parent_id' => 0,
        ]);
        $hosts = CmsModule::firstOrCreate([
            'route_name' => 'hosts-module'
        ], [
            'name' => 'Hosts',
            'icon' => 'fa-solid fa-users',
            'sort_order' => 3,
            'status' => 'active',
            'parent_id' => 0,
        ]);
        $gyms = CmsModule::firstOrCreate([
            'route_name' => 'gyms-module'
        ], [
            'name' => 'Gyms',
            'icon' => 'fa-solid fa-users',
            'sort_order' => 4,
            'status' => 'active',
            'parent_id' => 0,
        ]);
       

        // submenus 
        // users submenu start
        CmsModule::firstOrCreate([
            'route_name' => 'users.index'
        ], [
            'name' => 'All Users',
            'icon' => 'fa-solid fa-list-ul',
            'sort_order' => 1,
            'status' => 'active',
            'parent_id' => $users->id,
        ]);

        // users submenu end
        CmsModule::firstOrCreate([
            'route_name' => 'hosts.index'
        ], [
            'name' => 'All Hosts',
            'icon' => 'fa-solid fa-list-ul',
            'sort_order' => 1,
            'status' => 'active',
            'parent_id' => $hosts->id,
        ]);
        CmsModule::firstOrCreate([
            'route_name' => 'gyms.index'
        ], [
            'name' => 'All Gyms',
            'icon' => 'fa-solid fa-list-ul',
            'sort_order' => 1,
            'status' => 'active',
            'parent_id' => $gyms->id,
        ]);
    }
}
