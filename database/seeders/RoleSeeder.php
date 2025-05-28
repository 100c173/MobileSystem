<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $admin  = Role::firstOrCreate(['name' => 'admin']);
        $custom = Role::firstOrCreate(['name' => 'custom']);
        $agent  = Role::firstOrCreate(['name' => 'agent']);

        // $agent->syncPermissions([
        //     'add_mobile',
        //     'edit_own_mobile',
        //     'delete_own_mobile',
        // ]);

        // $admin->syncPermissions([
        //     'add_mobile',
        //     'edit_any_mobile',
        //     'delete_any_mobile',
        // ]);
    }
}
