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
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $admin = User::create([
            'name'     => "admin1" ,
            'email'    => "admin1@gmail.com",
            'password' => bcrypt('password'),
        ]);
        $user1 = User::create([
            'name'     => "zeina aziz1" ,
            'email'    => "zeinaaziz1@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);
        $user2 = User::create([
            'name'     => "zeina aziz2" ,
            'email'    => "zeinaaziz2@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);
        $user3 = User::create([
            'name'     => "zeina aziz3" ,
            'email'    => "zeinaaziz3@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);

        $admin->assignRole($adminRole);
        $user1->assignRole($userRole);
        $user2->assignRole($userRole);
        $user3->assignRole($userRole);
    }
}
