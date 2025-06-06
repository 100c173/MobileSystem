<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $brands = [
            'Apple',
            'Samsung',
            'Xiaomi',
            'Oppo',
            'Vivo',
            'Realme',
            'OnePlus',
            'Huawei',
            'Nokia',
            'Motorola',
            'Sony',
            'Infinix',
            'Tecno',
            'Asus',
            'Lenovo',
            'ZTE',
            'Honor',
            'Google',
            'LG',
            'HTC'
        ];

        foreach($brands as $brand){
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}
