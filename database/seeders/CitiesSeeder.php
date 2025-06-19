<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $syria = Country::where('name' , 'syria')->first();

        $cities = [
            'Damascus',
            'Aleppo',
            'Latakia',
            'Homs',
            'Hama',
            'Tartus',
            'Deir ez-Zor',
            'Raqqa',
            'Hasakah',
            'Idlib',
            'Daraa',
            'Quneitra',
            'As-Suwayda'
        ];

        foreach($cities as $city){
            City::firstOrCreate([
                "name"       => $city , 
                "country_id" => $syria->id,
            ]);
        }
    }
}
