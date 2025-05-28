<?php

namespace Database\Seeders;

use App\Models\Mobile;
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
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'brand' => 'Samsung',
                'os' => 'Android 14 (One UI 6.1)',
                'release_date' => '2024-01-31',
                'user_id'      => 1,
                'status'       => 'approved',

            ],
            [
                'name' => 'Xiaomi 13 Pro',
                'brand' => 'Xiaomi',
                'os' => 'Android 13 (MIUI 14)',
                'release_date' => '2023-02-28',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'brand' => 'Google',
                'os' => 'Android 14',
                'release_date' => '2023-10-12',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'OnePlus 12',
                'brand' => 'OnePlus',
                'os' => 'Android 14 (OxygenOS 14)',
                'release_date' => '2024-01-23',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'ASUS ROG Phone 7 Ultimate',
                'brand' => 'ASUS',
                'os' => 'Android 13',
                'release_date' => '2023-04-13',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Sony Xperia 1 V',
                'brand' => 'Sony',
                'os' => 'Android 13',
                'release_date' => '2023-05-11',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Motorola Edge+ (2023)',
                'brand' => 'Motorola',
                'os' => 'Android 13',
                'release_date' => '2023-05-09',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Huawei P60 Pro',
                'brand' => 'Huawei',
                'os' => 'HarmonyOS 3.1',
                'release_date' => '2023-03-31',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
            [
                'name' => 'Realme GT5 Pro',
                'brand' => 'Realme',
                'os' => 'Android 14 (Realme UI 5.0)',
                'release_date' => '2023-12-14',
                'user_id'      => 1,
                'status'       => 'approved',
            ],
        ];

        foreach ($mobiles as $mobile) {
            Mobile::create($mobile);
        }
    }

}
