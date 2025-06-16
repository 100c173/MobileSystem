<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MobileDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = [];
        $mobileIds = DB::table('mobiles')->pluck('id')->toArray();
        
        if (empty($mobileIds)) {
            $this->command->info('No mobile devices found. Please seed mobiles table first.');
            return;
        }

        $designDimensions = [
            "Sleek aluminum frame with glass back, weighing 189g. Dimensions: 146.7 x 71.5 x 7.7 mm.",
            "Premium titanium frame with ceramic back, weighing 201g. Dimensions: 159.9 x 76.7 x 8.3 mm.",
            "Polycarbonate body with matte finish, weighing 175g. Dimensions: 160.1 x 75.9 x 8.9 mm.",
            "Aerospace-grade aluminum with Gorilla Glass Victus 2, weighing 195g. Dimensions: 152.8 x 71.5 x 7.9 mm.",
            "Recycled aluminum frame with bio-based polymer back, weighing 182g. Dimensions: 147.5 x 70.9 x 8.1 mm."
        ];

        $displays = [
            [
                'type' => 'Dynamic AMOLED 2X',
                'size' => '6.8 inches',
                'resolution' => '3088 x 1440',
                'refresh_rate' => '120Hz',
                'brightness' => '1750 nits peak',
                'protection' => 'Gorilla Glass Victus 2'
            ],
            [
                'type' => 'Super Retina XDR',
                'size' => '6.1 inches',
                'resolution' => '2532 x 1170',
                'refresh_rate' => '60Hz',
                'brightness' => '1200 nits peak',
                'protection' => 'Ceramic Shield'
            ],
            [
                'type' => 'LTPO AMOLED',
                'size' => '6.7 inches',
                'resolution' => '3216 x 1440',
                'refresh_rate' => '1-120Hz adaptive',
                'brightness' => '1500 nits peak',
                'protection' => 'Gorilla Glass Victus'
            ],
            [
                'type' => 'Fluid AMOLED',
                'size' => '6.55 inches',
                'resolution' => '2400 x 1080',
                'refresh_rate' => '90Hz',
                'brightness' => '1100 nits peak',
                'protection' => 'Gorilla Glass 5'
            ]
        ];

        $performanceCpus = [
            "The Snapdragon 8 Gen 2 delivers exceptional performance with 35% faster CPU and 25% better GPU performance than previous generation, handling intensive tasks effortlessly.",
            "Apple's A16 Bionic chip provides industry-leading performance with 6-core CPU and 5-core GPU, optimized for efficiency and machine learning tasks.",
            "Dimensity 9200 offers flagship-level performance with ARM's latest cores, delivering excellent power efficiency for both gaming and productivity.",
            "Exynos 2200 with AMD-based Xclipse GPU provides console-level graphics performance and excellent multi-core processing capabilities."
        ];

        $storageDescs = [
            "Available in 128GB, 256GB, and 512GB variants with UFS 3.1 storage for blazing fast read/write speeds. No microSD expansion.",
            "Comes in 256GB and 512GB configurations using NVMe storage technology for desktop-class performance. No expandable storage.",
            "Offers 64GB and 128GB options with eMMC 5.1 storage. Includes dedicated microSD slot for expansion up to 1TB.",
            "Only available in 512GB and 1TB variants with UFS 4.0 storage, offering 2x faster speeds than previous generation."
        ];

        $connectivityDescs = [
            "Supports 5G (Sub6/mmWave), Wi-Fi 6E, Bluetooth 5.3, NFC, and USB-C 3.2 Gen 2 with DisplayPort Alt Mode.",
            "5G (Sub6 only), Wi-Fi 6, Bluetooth 5.2, NFC, and Lightning port with USB 2.0 speeds.",
            "4G LTE Cat20, Wi-Fi 5, Bluetooth 5.0, NFC, and USB-C 2.0 with OTG support.",
            "5G (Sub6), Wi-Fi 6, Bluetooth 5.1, NFC, IR blaster, and USB-C 3.1 with HDMI output."
        ];

        $batteryDescs = [
            "5000mAh battery with 45W wired charging (0-100% in 58 mins) and 15W wireless charging. Easily lasts a full day with heavy use.",
            "4500mAh battery supports 30W fast charging (50% in 30 mins) and 20W wireless charging. Excellent standby time with optimized software.",
            "4000mAh battery with 25W charging. While smaller than competitors, the efficient processor provides all-day battery life for most users.",
            "4800mAh battery features 65W SuperVOOC charging (100% in 35 mins) but lacks wireless charging capability."
        ];

        $keyFeatures = [
            ['water_resistance' => 'IP68', 'stylus' => false, 'stereo_speakers' => true, 'haptic_feedback' => 'Advanced'],
            ['water_resistance' => 'IP67', 'stylus' => true, 'stereo_speakers' => true, 'haptic_feedback' => 'Precision'],
            ['water_resistance' => 'IP54', 'stylus' => false, 'stereo_speakers' => false, 'haptic_feedback' => 'Basic'],
            ['water_resistance' => 'IP68', 'stylus' => false, 'stereo_speakers' => true, 'haptic_feedback' => 'Ultra']
        ];

        $securityPrivacy = [
            "In-display ultrasonic fingerprint sensor + advanced facial recognition with 3D mapping. Monthly security updates guaranteed for 4 years.",
            "Face ID with TrueDepth camera system and secure enclave. Five years of iOS security updates.",
            "Side-mounted fingerprint sensor + 2D face unlock. Security patches for 3 years.",
            "Optical in-display fingerprint + AI-powered face unlock. Quarterly security updates for 3 years."
        ];

        $prosList = [
            ["Stunning display quality", "Excellent camera performance", "Long battery life", "Premium build quality"],
            ["Industry-leading performance", "Best-in-class video recording", "Long software support", "Ecosystem integration"],
            ["Great value for money", "Headphone jack included", "Expandable storage", "Lightweight design"],
            ["Innovative camera system", "Fastest charging available", "Unique design", "High-quality speakers"]
        ];

        $consList = [
            ["Expensive", "No charger included", "Heavy", "Limited availability"],
            ["No high refresh rate", "Lightning port limitations", "Notch design", "Expensive repairs"],
            ["Plastic build", "Slower charging", "Mid-range cameras", "Slower updates"],
            ["No wireless charging", "Large size", "Software quirks", "Limited service centers"]
        ];

        foreach ($mobileIds as $mobileId) {
            $descriptions[] = [
                'mobile_id' => $mobileId,
                'design_dimensions' => $designDimensions[array_rand($designDimensions)],
                'display' => json_encode($displays[array_rand($displays)]),
                'performance_cpu' => $performanceCpus[array_rand($performanceCpus)],
                'storage_desc' => $storageDescs[array_rand($storageDescs)],
                'connectivity_desc' => $connectivityDescs[array_rand($connectivityDescs)],
                'battery_desc' => $batteryDescs[array_rand($batteryDescs)],
                'key_features' => json_encode($keyFeatures[array_rand($keyFeatures)]),
                'security_privacy' => $securityPrivacy[array_rand($securityPrivacy)],
                'pros' => json_encode($prosList[array_rand($prosList)]),
                'cons' => json_encode($consList[array_rand($consList)]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert in chunks to avoid memory issues
        foreach (array_chunk($descriptions, 50) as $chunk) {
            DB::table('mobile_descriptions')->insert($chunk);
        }
    }
}