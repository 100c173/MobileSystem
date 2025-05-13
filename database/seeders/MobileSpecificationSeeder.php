<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\MobileSpecification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobileSpecificationSeeder extends Seeder
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

        $specifications = [
            [
                'mobile_id' => $iphone15Pro->id,
                'cpu' => 'A17 Pro Chipset',
                'ram' => '6GB',
                'storage' => '128GB, 256GB, 512GB',
                'camera' => '48MP (wide), 12MP (ultra-wide), 12MP (telephoto)',
                'screen' => '6.1-inch Super Retina XDR OLED, 2532 x 1170',
                'battery' => '3200mAh, Fast charging 20W',
                'connectivity' => '5G, Wi-Fi 6, Bluetooth 5.3',
                'security_features' => 'Face ID, Secure Enclave',
            ],
            [
                'mobile_id' => $samsungS24Ultra->id,
                'cpu' => 'Snapdragon 8 Gen 3',
                'ram' => '12GB',
                'storage' => '256GB, 512GB, 1TB',
                'camera' => '200MP (wide), 12MP (ultra-wide), 10MP (periscope)',
                'screen' => '6.8-inch Dynamic AMOLED 2X, 3088 x 1440',
                'battery' => '5000mAh, 45W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.3',
                'security_features' => 'Under-display fingerprint, Face recognition',
            ],
            [
                'mobile_id' => $xiaomi13Pro->id,
                'cpu' => 'Snapdragon 8 Gen 2',
                'ram' => '12GB',
                'storage' => '256GB, 512GB',
                'camera' => '50MP (wide), 50MP (telephoto), 50MP (ultra-wide)',
                'screen' => '6.73-inch AMOLED, 3200 x 1440',
                'battery' => '4820mAh, 120W fast charging',
                'connectivity' => '5G, Wi-Fi 6, Bluetooth 5.3',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $googlePixel8Pro->id,
                'cpu' => 'Google Tensor G3',
                'ram' => '12GB',
                'storage' => '128GB, 256GB, 512GB',
                'camera' => '50MP (wide), 48MP (ultra-wide), 48MP (telephoto)',
                'screen' => '6.7-inch LTPO OLED, 3120 x 1440',
                'battery' => '5050mAh, 30W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.2',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $onePlus12->id,
                'cpu' => 'Snapdragon 8 Gen 3',
                'ram' => '12GB',
                'storage' => '256GB, 512GB',
                'camera' => '50MP (wide), 48MP (ultra-wide), 32MP (telephoto)',
                'screen' => '6.7-inch Fluid AMOLED, 3216 x 1440',
                'battery' => '5000mAh, 100W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.3',
                'security_features' => 'Under-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $asusROG7->id,
                'cpu' => 'Snapdragon 8 Gen 2',
                'ram' => '16GB',
                'storage' => '512GB, 1TB',
                'camera' => '50MP (wide), 13MP (ultra-wide), 8MP (macro)',
                'screen' => '6.78-inch AMOLED, 2448 x 1080',
                'battery' => '6000mAh, 65W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.3',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $sonyXperia1V->id,
                'cpu' => 'Snapdragon 8 Gen 2',
                'ram' => '12GB',
                'storage' => '256GB, 512GB',
                'camera' => '48MP (wide), 12MP (ultra-wide), 12MP (telephoto)',
                'screen' => '6.5-inch 4K OLED, 3840 x 1644',
                'battery' => '5000mAh, 30W fast charging',
                'connectivity' => '5G, Wi-Fi 6, Bluetooth 5.3',
                'security_features' => 'Side-mounted fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $motorolaEdge->id,
                'cpu' => 'Snapdragon 8 Gen 2',
                'ram' => '12GB',
                'storage' => '256GB, 512GB',
                'camera' => '50MP (wide), 50MP (ultra-wide), 12MP (telephoto)',
                'screen' => '6.7-inch OLED, 2400 x 1080',
                'battery' => '5100mAh, 68W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.3',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $huaweiP60Pro->id,
                'cpu' => 'Kirin 9000S',
                'ram' => '12GB',
                'storage' => '256GB, 512GB',
                'camera' => '50MP (wide), 13MP (ultra-wide), 64MP (periscope)',
                'screen' => '6.67-inch OLED, 2700 x 1228',
                'battery' => '4815mAh, 88W fast charging',
                'connectivity' => '5G, Wi-Fi 6E, Bluetooth 5.3',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
            [
                'mobile_id' => $realmeGT5Pro->id,
                'cpu' => 'Snapdragon 8 Gen 3',
                'ram' => '16GB',
                'storage' => '256GB, 512GB',
                'camera' => '50MP (wide), 50MP (ultra-wide), 2MP (depth)',
                'screen' => '6.74-inch AMOLED, 2772 x 1240',
                'battery' => '4600mAh, 240W fast charging',
                'connectivity' => '5G, Wi-Fi 6, Bluetooth 5.3',
                'security_features' => 'In-display fingerprint, Face unlock',
            ],
        ];

        foreach ($specifications as $specification) {
            MobileSpecification::create($specification);
        }

    }
}
