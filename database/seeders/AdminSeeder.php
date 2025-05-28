<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name','admin')->first();

        $admin1 = User::create([
            'name'     => "admin1" ,
            'email'    => "admin1@gmail.com",
            'password' => bcrypt('password'),
        ]);

        $admin1->assignRole($adminRole);

        
    }
}
