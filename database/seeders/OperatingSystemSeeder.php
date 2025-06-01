<?php

namespace Database\Seeders;

use App\Models\OperatingSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operatingSystems=[
            'Android',
            'iOS',
            'HarmonyOS',
            'KaiOS',
            'Windows Phone',
            'BlackBerry OS',
            'Tizen',
            'Sailfish OS',
            'Ubuntu Touch',
            'Fire OS'
        ];

        foreach($operatingSystems as $operatingSystem){
            OperatingSystem::create([
                'name' => $operatingSystem,
            ]);
        }
    }
}
