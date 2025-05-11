<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole  = Role::where('name', 'custom')->first();

        $user1 = User::create([
            'name'     => "zeina aziz1",
            'email'    => "zeinaaziz1@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);
        $user2 = User::create([
            'name'     => "zeina aziz2",
            'email'    => "zeinaaziz2@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);
        $user3 = User::create([
            'name'     => "zeina aziz3",
            'email'    => "zeinaaziz3@gmail.com",
            'password' => bcrypt('zeinaaziz'),
        ]);

        $user1->assignRole($userRole);
        $user2->assignRole($userRole);
        $user3->assignRole($userRole);
    }
}
