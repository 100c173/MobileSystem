<?php

namespace Database\Seeders;


use Database\Seeders\AdminSeeder;
use Database\Seeders\AgentRequestSeeder;
use Database\Seeders\CustomSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        
      
        $this->call([
            
            RoleSeeder::class,
            AdminSeeder::class,
            CustomSeeder::class,
            AgentRequestSeeder::class,
            
            MobileSeeder::class,
            MobileSpecificationSeeder::class,
            MobileDescriptionSeeder::class,
            MobileImageSeeder::class,
        ]);
    }
}
