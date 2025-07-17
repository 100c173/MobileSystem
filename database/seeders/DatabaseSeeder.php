<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\AgentSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\CustomSeeder;
use Database\Seeders\MobileSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\AgentRequestSeeder;
use Database\Seeders\OperatingSystemSeeder;

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
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
           // AgentSeeder::class,
            CustomSeeder::class,
            CountriesSeeder::class,
            CitiesSeeder::class,
            BrandSeeder::class,
            OperatingSystemSeeder::class,
            MobileSeeder::class,
            MobileSpecificationSeeder::class,
            MobileDescriptionSeeder::class,
        ]);
    }
}
