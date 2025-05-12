<?php

namespace Database\Seeders;

use App\Models\Mobile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobiles = [
            [
                'name' => 'iPhone 15 Pro',
                'brand' => 'Apple',
                'os' => 'iOS 17',
                'release_date' => '2023-09-22',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'brand' => 'Samsung',
                'os' => 'Android 14 (One UI 6.1)',
                'release_date' => '2024-01-31',
            ],
            [
                'name' => 'Xiaomi 13 Pro',
                'brand' => 'Xiaomi',
                'os' => 'Android 13 (MIUI 14)',
                'release_date' => '2023-02-28',
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'brand' => 'Google',
                'os' => 'Android 14',
                'release_date' => '2023-10-12',
            ],
            [
                'name' => 'OnePlus 12',
                'brand' => 'OnePlus',
                'os' => 'Android 14 (OxygenOS 14)',
                'release_date' => '2024-01-23',
            ],
            [
                'name' => 'ASUS ROG Phone 7 Ultimate',
                'brand' => 'ASUS',
                'os' => 'Android 13',
                'release_date' => '2023-04-13',
            ],
            [
                'name' => 'Sony Xperia 1 V',
                'brand' => 'Sony',
                'os' => 'Android 13',
                'release_date' => '2023-05-11',
            ],
            [
                'name' => 'Motorola Edge+ (2023)',
                'brand' => 'Motorola',
                'os' => 'Android 13',
                'release_date' => '2023-05-09',
            ],
            [
                'name' => 'Huawei P60 Pro',
                'brand' => 'Huawei',
                'os' => 'HarmonyOS 3.1',
                'release_date' => '2023-03-31',
            ],
            [
                'name' => 'Realme GT5 Pro',
                'brand' => 'Realme',
                'os' => 'Android 14 (Realme UI 5.0)',
                'release_date' => '2023-12-14',
            ],
        ];

        foreach ($mobiles as $mobile) {
            Mobile::create($mobile);
        }
    }

}
