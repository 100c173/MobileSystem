<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Mobile;
use App\Models\OperatingSystem;
use Illuminate\Database\Seeder;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // استرجاع العلامات التجارية وأنظمة التشغيل باستخدام الأسماء
        $apple = Brand::where('name', 'Apple')->first();
        $samsung = Brand::where('name', 'Samsung')->first();
        $xiaomi = Brand::where('name', 'Xiaomi')->first();
        $google = Brand::where('name', 'Google')->first();
        $onePlus = Brand::where('name', 'OnePlus')->first();
        $asus = Brand::where('name', 'Asus')->first();
        $sony = Brand::where('name', 'Sony')->first();
        $motorola = Brand::where('name', 'Motorola')->first();
        $huawei = Brand::where('name', 'Huawei')->first();
        $realme = Brand::where('name', 'Realme')->first();

        $ios = OperatingSystem::where('name', 'iOS')->first();
        $android = OperatingSystem::where('name', 'Android')->first();
        $harmonyOS = OperatingSystem::where('name', 'HarmonyOS')->first();
        $googleOS = OperatingSystem::where('name', 'Android')->first(); // Assuming Android for Google Pixel
        $onePlusOS = OperatingSystem::where('name', 'Android')->first();
        $asusOS = OperatingSystem::where('name', 'Android')->first();
        $sonyOS = OperatingSystem::where('name', 'Android')->first();
        $motorolaOS = OperatingSystem::where('name', 'Android')->first();
        $realmeOS = OperatingSystem::where('name', 'Android')->first();

        $mobiles = [
            [
                'name' => 'iPhone 15 Pro',
                'brand_id' => $apple->id,
                'operating_system_id' => $ios->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-09-22',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'brand_id' => $samsung->id,
                'operating_system_id' => $android->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2024-01-31',
            ],
            [
                'name' => 'Xiaomi 13 Pro',
                'brand_id' => $xiaomi->id,
                'operating_system_id' => $android->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-02-28',
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'brand_id' => $google->id,
                'operating_system_id' => $googleOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-10-12',
            ],
            [
                'name' => 'OnePlus 12',
                'brand_id' => $onePlus->id,
                'operating_system_id' => $onePlusOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2024-01-23',
            ],
            [
                'name' => 'ASUS ROG Phone 7 Ultimate',
                'brand_id' => $asus->id,
                'operating_system_id' => $asusOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-04-13',
            ],
            [
                'name' => 'Sony Xperia 1 V',
                'brand_id' => $sony->id,
                'operating_system_id' => $sonyOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-05-11',
            ],
            [
                'name' => 'Motorola Edge+ (2023)',
                'brand_id' => $motorola->id,
                'operating_system_id' => $motorolaOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-05-09',
            ],
            [
                'name' => 'Huawei P60 Pro',
                'brand_id' => $huawei->id,
                'operating_system_id' => $harmonyOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-03-31',
            ],
            [
                'name' => 'Realme GT5 Pro',
                'brand_id' => $realme->id,
                'operating_system_id' => $realmeOS->id,
                'user_id' => 1,
                'status' =>'approved',
                'release_date' => '2023-12-14',
            ],
        ];

        foreach ($mobiles as $mobile) {
            Mobile::create($mobile);
        }
    }
}
