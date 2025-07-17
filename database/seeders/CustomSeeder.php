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
            'name'     => "AmerOniza",
            'email'    => "ameroniza@gmail.com",
            'password' => bcrypt('12345678'),
        ]);

        $user1->assignRole($userRole);

    }
}
