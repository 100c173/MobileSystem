<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\MobileImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $iphone15Pro = Mobile::where('name', 'iPhone 15 Pro')->first();
        $samsungS24Ultra = Mobile::where('name', 'Samsung Galaxy S24 Ultra')->first();
        $xiaomi13Pro = Mobile::where('name', 'Xiaomi 13 Pro')->first();
        $googlePixel8Pro = Mobile::where('name', 'Google Pixel 8 Pro')->first();
        $onePlus12 = Mobile::where('name', 'OnePlus 12')->first();
        $asusROG7 = Mobile::where('name', 'ASUS ROG Phone 7 Ultimate')->first();
        $sonyXperia1V = Mobile::where('name', 'Sony Xperia 1 V')->first();
        $motorolaEdge = Mobile::where('name', 'Motorola Edge+ (2023)')->first();
        $huaweiP60Pro = Mobile::where('name', 'Huawei P60 Pro')->first();
        $realmeGT5Pro = Mobile::where('name', 'Realme GT5 Pro')->first();

        $images = [
            // iPhone 15 Pro Images
            [
                'mobile_id' => $iphone15Pro->id,
                'image_url' => 'uploads/images/iphone15pro_front.jpg',
                'is_primary' => true,
                'caption' => 'iPhone 15 Pro front view'
            ],
            [
                'mobile_id' => $iphone15Pro->id,
                'image_url' => 'uploads/images/iphone15pro_back.jpg',
                'is_primary' => false,
                'caption' => 'iPhone 15 Pro back view'
            ],
            // Samsung Galaxy S24 Ultra Images
            [
                'mobile_id' => $samsungS24Ultra->id,
                'image_url' => 'uploads/images/s24ultra_front.jpg',
                'is_primary' => true,
                'caption' => 'Samsung Galaxy S24 Ultra front view'
            ],
            [
                'mobile_id' => $samsungS24Ultra->id,
                'image_url' => 'uploads/images/s24ultra_back.jpg',
                'is_primary' => false,
                'caption' => 'Samsung Galaxy S24 Ultra back view'
            ],
            // Xiaomi 13 Pro Images
            [
                'mobile_id' => $xiaomi13Pro->id,
                'image_url' => 'uploads/images/mi13pro_front.jpg',
                'is_primary' => true,
                'caption' => 'Xiaomi 13 Pro front view'
            ],
            [
                'mobile_id' => $xiaomi13Pro->id,
                'image_url' => 'uploads/images/mi13pro_back.jpg',
                'is_primary' => false,
                'caption' => 'Xiaomi 13 Pro back view'
            ],
            // Google Pixel 8 Pro Images
            [
                'mobile_id' => $googlePixel8Pro->id,
                'image_url' => 'uploads/images/pixel8pro_front.jpg',
                'is_primary' => true,
                'caption' => 'Google Pixel 8 Pro front view'
            ],
            [
                'mobile_id' => $googlePixel8Pro->id,
                'image_url' => 'uploads/images/pixel8pro_back.jpg',
                'is_primary' => false,
                'caption' => 'Google Pixel 8 Pro back view'
            ],
            // OnePlus 12 Images
            [
                'mobile_id' => $onePlus12->id,
                'image_url' => 'uploads/images/oneplus12_front.jpg',
                'is_primary' => true,
                'caption' => 'OnePlus 12 front view'
            ],
            [
                'mobile_id' => $onePlus12->id,
                'image_url' => 'uploads/images/oneplus12_back.jpg',
                'is_primary' => false,
                'caption' => 'OnePlus 12 back view'
            ],
            // ASUS ROG Phone 7 Ultimate Images
            [
                'mobile_id' => $asusROG7->id,
                'image_url' => 'uploads/images/rog7_front.jpg',
                'is_primary' => true,
                'caption' => 'ASUS ROG Phone 7 Ultimate front view',
            ],
            [
                'mobile_id' => $asusROG7->id,
                'image_url' => 'uploads/images/rog7_back.jpg',
                'is_primary' => false,
                'caption' => 'ASUS ROG Phone 7 Ultimate back view'
            ],
            // Sony Xperia 1 V Images
            [
                'mobile_id' => $sonyXperia1V->id,
                'image_url' => 'uploads/images/xperia1v_front.jpg',
                'is_primary' => true,
                'caption' => 'Sony Xperia 1 V front view'
            ],
            [
                'mobile_id' => $sonyXperia1V->id,
                'image_url' => 'uploads/images/xperia1v_back.jpg',
                'is_primary' => false,
                'caption' => 'Sony Xperia 1 V back view'
            ],
            // Motorola Edge+ (2023) Images
            [
                'mobile_id' => $motorolaEdge->id,
                'image_url' => 'uploads/images/motorolaedge_front.jpg',
                'is_primary' => true,
                'caption' => 'Motorola Edge+ (2023) front view'
            ],
            [
                'mobile_id' => $motorolaEdge->id,
                'image_url' => 'uploads/images/motorolaedge_back.jpg',
                'is_primary' => false,
                'caption' => 'Motorola Edge+ (2023) back view'
            ],
            // Huawei P60 Pro Images
            [
                'mobile_id' => $huaweiP60Pro->id,
                'image_url' => 'uploads/images/huaweiP60pro_front.jpg',
                'is_primary' => true,
                'caption' => 'Huawei P60 Pro front view'
            ],
            [
                'mobile_id' => $huaweiP60Pro->id,
                'image_url' => 'uploads/images/huaweiP60pro_back.jpg',
                'is_primary' => false,
                'caption' => 'Huawei P60 Pro back view'
            ],
            // Realme GT5 Pro Images
            [
                'mobile_id' => $realmeGT5Pro->id,
                'image_url' => 'uploads/images/realmeGT5pro_front.jpg',
                'is_primary' => true,
                'caption' => 'Realme GT5 Pro front view'
            ],
            [
                'mobile_id' => $realmeGT5Pro->id,
                'image_url' => 'uploads/images/realmeGT5pro_back.jpg',
                'is_primary' => false,
                'caption' => 'Realme GT5 Pro back view'
            ],
        ];

        foreach ($images as $image) {
            MobileImage::create($image);
        }
    }
}