<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agentRole = Role::where('name','agent')->first();


        $agent1 = User::create([
            'name'     => "agent1" ,
            'email'    => "agent1@gmail.com",
            'password' => bcrypt('password'),
        ]);
        $agent2 = User::create([
            'name'     => "agent2" ,
            'email'    => "agent2@gmail.com",
            'password' => bcrypt('password'),
        ]);
        $agent3 = User::create([
            'name'     => "agent3" ,
            'email'    => "agent3@gmail.com",
            'password' => bcrypt('password'),
        ]);

        $agent1->assignRole($agentRole);
        $agent2->assignRole($agentRole);
        $agent3->assignRole($agentRole);

    }
}
