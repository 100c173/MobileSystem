<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ["syria"] ; 
        foreach($countries as $country){
            Country::firstOrCreate(["name"=>$country]) ; 
        }
    }
}
