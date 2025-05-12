<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\MobileDescription;
use App\Models\MobileImage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MobileSpecification;
use App\Models\User;
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
            Mobile::class,
            RoleSeeder::class,
            AdminSeeder::class,
            CustomSeeder::class,
            AgentRequestSeeder::class,
            
            MobileSpecification::class,
            MobileDescription::class,
            MobileImage::class,
        ]);
    }
}
