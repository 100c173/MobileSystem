<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\MobileDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileDescriptionSeeder extends Seeder
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

        $descriptions = [
            [
                'mobile_id' => $iphone15Pro->id,
                'design_dimensions' => 'Titanium body, 144.6 x 70.6 x 8.25 mm, 187g.',
                'display' => '6.1-inch Super Retina XDR OLED, 2532 x 1170, HDR10, Dolby Vision.',
                'performance_cpu' => 'A17 Pro chip, excellent for gaming and multitasking.',
                'storage_desc' => '128GB, 256GB, 512GB, no expandable storage.',
                'connectivity_desc' => '5G, Wi-Fi 6, Bluetooth 5.3, NFC.',
                'battery_desc' => '3200mAh, 20W fast charging, 15W wireless charging.',
                'extra_features' => 'Face ID, Ceramic Shield, IP68 water resistance.',
                'security_privacy' => 'App tracking transparency, facial recognition.',
                'pros' => 'Great camera, display, and battery life.',
                'cons' => 'Expensive, similar design to previous models.',
            ],
            [
                'mobile_id' => $samsungS24Ultra->id,
                'design_dimensions' => 'Glass and aluminum body, 163.3 x 77.9 x 8.9 mm, 233g.',
                'display' => '6.8-inch Dynamic AMOLED 2X, 3088 x 1440, 120Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 3, top-tier gaming performance.',
                'storage_desc' => '256GB, 512GB, 1TB, non-expandable storage.',
                'connectivity_desc' => '5G, Wi-Fi 6E, Bluetooth 5.3.',
                'battery_desc' => '5000mAh, 45W fast charging.',
                'extra_features' => 'S Pen support, IP68, reverse wireless charging.',
                'security_privacy' => 'Fingerprint sensor, facial recognition.',
                'pros' => 'Stunning display, camera, performance.',
                'cons' => 'Expensive, large size.',
            ],
            [
                'mobile_id' => $xiaomi13Pro->id,
                'design_dimensions' => 'Glass back, aluminum frame, 162.9 x 74.6 x 8.6 mm, 229g.',
                'display' => '6.73-inch AMOLED, 3200 x 1440, HDR10+, Dolby Vision.',
                'performance_cpu' => 'Snapdragon 8 Gen 2, excellent for gaming.',
                'storage_desc' => '256GB, 512GB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6, Bluetooth 5.3.',
                'battery_desc' => '4820mAh, 120W fast charging.',
                'extra_features' => 'IP68, stereo speakers, in-display fingerprint.',
                'security_privacy' => 'Fingerprint sensor, facial unlock.',
                'pros' => 'Great performance, camera, and battery.',
                'cons' => 'Expensive, MIUI can be overwhelming.',
            ],
            [
                'mobile_id' => $googlePixel8Pro->id,
                'design_dimensions' => 'Aluminum body, 162.6 x 76.5 x 8.8 mm, 213g.',
                'display' => '6.7-inch LTPO OLED, 3120 x 1440, 120Hz.',
                'performance_cpu' => 'Google Tensor G3, optimized for AI tasks.',
                'storage_desc' => '128GB, 256GB, 512GB.',
                'connectivity_desc' => '5G, Wi-Fi 6E, Bluetooth 5.2.',
                'battery_desc' => '5050mAh, 30W fast charging.',
                'extra_features' => 'Face unlock, IP68, 3-year software updates.',
                'security_privacy' => 'Titan M2 chip, privacy features.',
                'pros' => 'Great cameras, pure Android experience.',
                'cons' => 'Battery life can be inconsistent.',
            ],
            [
                'mobile_id' => $onePlus12->id,
                'design_dimensions' => 'Glass back, metal frame, 163.1 x 74.6 x 8.7 mm, 205g.',
                'display' => '6.7-inch Fluid AMOLED, 3216 x 1440, 120Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 3, superb performance.',
                'storage_desc' => '256GB, 512GB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6E, Bluetooth 5.3.',
                'battery_desc' => '5000mAh, 100W SuperVOOC fast charging.',
                'extra_features' => 'IP68, Warp Charge.',
                'security_privacy' => 'In-display fingerprint sensor, Face Unlock.',
                'pros' => 'Fast charging, great value.',
                'cons' => 'Limited software updates.',
            ],
            [
                'mobile_id' => $asusROG7->id,
                'design_dimensions' => 'Glass back, aluminum frame, 173 x 78 x 10 mm, 285g.',
                'display' => '6.78-inch AMOLED, 2448 x 1080, 165Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 3, designed for gaming.',
                'storage_desc' => '512GB, 1TB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6E, Bluetooth 5.3.',
                'battery_desc' => '6000mAh, 65W fast charging.',
                'extra_features' => 'IP54, gaming accessories support.',
                'security_privacy' => 'In-display fingerprint, face unlock.',
                'pros' => 'Unmatched gaming performance.',
                'cons' => 'Large, heavy, and expensive.',
            ],
            [
                'mobile_id' => $sonyXperia1V->id,
                'design_dimensions' => 'Glass back, aluminum frame, 165.1 x 71.1 x 8.3 mm, 187g.',
                'display' => '6.5-inch OLED, 3840 x 1644, 120Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 2, great for content creation.',
                'storage_desc' => '256GB, 512GB, expandable via microSD.',
                'connectivity_desc' => '5G, Wi-Fi 6E, Bluetooth 5.2.',
                'battery_desc' => '5000mAh, 30W fast charging.',
                'extra_features' => 'IP68, 3.5mm headphone jack, pro camera features.',
                'security_privacy' => 'Fingerprint sensor, face unlock.',
                'pros' => 'Perfect for creators, great camera.',
                'cons' => 'Expensive, less mainstream.',
            ],
            [
                'mobile_id' => $motorolaEdge->id,
                'design_dimensions' => 'Plastic back, metal frame, 161.3 x 74.4 x 8.3 mm, 202g.',
                'display' => '6.7-inch OLED, 2400 x 1080, 144Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 2, solid performance.',
                'storage_desc' => '256GB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6, Bluetooth 5.3.',
                'battery_desc' => '4800mAh, 68W fast charging.',
                'extra_features' => 'Water-resistant, clean Android experience.',
                'security_privacy' => 'Fingerprint sensor, face unlock.',
                'pros' => 'Affordable flagship, good battery life.',
                'cons' => 'Camera could be better.',
            ],
            [
                'mobile_id' => $huaweiP60Pro->id,
                'design_dimensions' => 'Glass back, aluminum frame, 161.3 x 74.6 x 8.6 mm, 200g.',
                'display' => '6.67-inch OLED, 2700 x 1228, 120Hz.',
                'performance_cpu' => 'Kirin 9000, high-end performance.',
                'storage_desc' => '256GB, 512GB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6, Bluetooth 5.2.',
                'battery_desc' => '4800mAh, 66W fast charging.',
                'extra_features' => 'IP68, Leica cameras.',
                'security_privacy' => 'In-display fingerprint sensor.',
                'pros' => 'Great cameras, excellent battery.',
                'cons' => 'Limited Google services.',
            ],
            [
                'mobile_id' => $realmeGT5Pro->id,
                'design_dimensions' => 'Glass back, 162.3 x 75.5 x 8.2 mm, 200g.',
                'display' => '6.74-inch AMOLED, 2772 x 1240, 120Hz.',
                'performance_cpu' => 'Snapdragon 8 Gen 2, powerful and fast.',
                'storage_desc' => '256GB, 512GB, non-expandable.',
                'connectivity_desc' => '5G, Wi-Fi 6, Bluetooth 5.3.',
                'battery_desc' => '5000mAh, 100W fast charging.',
                'extra_features' => 'Clean UI, stereo speakers.',
                'security_privacy' => 'In-display fingerprint scanner.',
                'pros' => 'Fast charging, great performance.',
                'cons' => 'Camera performance could be better.',
            ]
        ];

        foreach ($descriptions as $description) {
            MobileDescription::create($description);
        }
    }
}

