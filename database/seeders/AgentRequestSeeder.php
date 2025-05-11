<?php

namespace Database\Seeders;

use App\Models\AgentRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgentRequest::create([
            'user_id'     => 2 ,
            'business_name'    => "Zeina1",
            'commercial_number' => 11111,
            'address' => 'lattakia',
            'latitude' => 31.33456,
            'longitude' => 29.34567,
            'status' => 'pending',
        ]);
        AgentRequest::create([
            'user_id'     => 3 ,
            'business_name'    => "Zeina2",
            'commercial_number' => 22222,
            'address' => 'jableh',
            'latitude' => 31.33456,
            'longitude' => 29.34567,
            'status' => 'approved',
        ]);
        AgentRequest::create([
            'user_id'     => 4 ,
            'business_name'    => "Zeina3",
            'commercial_number' => 33333,
            'address' => 'jableh',
            'latitude' => 31.33456,
            'longitude' => 29.34567,
            'status' => 'rejected',
        ]);
    }
}
